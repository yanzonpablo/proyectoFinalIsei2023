<?php
require_once ('bd/conexion.php');
require_once ('./validacionFunction.php');
require_once ('./varError.php');

if (isset($_POST['aceptar'])) {
    $check_fn = validarCampo('nombre', $descripcionDeCampo='nombre', 3,30);
    $nombre = $check_fn['campo'];
    $nombreError =  $check_fn['msg'];
    $error = $check_fn['estado'];
    }
?>
<?php
$consulta = $pdo->query("SELECT id, nombre FROM provincias order by nombre DESC");
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
          <input type="text" name="nombre" value="<?php if (isset($nombre)) echo $nombre ?>" placeholder="Ingrese nombre" />
          <?=$nombreError?>
        </div>
        <div class="user-input-box">
          <input type="text" id="apellido" name="apellido" value="<?php if (isset($apellido)) echo $apellido ?>" placeholder="Ingrese apellido" />
          <?=$apellidoError?>
        </div>
        <div class="user-input-box">
          <input type="email" id="email" name="email" value="<?php if (isset($email)) echo $email ?>" placeholder="Ingrese e-mail" />
          <?=$emailError?>
        </div>
        <div class="user-input-box">
          <input type="tel" id="telefono" name="telefono" value="<?php if (isset($telefono)) echo $telefono ?>" placeholder="Ingrese teléfono" />
          <span for="teléfono" class="error"></span>
          <?=$telefonoError?>
        </div>
        <div class="user-input-box">
          <input type="text" id="dni" name="dni" value="<?php if (isset($dni)) echo $dni ?>" placeholder="Ingrese DNI" />
          <?=$dniError?>
        </div>
        <div class="user-input-box">
          <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php if (isset($fechaNacimiento)) echo $fechaNacimiento ?>" placeholder="" />
          <?=$fechaNacimientoError?>
        </div>
        <div class="user-input-box">
          <input type="text" id="direccion" name="direccion" value="<?php if (isset($direccion)) echo $direccion ?>" placeholder="Ingrese dirección" />
          <?=$direccionError?>
        </div>
        <div class="user-input-box">
          <input type="text" id="codigoPostal" name="codigoPostal" value="<?php if (isset($codigoPostal)) echo $codigoPostal ?>" placeholder="Ingrese código postal" />
          <?=$codigoPostalError?>
        </div>
        <div class="user-input-box">
        <select name="provincia" id="provincia" class="style-select">
            <?php
            while($provincias = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?= $provincias['nombre'] ?>" selected="<?$provincias['id'=25]?>" name="provincia" ><?= $provincias['nombre'] ?></option>
              <?php } ?>
              </select>
                        <?= $provinciaError?>
                      </div>
          <div class="user-input-box">
              <input type="text" id="ciudad" name="ciudad" value="<?php if (isset($ciudad)) echo $ciudad ?>" placeholder="Ingrese ciudad" />
              <?=$ciudadError?>
          </div>
          <div class="user-input-box">
          <input type="password" id="password" name="password" placeholder="Ingrese Password" />
          <?=$passwordError?>
        </div>
        <div class="user-input-box">
          <input type="password" id="rePassword" name="rePassword" placeholder="Confirmar Password" />
          <?=$rePasswordError?>
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
</body>

</html>