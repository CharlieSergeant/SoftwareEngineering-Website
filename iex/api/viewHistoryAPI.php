<?php
include "../checkSession.php";
include "../bootstrap.php";
include "../navbar.php";
include "../dbconnection.php";

$company = mysqli_real_escape_string($conn,$_GET['company']);
$startDate = mysqli_real_escape_string($conn,$_GET['startDate']);
$endDate = mysqli_real_escape_string($conn,$_GET['endDate']);

$company = str_replace("\n",'',$company);
$startDate = str_replace("\n",'',$startDate);
$endDate = str_replace("\n",'',$endDate);

if(strtotime($startDate)>strtotime($endDate)){
    $temp = $startDate;
    $startDate = $endDate;
    $endDate = $temp;
}

$max = 0;
$min = 0;
$avg = 0;
$count = 0;
$med = 0;



?>


<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h1>View History</h1>
            <table class="table">

                <thead>
                <tr>
                    <th>date</th>
                    <th>open</th>
                    <th>close</th>
                    <th>high</th>
                    <th>low</th>
                    <th>volume</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                   <?php
                   $query = "select * from ".$company." where date between '".$startDate."' and '".$endDate."' order by date desc";
                   $result = mysqli_query($conn,$query);

                   if($result) {
                       if (mysqli_num_rows($result)>0) {
                           while($row = mysqli_fetch_array($result)){
                               $date=$row['date'];
                               $open=$row['open'];
                               $close=$row['close'];
                               $high=$row['high'];
                               $low=$row['low'];
                               $volume=$row['volume'];

                               echo "<TR><TD>$date<TD>$open<TD>$close<TD>$high<TD>$low<TD>$volume";


                           }

                       }
                   }

                   ?>
                </tr>

                </tbody>

            </table>
        </div>
    </div>
</div>>

