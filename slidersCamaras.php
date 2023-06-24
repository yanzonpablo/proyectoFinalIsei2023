<?php
require_once ('bd/conexion.php');

$consulta = $pdo->prepare('SELECT nombre, descripcion, logo_camara FROM camaras');
$consulta->execute();


?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/sliderscamaras.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="js/sliderscamaras.js" defer></script>
  </head>
  <body>
    <main>
      <p class="titulo">CAMARAS ADHERIDAS</p>
      <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <ul class="carousel">
          <?php 
          while($res = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
          <li class="card">
            <div class="img"><a href=""><img src="images/logosCamaras/<?= $res['logo_camara'] ?>" alt="<? $res['nombre'] ?>" draggable="false"></div></a>
            <h2><?= $res['nombre'] ?></h2>
            <span><?= $res['descripcion'] ?></span>
            <?php } ?>
        </li>
      </ul>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
    </main>  
  </body>
</html>