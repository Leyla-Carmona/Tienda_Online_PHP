<?php
// Variables de conexión a la base de datos
$host = "aws-0-us-west-1.pooler.supabase.com";
$usuario = "postgres.fbkljamdhlvfrwjguezi";
$contraseña = "_s@ntT5BYEMWzi-";
$nombreBaseDatos = "postgres";
$puerto = "6543"; // Asegúrate de usar el puerto correcto

// Crear la conexión con PDO
try {
    $conn = new PDO("pgsql:host=$host;port=$puerto;dbname=$nombreBaseDatos", $usuario, $contraseña);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
