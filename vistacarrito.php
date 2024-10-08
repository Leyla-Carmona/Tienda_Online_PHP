<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Carrito</title>
</head>

<body>
    <h1>Carrito</h1>

    <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) { ?>
        <table>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total de Compra</th>
            </tr>
            <?php foreach ($_SESSION['carrito'] as $producto) { ?>
                <tr>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><?php echo $producto['cantidad']; ?></td>
                    <td>$<?php echo $producto['precio']; ?></td>
                    <td>$<?php echo ($producto['precio'] * $producto['cantidad']) ?></td>
                </tr>
            <?php } ?>
        </table>

        <form action="vaciarcarrito.php" method="post">
            <input style="margin-top: 45px;" type="submit" value="Vaciar Carrito">
        </form>
    <?php } else { ?>
        <p>El carrito está vacío, porfavor agregue productos para finalizar compra </p>
    <?php } ?>
    
    <form action="index.php" method="get">
        <input style="margin-top: 45px;" type="submit" value="Volver al inicio">
    </form>

    <form action="guardarusuario.php" method="POST">
        <h2>Por favor registre su información</h2>
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="correo">Correo electrónico:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="telefono">Teléfono de contacto:</label><br>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <input type="submit" value="Finalizar Compra">
    </form>
</body>
</html>