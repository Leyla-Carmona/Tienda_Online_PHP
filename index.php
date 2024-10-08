<?php
$host = "localhost";
$basededatos = "tienda";
$user = "root"; 
$password = ""; 

$conn = new mysqli('localhost', 'root', '', 'tienda', 3306);

if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}

include 'conexion.php';

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Tienda en Línea</title>
</head>
<body>
    <h1 style="float:left">Tienda</h1>  <br>  
    <form action="vistacarrito.php" method="get">
        <input type="submit" value="Ver al carrito" style="margin-left:25px"></input>
    <div class="galeria" style="margin-top:25px">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="producto">
                <img src="images/<?php echo $row['imagen']; ?>" alt="<?php echo $row['nombre']; ?>" width="150">
                <h2><?php echo $row['nombre']; ?></h2>
                <p><?php echo $row['detalle']; ?></p>
                <p>Precio: $<?php echo $row['precio']; ?></p>
                <form class="agregar" data-codigo="<?php echo $row['codigo']; ?>">
                    <input type="hidden" name="codigo" value="<?php echo $row['codigo']; ?>">
                    <input type="submit" value="Agregar al carrito">  
                </form>
            </form>
            </div>
        <?php } ?>
    </form>
    </div>
</body>
</html>
<script>
$(document).ready(function() {
    $(".agregar").on("submit", function(e) {
        e.preventDefault();
        var codigo = $(this).data('codigo');

        $.post("carrito.php", { codigo: codigo }, function(response) {
            swal({
                title: 'Exito',
                text: 'Producto agregado exitosamente',
                icon: 'success',
            });
        });
    });
});
</script>