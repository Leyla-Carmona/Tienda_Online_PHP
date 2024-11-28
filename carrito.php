<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['codigo'];

    $sql = "SELECT * FROM productos WHERE codigo = $codigo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
        if (isset($_SESSION['carrito'][$codigo])) {
            $_SESSION['carrito'][$codigo]['cantidad']++;
        } else {
            $producto['cantidad'] = 1;
            $_SESSION['carrito'][$codigo] = $producto;
        }
    }
}

header("Location: index.php");
