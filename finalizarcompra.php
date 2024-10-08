<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Total de Factura</title>
</head>
<body>
    <link rel="stylesheet" href="./css/style.css">
    <?php
    if (isset($_SESSION['usuario'])) {
        echo "<h1>Gracias por su compra </h1>
        
        <h2> Hemos guardado su información y acá está su factura. </h1>";
    } else {
        echo "Información de usuario no encontrada.";
    }

    if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
        echo "<h1>Resumen de tu Compra</h1>";
        echo "<table>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>";

        $total_compra = 0;

        foreach ($_SESSION['carrito'] as $producto) {
            $nombre = $producto['nombre'];
            $cantidad = $producto['cantidad'];
            $precio = $producto['precio'];
            $total_producto = $cantidad * $precio;

            echo "<tr>
                <td>$nombre</td>
                <td>$cantidad</td>
                <td>$$precio</td>
                <td>$$total_producto</td>
              </tr>";

            $total_compra += $total_producto;
        }

        echo "</table>";
        echo "<h2>Total de la compra: $$total_compra</h2>";

    } else {
        echo "Error, no se ha encontrado el carrito";
    }
    ?>

    <a href="index.php"><button style="margin-top:15px">Volver al Inicio</button></a>
    <br>
    <a href="vistacarrito.php"><Button style="margin-top:15px">Volver al Carrito</Button></a>
    <br>
    <button id="correo" style="margin-top:15px">Pagar productos</button>
    <br>
</body>
</html>

<script>
    document.getElementById('correo').addEventListener('click', function () {
    Swal.fire({
        title: 'Confirnmado',
        text: 'Se ha enviado un correo a su cuenta con la información del pago',
        icon: 'success'
            });
        });
</script>