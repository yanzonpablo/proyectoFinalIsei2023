<?php
require_once('bd/conexion.php');



if (isset( $_POST['input-buscador'])) {

  $palabra = $_POST['input-buscador'];

  try {
  $bus = $pdo->prepare("SELECT id, nombre, apellido, especialidad, imagen from capacitadores where nombre like '%$palabra%' or apellido like '%$palabra%'");

  $bus->execute();

    } catch(PDOException $e) {

    echo $e->getMessage();
    } 
  } else {

    $bus = $pdo->prepare('SELECT * FROM capacitadores');

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
    <link rel="stylesheet" href="css/capacitadores.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>

    <?php require_once "nav.php" ?>

  <form action="" method="POST">
  <div class="header-content">
      <input type="text" class="input-buscador" id="input-buscador" name="input-buscador" placeholder="Buscar capacitador">
    <button type="text" id="buscador" name="buscador" class="buscador"><i class="fas fa-search"></i></button>
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
          <p class="title">NUESTROS CAPACITADORES</p>
        </div>
        <div class="container-capacitadores " id="lista-capacitadores">
          <?php while($res = $bus->fetch(PDO::FETCH_ASSOC)) { ?>
          <div class="card">
              <a href="<?= 'capacitador.php?id='.$res['id'] ?>" class="linkCapacitador">
                <img src="images/capacitadores/<?= $res['imagen']?>" class="card-img" alt="<? $res['nombre']?>">
                <h4><?= $res['nombre']?> <?= $res['apellido']?>
                  </h4>
                <p><?= $res['especialidad']?>
                  </p>
              </a>
              <a href="<?= 'capacitador.php?id='.$res['id'] ?>" class="button agregar-carrito">CONOCELO</a> 
            </div>
            <?php } ?>
          </div>
      </form>
    </main>
<?php include_once "footer.php" ?>
</body>
</html>