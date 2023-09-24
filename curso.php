<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registro"])) {
  // Conexión a la bd
  $pdo = new PDO("mysql:host=localhost;dbname=capacitacion", "root", "d79f2f87");
  // Verificar si el usuario está autenticado
  if (!isset($_SESSION["id"])) {
    header('location: login.php');
  } else {
    // Capturar id del usuario y curso
    $id_usuario = $_SESSION["id"];
    $id_curso = $_GET['id'];

    $sql = $pdo->prepare("INSERT INTO inscripciones (id_usuario, id_curso) VALUES (:id_usuario, :id_curso)");
    $sql->bindParam(":id_usuario", $id_usuario);
    $sql->bindParam(":id_curso", $id_curso);
    $sql->execute();
  }
}
?>
<?php
require_once('bd/conexion.php');

$id = $_GET['id'];

$consulta = $pdo->prepare("SELECT id, nombre, descripcion, logo_curso, fecha_inicio, fecha_fin 
FROM cursos where id = $id");

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
  <link href="css/curso.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/footer.css">
</head>

<body>
  <?php require_once('nav.php') ?>
  <main>
    <?php while ($datos = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
      <p class="title"><?= $datos['nombre'] ?></p>
      <p class="especialidad">Fecha de Inicio: <?= $datos['fecha_fin'] ?></p>
      <div class="linea"></div>
      <div class="container">
        <div class="columna1">
          <img src="images/cursos/<?= $datos['logo_curso'] ?> ">
          <p class="parrafo-especialidad"><?= $datos['descripcion'] ?></p>
        </div>
        <!-- <div class="columna2">
          </div> -->
      </div>
      <p class="fin">Fecha de finalización: <?= $datos['fecha_fin'] ?></p>
    <?php } ?>
    <form action="" method="POST" class="btn-reg">
      <button type="submit" value="registro" name="registro" class="registro">Registrate</button>
    </form>
    <div class="caja">
      <div class="cursosrelacionados">
        <div class="btncursos">
          <a class="button" href="index.php#listaCursos">IR A CURSOS</a>
        </div>
      </div>
    </div>
  </main>
  <?php require_once('footer.php') ?>
</body>

</html>