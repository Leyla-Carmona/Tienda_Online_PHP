<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, telefono, correo) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $telefono, $correo);


    $_SESSION['usuario'] = [
        'nombre' => $nombre,
        'correo' => $correo,
        'telefono' => $telefono
    ];

    if ($stmt->execute()) {
        header('Location: finalizarcompra.php');
    } else {
        echo json_encode(['message' => 'Error al enviar sus datos. Por favor, intente de nuevo.</p>']);
    }
    
    $stmt->close();
}

$conn->close();