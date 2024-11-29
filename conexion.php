<?php
// Variables de conexión a la base de datos
$host = getenv('DB_HOST');
$usuario = getenv('DB_USER');
$contraseña = getenv('DB_PASSWORD');
$nombreBaseDatos = getenv('DB_NAME');
$puerto = getenv('DB_PORT');
$port = getenv('APP_PORT') ?: 8080; // Usa la variable de entorno APP_PORT, o 8080 como respaldo si no está definida
$host = "0.0.0.0"; // Escucha en todas las interfaces de red

// Inicia el servidor PHP
echo "Iniciando servidor en http://$host:$port\n";
exec("php -S $host:$port");

try {
    $conn = new PDO("pgsql:host=$host;port=$puerto;dbname=$nombreBaseDatos", $usuario, $contraseña);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
