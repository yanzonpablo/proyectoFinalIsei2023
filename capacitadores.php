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
    <?php include_once "nav.php" ?>
  </header>
  <div class="header-content">
      <input type="text" class="input-buscador" placeholder="Buscar Capacitador">
    <button type="buscador" name="buscador" class="buscador"><i class="fas fa-search"></i></button>
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
            <img src="images/capacitadores/user-1658264382872.jpg" class="card-img">
            <h4>Guillermo Perez</h4>
            <p>CAPACITADOR</p>
            <a href="capacitador.php" class="button agregar-carrito">CONOCELO</a>
          </div>
          <div class="card">
            <img src="images/capacitadores/user-1658188615419.jpg" class="card-img">
            <h4>Ramon Suarez</h4>
            <p>CAPACITADOR</p>
            <a href="#" class="button agregar-carrito">CONOCELO</a>
          </div>
          <div class="card">
            <img src="images/capacitadores/user-1658264382872.jpg" class="card-img">
            <h4>Guillermo Perez</h4>
            <p>CAPACITADOR</p>
            <a href="#" class="button agregar-carrito">CONOCELO</a>
          </div>
          <div class="card">
            <img src="images/capacitadores/user-1658188615419.jpg" class="card-img">
            <h4>Ramon Suarez</h4>
            <p>CAPACITADOR</p>
            <a href="#" class="button agregar-carrito">CONOCELO</a>
          </div>
          <div class="card">
            <img src="images/capacitadores/user-1658264382872.jpg" class="card-img">
            <h4>Guillermo Perez</h4>
            <p>CAPACITADOR</p>
            <a href="#" class="button agregar-carrito">CONOCELO</a>
          </div>
          <div class="card">
            <img src="images/capacitadores/user-1658188615419.jpg" class="card-img">
            <h4>Ramon Suarez</h4>
            <p>CAPACITADOR</p>
            <a href="#" class="button agregar-carrito">CONOCELO</a>
          </div>
          <div class="card">
            <img src="images/capacitadores/user-1658264382872.jpg" class="card-img">
            <h4>Guillermo Perez</h4>
            <p>CAPACITADOR</p>
            <a href="#" class="button agregar-carrito">CONOCELO</a>
          </div>
          <div class="card">
            <img src="images/capacitadores/user-1658188615419.jpg" class="card-img">
            <h4>Ramon Suarez</h4>
            <p>CAPACITADOR</p>
            <a href="#" class="button agregar-carrito">CONOCELO</a>
          </div>
        </div>
</main>
<?php include_once "footer.php" ?>
</body>
</html>