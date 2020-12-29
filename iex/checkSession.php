<?php
session_start();
$email = $_SESSION['email'];


if ($email) {
    echo "<script>
        //alert('Welcome');
    </script>";

}else{
    echo "<script>
        alert('Invalid Access!')
    </script>";

    $url = "index.html";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
    die;

}
