<?php
session_start();
?>
<?php
require_once('bd/conexion.php');

if (isset( $_POST['input-buscador'])) {

  $palabra = $_POST['input-buscador'];

  try {
    
    $bus = $pdo->prepare("SELECT cursos.id, cursos.nombre, cursos.logo_curso, niveles_cursos.carga_horaria, niveles_cursos.nivel, niveles_cursos.carga_horaria FROM cursos INNER JOIN niveles_cursos ON cursos.nivel_curso = niveles_cursos.id WHERE LOWER(cursos.nombre) LIKE LOWER('%$palabra%') AND cursos.nivel_curso = 1");
    
  $bus->execute();
  
} catch(PDOException $e) {
  
  echo $e->getMessage();
} 
} else {
  
  $bus = $pdo->prepare('SELECT cursos.id, cursos.nombre, cursos.logo_curso, niveles_cursos.carga_horaria, niveles_cursos.nivel, niveles_cursos.carga_horaria from cursos INNER JOIN niveles_cursos ON cursos.nivel_curso = niveles_cursos.id WHERE cursos.nivel_curso = 1');

    $bus->execute();

  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/logoCapacitacion.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto&display=swap" rel="stylesheet">
    <title>CAPACITADORES</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="css/cursosPerfeccionamientoT.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
<?php
$rol = isset($_SESSION['rol_usuario']) ? $_SESSION['rol_usuario'] : '';

if ($rol == '') {
    $rol = '0';
}

switch ($rol) {
    case '0':
        include_once "nav.php"; 
        break;
    case '1':
        include_once "navUsuario.php"; 
        break;
    case '2':
        include_once "navAdmin.php"; 
        break;
    default:
        include_once "nav.php"; 
        break;
}
?>
  <form action="" method="POST">
  <div class="header-content">
      <input type="text" class="input-buscador" id="input-buscador" name="input-buscador" placeholder="Buscar curso">
    
  </div>
</form>
    <main>
      <form action="" method="POST">
        <div class="modal" id="modal">
          <div class="modal-content">
            <img src="" alt="" class="modal-img" id="modal-img">
          </div>
        </div>
        <div>
          <p class="title">CURSOS DE PERFECCIONAMIENTO TÉCNICO</p>
        </div>
        <div class="container-capacitadores " id="lista-capacitadores">
          <?php while($res = $bus->fetch(PDO::FETCH_ASSOC)) { ?>
          <div class="card">
              <a href="<?= 'curso.php?id='.$res['id'] ?>" class="linkCapacitador">
                <img src="images/cursos/<?= $res['logo_curso']?>" class="card-img" alt="<? $res['cursos.nombre']?>">
                <h4><?= $res['nombre']?>
                  </h4>

                <span style="font-size: 12px; margin-top: 10pX">Carga Horaria: <?= $res['carga_horaria']?>
          </span>
              </a>
              <a href="<?= 'curso.php?id='.$res['id'] ?>" class="button agregar-carrito">CONOCELO</a> 
            </div>
            <?php } ?>
          </div>
      </form>
    </main>
    <?php include_once "footer.php" ?>
  </body>
</html>