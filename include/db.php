<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "development_task";

$conn = mysqli_connect($host,$user,$pass,$dbname);
if(!$conn){
    die('Could not connect: ' . mysqli_connect_error());
}
else {
    // echo"Connected Successfully";
}

?>