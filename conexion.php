<?php
// Variables de conexión a la base de datos
$host = getenv('DB_HOST');
$usuario = getenv('DB_USER');
$contraseña = getenv('DB_PASSWORD');
$nombreBaseDatos = getenv('DB_NAME');
$puerto = getenv('DB_PORT');
$port = getenv('PORT') ?: 8080; // Usa la variable de entorno PORT o el puerto 80 como predeterminado
echo "Servidor escuchando en el puerto: $port\n";
exec("php -S 0.0.0.0:$port");

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
