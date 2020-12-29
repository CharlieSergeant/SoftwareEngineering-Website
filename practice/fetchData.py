# -*- coding: utf-8 -*-
"""
Created on Fri Dec  6 09:15:51 2019

@author: kayla
"""


import json
from urllib.request import Request, urlopen
import mysql.connector

url = "https://cloud.iexapis.com/v1/stock/rfem/chart/1m/?token=___"
request = Request(url)
html = urlopen(request)

data = html.read()
data = json.loads(data)

mydb = mysql.connector.connect(
  host = "###.##.###.###",
  user = "username",
  passwd = "password",
  database = "database"
)
mycursor = mydb.cursor()

for record in data:
    sql = "INSERT INTO rfem VALUES ('"+str(record['date'])+"',"+str(record['open'])+","+str(record['close'])+","
            + str(record['high'])+","+str(record['low'])+","+str(record['volume'])+")"
    print(sql);
    mycursor.execute(sql)

mydb.commit()
mydb.close()


