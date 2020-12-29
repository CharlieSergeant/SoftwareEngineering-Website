<html>
<body>

<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT date, open, close, high, low, volume FROM rfem";
$result = mysqli_query($conn, $sql);


echo '<table border="1" cellspacing="2" cellpadding="5">
      <tr>
          <td> <font face="Arial">Date</font> </td>
          <td> <font face="Arial">Open</font> </td>
          <td> <font face="Arial">Close</font> </td>
          <td> <font face="Arial">High</font> </td>
          <td> <font face="Arial">Volume</font> </td>
      </tr>';

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $date = $row["date"];
        $open = $row["open"];
        $close = $row["close"];
        $high = $row["high"];
        $volume = $row["volume"];

        echo '<tr>
          <td>'.$date.'</td>
          <td>'.$open.'</td>
          <td>'.$close.'</td>
          <td>'.$high.'</td>
          <td>'.$volume.'</td>
      </tr>';

        //echo "date " . $row["date"] . " open " . $row["open"]. " close " . $row["close"] . " high " . $row["high"]. " low " . $row["low"]. " volume " . $row["volume"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
</body>
</html>
