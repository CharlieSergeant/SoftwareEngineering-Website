<?php
include "checkAPIToken.php";
include "dbconnection.php";
include "responseApi.class.php";


$company = mysqli_real_escape_string($conn,$_GET['company']);
$startDate = mysqli_real_escape_string($conn,$_GET['startDate']);
$endDate = mysqli_real_escape_string($conn,$_GET['endDate']);

$company = str_replace("\n",'',$company);
$startDate = str_replace("\n",'',$startDate);
$endDate = str_replace("\n",'',$endDate);

$max = 0;
$min = 0;
$avg = 0;
$count = 0;
$med = 0;

//max
$query = "select max(close) from ".$company." where date between '".$startDate."' and '".$endDate."'";

$result = mysqli_query($conn,$query);
if($result) {
    if (mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_array($result);
        $max = $row["max(close)"];
    }
}

//min
$query = "select min(close) from ".$company." where date between '".$startDate."' and '".$endDate."'";
$result = mysqli_query($conn,$query);
if($result) {
    if (mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_array($result);
        $min = $row["min(close)"];
    }
}

//avg
$query = "select avg(close) from ".$company." where date between '".$startDate."' and '".$endDate."'";
$result = mysqli_query($conn,$query);
if($result) {
    if (mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_array($result);
        $avg = $row["avg(close)"];
    }
}


//med
$query = "select count(close) from ".$company." where date between '".$startDate."' and '".$endDate."'";
$result = mysqli_query($conn,$query);
if($result) {
    if (mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_array($result);
        $count = $row["count(close)"];
    }
}

if($count%2==0){
    $count = $count / 2 - 1;
    $query = "select close from ".$company." where date between '".$startDate."' and '".$endDate."' order by close limit ".$count.",2";
    $result = mysqli_query($conn,$query);
    if($result) {
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_array($result)){
                $med+=$row["close"];
            }
        }
    }

    $med = $med/2;

}
else{

    $count = floor($count/2);

    $query = "select close from ".$company." where date between '".$startDate."' and '".$endDate."' order by close limit ".$count.",1";
    $result = mysqli_query($conn,$query);
    if($result) {
        if (mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_array($result);
            $med = $row["close"];
        }
    }
}




$code = 200;
$message = "OK";
$data = array(
    "max"=>$max,
    "min"=>$min,
    "avg"=>$avg,
    "med"=>$med
);

$responseApi = new ResponseApi;
echo $responseApi-> jsonK($code,$message,$data);


