<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event-registration";
$port = "3307";
// Create connection
try {
    $conn = mysqli_connect($servername, $username, $password,$dbname,$port);
} catch(Exception $e) {
    echo 'Connect to Mysql database failed: ' .$e->getMessage();
    exit(1);
}


?>