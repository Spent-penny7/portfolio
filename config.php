<?php

$host = "localhost";
$name = "root";
$password = "";
$database = "database";

$conn = new mysqli($host, $name, $password, $database);

if($conn->connect_error){
die("connection failed:". $conn->connect_error);
}
?>