<?php
require_once('bd/conexion.php');


if (isset($_POST['buscador'])) {
  
  // try {
  $palabra = $_POST['buscador'];
  
  $consulta = $pdo->prepare("SELECT * FROM capacitadores WHERE nombre OR apellido like '%$palabra%'");

  $consulta->execute();
  
  // } catch(PDOException $e) {

  //   echo $e->getMessage();
  // }
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
  <header>
    <?php require_once "nav.php" ?>
  </header>
  <div class="header-content">
      <input type="text" class="input-buscador" placeholder="Buscar capacitador" name="buscador" id="buscador">
    <button type="buscador" name="buscador" id="buscador" class="buscador"><i class="fas fa-search"></i></button>
  </div>
    <main>
      <div class="modal" id="modal">
        <div class="modal-content">
          <img src="" alt="" class="modal-img" id="modal-img">
        </div>
        <div class="modal-boton" id="modal-boton">X</div>
      </div>
      <div>
        <p class="title">NUESTROS CAPACITADORES</p>
      </div>
      <div class="container-capacitadores" id="lista-capacitadores">
        <div class="card">
          <?php while ($capacitador = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
            <a href="<?= 'capacitador.php?id='.$capacitador['id'] ?>" class="linkCapacitador">
            <img src="images/capacitadores/<?= $capacitador['imagen']?>" class="card-img" alt="<? $capacitador['nombre']?>">
            <h4><?= $capacitador['nombre']?>.<?= $capacitador['apellido']?></h4>
            <p><?= $capacitador['especialidad']?></p></a>
            <?php } ?>
            <a href="<?= 'capacitador.php?id='.$capacitador['id'] ?>" class="button agregar-carrito">CONOCELO</a> 
          </div>
        </div>
</main>
<?php include_once "footer.php" ?>
</body>
</html>