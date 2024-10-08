<?php
$host = "localhost";
$basededatos = "tienda";
$user = "root";
$password = "";

$conn = new mysqli($host, $user, $password, $basededatos, 3306);

if ($conn->connect_error) {
    die("Error:" . $conn->connect_error);
}