<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="images/logoCapacitacion.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CAPACITADOR</title>
  <link href="css/capacitador.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/footer.css">
</head>
<body>
  <header>
    <?php require_once('nav.php') ?>
</header>
    <main>
<?php
require_once ('bd/conexion.php');

$consulta = $pdo->prepare('SELECT nombre, descripcion, logo_camara FROM camaras');
$consulta->execute();


while ($res = $consulta->fetch(PDO::FETCH_ASSOC)) {

  ?>
        <p class="title"></p>
        <div class="linea"></div>
          <div class="container">
            <div class="columna1">
              <p><?= $res['nombre'] ?></p>
              <img src="images/logosCamaras/<?= $res['logo_camara'] ?>">
              <p><?= $res['descripcion'] ?></p>
            </div>
         <?php
        }
         ?>
        </div>
      </div>
      
      <div class="columna2">
        <div class="caja">
           <div class="cursosrelacionados">
                  <p class="encontra">ENCONTRA SUS CURSOS</p>  
              <div class="btncursos">
                <button type="submit" value="Lista">INGRESANDO AQUÍ</button>
              </div>
            </div>
          </div>
        </div>
</main>
  <?php require_once('footer.php'); ?>
</body>
</html>
