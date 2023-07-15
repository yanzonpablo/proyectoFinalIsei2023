<?php
require_once('bd/conexion.php');


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
    <link rel="stylesheet" href="css/modalRegistro.css">
</head>

<body>
    <!-- <a href="#" class="activaModal"></a> -->
    <section class="modal activaModal">
        <div class="modalContainer">
            <img src="images/check.png" class="modalImg">
            <h3 class="modalTitle">GRACIAS POR REGISTRARSE...!!!</h3>
            <p class="modalDescripcion">En momentos enviaremos las credenciales de acceso al e-mail registrado.</p>
            <a href="#" class="modalClose">Cerrar</a>
        </div>
    </section>
    <script src="js/modalRegistro.js"></script>
</body>
</html>