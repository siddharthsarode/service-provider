<?php

$server_name = "localhost";
$user = "root";
$password = "";
$database_name = "service_app";
$port_name = 3306;

$conn = new mysqli($server_name, $user, $password, $database_name, $port_name);

if ($conn->connect_error) {
    echo "<script>alert('Database cannot Connected')</script>";
    header("location: index.php");
}