<?php


$servername = "10.0.166.3";
$username = "root";
$password = "";
$dbname = "events";
$port = "3307";

//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "event-registration";
//$port = "3307";
// Create connection
try {
    $conn = mysqli_connect($servername, $username, $password,$dbname);
} catch(Exception $e) {
    echo 'Connect to Mysql database failed: ' .$e->getMessage();
    exit(1);
}


?>