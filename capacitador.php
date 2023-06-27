<?php
require_once('bd/conexion.php');

$consulta = $pdo->prepare('SELECT nombre, apellido, especialidad, imagen, descripcion FROM capacitadores');

$consulta->execute();
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="images/logoCapacitacion.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto&display=swap" rel="stylesheet">
  <title>CAPACITADOR</title>
  <link href="css/capacitador.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/footer.css">
</head>
<body>
  <header>
    <?php require_once('nav.php') ?>
</header>
<main>
      <?php while($datos = $consulta->fetch(PDO::FETCH_ASSOC)) {?>
      <p class="title"><?= $datos['nombre'] ?></p>
      <div class="linea"></div>
        <div class="container">
          <div class="columna1">
            <img src="images/capacitadores/<?= $datos['imagen'] ?>">
          </div>
          <div class="columna2">
              <p class="especialidad">Especialidad:<?= $datos['especialidad'] ?></p>
              <p class="parrafo-esecialidad"><?= $datos['descripcion'] ?></p>
          </div>
          </div>
            <?php } ?>
<div class="caja">
    <div class="cursosrelacionados">
    <div class="btncursos">
        <a class="button" href="capacitadores.php">IR A CAPACITADORES</a>
      </div>
    </div>
</div>
</main>
  <?php require_once('footer.php'); ?>
</body>
</html>
