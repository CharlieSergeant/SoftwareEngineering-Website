<?php
include "dbconnection.php";


$email=mysqli_real_escape_string($conn,$_GET['email']);
$APIToken = mysqli_real_escape_string($conn,$_GET['APIToken']);

$APIToken = str_replace("\n",'',$APIToken);
$email = str_replace("\n",'',$email);

$isValidToken = 0;


$query = "select APIToken from user where email = '".$email."' ";
$result = mysqli_query($conn,$query);
if($result) {
    if (mysqli_num_rows($result)==1) {

        $row = mysqli_fetch_array($result);
        $correctAPIToken = $row["APIToken"];

        if ($APIToken == $correctAPIToken) {
            $isValidToken = 1;
        }

    }
}



mysqli_free_result($result);
mysqli_close($conn);

if($isValidToken==0){
    require "responseApi.class.php";

    $code = 401;
    $message = "Unauthorized";
    $data = array(
        "APIToken"=> $APIToken
    );

    $responseApi = new ResponseApi;
    echo $responseApi-> jsonK($code,$message,$data);
    die();
}
