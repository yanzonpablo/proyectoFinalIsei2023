<?php

require_once('bd/conexion.php');

$consulta = $pdo->prepare('SELECT * FROM newsletters');

$consulta -> execute();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/logoCapacitacion.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAPACITACION</title>

</head>
<body>
    <header>
        <?php require_once("nav.php") ?>
    </header>
    <main>
        <h2>Listado de e-mail suscriptos al newsletters</h2>
        <table>
            <tr>
                <th>Correos electrónicos</th>
                <th>Fecha de alta</th>
            </tr>
            <tr>
                <?php while ($datos = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
                <td><?= $datos['email'] ?></td>
                <td><?= $datos['fecha_alta'] ?></td>
            </tr>
            <?php } ?>
        </table>

        <i class="fas fa-file-excel"></i><a class="btn-excell" href="varios/excel.php">Excel</a>

    </main>
</body>
</html>