<?php

$servername = "localhost";
$dbusername = "IEX";
$dbpassword = "";
$dbname ="IEX";
date_default_timezone_set("America/New_York");
$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);

if ($conn -> connect_error)
{
    die("Connection Failed:" . $conn-> connect_error);
}
?>
