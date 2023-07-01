<?php
require_once('bd/conexion.php');

$id = $_GET['id'];

$con = $pdo->prepare("SELECT * FROM camaras WHERE id = $id");

$con->execute();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto&display=swap" rel="stylesheet">
    <title>CAMARAS</title>
    <link rel="stylesheet" href="css/modal.css">
</head>

<body>
    <a href="#" class="activaModal"></a>
    <section class="modal">
        <div class="modalContainer">
            <?php while($res = $con->fetch(PDO::FETCH_ASSOC)) { ?>
            <img src="images/logosCamaras/<?= $res['logo_camara'] ?>" class="modalImg">
            <h2 class="modalTitle"><?= $res['nombre'] ?></h2>
            <p class="modalDescripcion"><?= $res['descripcion'] ?></p>
            <p class="modalTelefono"><strong>Teléfono:</strong> <?= $res['telefono'] ?></p>
            <p class="modalemail"><strong>E-mail:</strong><?= $res['email'] ?></p>
            <p class="modalDireccion"><strong>Dirección:</strong> <?= $res['direccion'] ?></p>
            <p class="modalProvincia"><strong>Provincia:</strong> <?= $res['provincia'] ?></p>
            <p class="modalCodigo_postal"><strong>Cód. Postal:</strong> <?= $res['codigo_postal'] ?></p>
            <p class="modalWeb"><strong>Web:</strong> <?= $res['web'] ?></p>
            <p class="modalFacebook"><strong>Facebook:</strong> <?= $res['facebook'] ?></p>
            <p class="modalinstagram"><strong>Instagram:</strong> <?= $res['instagram'] ?></p>
            <a href="#" class="modalClose">Cerrar</a>
            <?php } ?>
        </div>
    </section>
    <script src="js/modal.js"></script>
</body>
</html>