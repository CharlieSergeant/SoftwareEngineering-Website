import json
from urllib.request import Request, urlopen
import mysql.connector

url = "https://cloud.iexapis.com/v1/stock/rfem/chart/1m/?token="
request = Request(url)
html = urlopen(request)


data = html.read()
data = json.loads(data)


mydb = mysql.connector.connect(
  host="",
  user="",
  passwd="",
  database=""
)

mycursor = mydb.cursor()
for record in data:
    sql = "select count(*) as ct from rfem  where date = '"+ str(record['date'] ) +"'"
    print(sql);
    mycursor.execute(sql)
    results = mycursor.fetchall()

    for row in results:
        ct = row[0];
        print(ct)

        if ct == 0:
            sql = "INSERT INTO rfem VALUES ('" + str(record['date']) + "', " + str(record['open']) + "," + str(
                record['close']) + "," + str(record['high']) + "," + str(record['low']) + "," + str(
                record['volume']) + ")"
            print(sql);
            mycursor.execute(sql)

mydb.commit()
mydb.close()
