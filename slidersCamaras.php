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
    <script src="js/modal.js"></script>
  </head>
  <body>
    <main id="camarasAdheridas">
      <section>
      <p class="titulo">CAMARAS ADHERIDAS</p>
      <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <ul class="carousel">
          <?php 
          while($res = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
          <li class="card">

            <div class="img activaModal"><a href="modal.php"><img src="images/logosCamaras/<?= $res['logo_camara'] ?>" alt="<? $res['nombre'] ?>" draggable="false"></div>
            <h2 class="modaltitle"><?= $res['nombre'] ?></h2>
            <span class="modaldescripcion"><?= $res['descripcion'] ?></span></a>

            <?php } ?>
        </li>
      </ul>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
    </section>
    </main>  
  </body>
</html>