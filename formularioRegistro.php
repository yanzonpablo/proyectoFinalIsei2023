<?php
require_once ('bd/conexion.php');
require_once ('varErrorRegistro.php');

?>
<?php
$consulta = $pdo->query("SELECT id, nombre FROM provincias order by nombre ASC");
?>

<?php
if (isset($_POST['aceptar'])) {
  // -------------- tabla usuarios -------------------------
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];

$datos1 = $pdo->prepare("INSERT INTO usuarios (nombre, apellido, email) VALUE (:nombre, :apellido, :email)");

$datos1->bindParam(':nombre', $nombre);
$datos1->bindParam(':apellido', $apellido);
$datos1->bindParam(':email', $email);

// -------------- afiliados -------------------------

$telefono = $_POST['telefono'];
$dni = $_POST['dni'];
$fecha_nacimiento = date('y-m-d',strtotime($_POST['fecha_nacimiento']));
$direccion = $_POST['direccion'];
$codigo_postal = $_POST['codigo_postal'];
$provincia = isset($_POST['provincia']);

$datos2 = $pdo->prepare('INSERT INTO afiliados (telefono, dni, fecha_nacimiento, direccion, codigo_postal, id_provincia) VALUES (:telefono, :dni, :fecha_nacimiento, :direccion, :codigo_postal, :provincia)');

$datos2->bindParam(':telefono', $telefono);
$datos2->bindParam(':dni', $dni);
$datos2->bindParam(':fecha_nacimiento', $fecha_nacimiento);
$datos2->bindParam(':direccion', $direccion);
$datos2->bindParam(':codigo_postal', $codigo_postal);
$datos2->bindParam(':provincia', $provincia);

if ($_POST['condicion']) {
  $datos1->execute();
  $datos2->execute();
 
} else {
    header('location: formularioRegistro.php');
  }
}

?>

<!DOCTYPE html>
<html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="images/logoCapacitacion.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CAPACITACION</title>
  <!-- inicio font roboto -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto&display=swap" rel="stylesheet">
  <!-- fin font roboto -->
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/formularioRegistro.css">
</head>

<body>
  <?php require_once ('nav.php') ?>
  <section>
  <div class="container">
    <h1 class="form-title">FORMULARIO DE REGISTRO</h1>
    <form action="" method="POST">
      <div class="main-user-info">
        <div class="user-input-box">
          <input type="text" name="nombre" value="" placeholder="Ingrese nombre" />
          <?=$nombreError?>
        </div>
        <div class="user-input-box">
          <input type="text" id="apellido" name="apellido" value="" placeholder="Ingrese apellido" />
          <?=$apellidoError?>
        </div>
        <div class="user-input-box">
          <input type="email" id="email" name="email" value="" placeholder="Ingrese e-mail" />
          <?=$emailError?>
        </div>
        <div class="user-input-box">
          <input type="tel" id="telefono" name="telefono" value="" placeholder="Ingrese teléfono" />
          <span for="teléfono" class="error"></span>
          <?=$telefonoError?>
        </div>
        <div class="user-input-box">
          <input type="text" id="dni" name="dni" value="" placeholder="Ingrese DNI" />
          <?=$dniError?>
        </div>
        <div class="user-input-box">
          <input type="date" id="fechaInicio" name="fecha_nacimiento" value=" " placeholder="* Ingrese fecha de nacimiento" />
          <?=$fecha_nacimientoError?>
        </div>
        <div class="user-input-box">
          <input type="text" id="direccion" name="direccion" value="" placeholder="Ingrese dirección" />
          <?=$direccionError?>
        </div>
        <div class="user-input-box">
          <input type="text" id="codigo_postal" name="codigo_postal" value="" placeholder="Ingrese código postal" />
          <?=$codigoPostalError?>
        </div>
        <div class="user-input-box">
          <select name="provincia" id="provincia" class="style-select">
            <option value="0" selected disabled>* Seleccione una provincia</option>
            <?php
            while($provincia = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?= $provincia['id'] ?>" name="provincia" ><?= $provincia['nombre'] ?></option>
            <?php } ?>
          </select>
              <?= $provinciaError?>
            </div>
      </div>

      <div class="user-input-check">
        <input type="checkbox" id="condicion" name="condicion" placeholder="" value="1" />Aceptar términos y condiciones.
        <?=$condicionError?>
      </div>

      <div class="form-submit-btn">
        <button type="submit" name="aceptar" value="aceptar">Aceptar
      </div>
    </form>
  </div>
</section>
<script src="js/fechaInicio.js"></script>
</body>

</html>