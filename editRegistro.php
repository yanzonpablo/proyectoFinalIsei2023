<?php
require_once ('bd/conexion.php');
require_once ('varErrorRegistro.php');

?>
<?php
require_once('bd/conexion.php');
$consulta = $pdo->query("SELECT * FROM provincias order by nombre ASC");
?>

<?php
require_once('bd/conexion.php');
$estado = $pdo->query("SELECT * FROM estados_usuarios");
?>

<?php
require_once('bd/conexion.php');
$roles = $pdo->query("SELECT * FROM roles_usuarios");
?>


<?php
require_once('bd/conexion.php');

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    try {

  $resultado = $pdo->prepare("SELECT usuarios.id as usuId, usuarios.nombre, usuarios.apellido, usuarios.email,usuarios.rol_usuario,
  afiliados.telefono, afiliados.dni, afiliados.fecha_nacimiento, afiliados.direccion, afiliados.codigo_postal, afiliados.id_provincia, 
  roles_usuarios.id AS rolId, roles_usuarios.roles AS roles,
  estados_usuarios.estado, estados_usuarios.valor AS valor,
  provincias.id AS pciaId, provincias.nombre AS pciaNom
  FROM usuarios
  INNER JOIN roles_usuarios ON usuarios.rol_usuario = roles_usuarios.id
  INNER JOIN afiliados ON usuarios.id = afiliados.id_usuario
  INNER JOIN provincias ON afiliados.id_provincia = provincias.id 
  INNER JOIN estados_usuarios ON afiliados.id_estado = estados_usuarios.valor WHERE usuarios.id = $id");

      $resultado -> execute();

    } catch(PDOException $e) {

        echo $e->getMessage();
    }
}
?>

<!-- <?php
require_once('bd/conexion.php');
if (isset($_POST['aceptar'])) {
  // -------------- tabla usuarios -------------------------
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$roles_usuarios = $_POST['roles_usuarios'];

$datos1 = $pdo->prepare("UPDATE usuarios SET nombre = :nombre, apellido = :apellido, email = :email, rol_usuario = :rol_usuario WHERE id = $id");

$datos1->bindParam(':nombre', $nombre);
$datos1->bindParam(':apellido', $apellido);
$datos1->bindParam(':email', $email);
$datos1->bindParam(':rol_usuario', $roles_usuarios);

// -------------- afiliados -------------------------

$telefono = $_POST['telefono'];
$dni = $_POST['dni'];
$fecha_nacimiento = date('y-m-d',strtotime($_POST['fecha_nacimiento']));
$direccion = $_POST['direccion'];
$codigo_postal = $_POST['codigo_postal'];
$provincia = $_POST['provincia'];
$id_estado = $_POST['id_estado'];

$datos2 = $pdo->prepare("UPDATE afiliados SET telefono = :telefono, dni = :dni, fecha_nacimiento = :fecha_nacimiento, direccion = :direccion, codigo_postal = :codigo_postal, id_provincia = :provincia, id_estado = :id_estado WHERE $id = afiliados.id_usuario");

$datos2->bindParam(':telefono', $telefono);
$datos2->bindParam(':dni', $dni);
$datos2->bindParam(':fecha_nacimiento', $fecha_nacimiento);
$datos2->bindParam(':direccion', $direccion);
$datos2->bindParam(':codigo_postal', $codigo_postal);
$datos2->bindParam(':provincia', $provincia);
$datos2->bindParam(':id_estado', $id_estado);

$datos1->execute();
// $last_id = $pdo->lastInsertId();
$datos2->execute();

header('location: abmUsuarios.php');

} 

if (isset($_POST['cancelar'])) {
  
  header ('location: abmUsuarios.php');

}

?> -->

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
  <link rel="stylesheet" href="css/editRegistro.css">
</head>

<body>
<?php require_once ('nav.php') ?>
<main>
<section>
    <div class="container">
      <form action="" method="POST">
        <h1 class="form-title">EDICION REGISTRO USUARIO</h1>
        <?php while($info = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="main-user-info">
        <div class="user-input-box">
          <input type="text" name="nombre" value="<?= $info['nombre'] ?>" placeholder="Ingrese nombre" />
          <?=$nombreError?>
        </div>
        <div class="user-input-box">
          <input type="text" id="apellido" name="apellido" value="<?= $info['apellido'] ?>" placeholder="Ingrese apellido" />
          <?=$apellidoError?>
        </div>
        <div class="user-input-box">
          <input type="email" id="email" name="email" value="<?= $info['email'] ?>" placeholder="Ingrese e-mail" />
          <?=$emailError?>
        </div>
        <div class="user-input-box">
          <input type="tel" id="telefono" name="telefono" value="<?= $info['telefono'] ?>" placeholder="Ingrese teléfono" />
          <span for="teléfono" class="error"></span>
          <?=$telefonoError?>
        </div>
        <div class="user-input-box">
          <input type="text" id="dni" name="dni" value="<?= $info['dni'] ?>" placeholder="Ingrese DNI" />
          <?=$dniError?>
        </div>
        <div class="user-input-box">
          <input type="date" id="fechaInicio" name="fecha_nacimiento" value="<?= $info['fecha_nacimiento'] ?>" placeholder="* Ingrese fecha de nacimiento" />
          <?=$fecha_nacimientoError?>
        </div>
        <div class="user-input-box">
          <input type="text" id="direccion" name="direccion" value="<?= $info['direccion'] ?>" placeholder="Ingrese dirección" />
          <?=$direccionError?>
        </div>
        <div class="user-input-box">
          <input type="text" id="codigo_postal" name="codigo_postal" value="<?= $info['codigo_postal'] ?>" placeholder="Ingrese código postal" />
          <?=$codigoPostalError?>
        </div>
        <div class="user-input-box">
          <select name="provincia" id="provincia" class="style-select">
            <option value="<?= $info['pciaId'] ?>" name="provincia" selected disabled><?= $info['pciaNom'] ?></option>
            <?php while($provincias = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $provincias['id'] ?>" name="provincia" ><?= $provincias['nombre'] ?></option>
            <?php } ?>
          </select>
          <?= $provinciaError?>
            </div>

            <div class="user-input-box">
          <select name="id_estado" id="id_estado" class="style-select">
            <option value="<?= $info['valor'] ?>" name="id_estado" selected disabled><?= $info['estado'] ?></option>
            <?php while($estados = $estado->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $estados['valor'] ?>" name="id_estado" ><?= $estados['estado'] ?></option>
            <?php } ?>
          </select>
          <?= $provinciaError?>
            </div>

            <div class="user-input-box">
          <select name="roles_usuarios" id="roles_usuarios" class="style-select">
            <option value="<?= $info['rolId'] ?>" name="roles_usuarios" selected disabled><?= $info['roles'] ?></option>
            <?php while($rol = $roles->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $rol['id'] ?>" name="roles_usuarios" ><?= $rol['roles'] ?></option>
            <?php } ?>
          </select>
          <?= $provinciaError?>
            </div>
      </div>

      <?php } ?>
      <div class="linea"></div>
        <div class="contenedorBtn">
          <div class="form-submit-btn">
            <button type="submit" name="cancelar" value="cancelar">Cancelar
          </div>
          <div class="form-submit-btn">
            <button type="submit" name="aceptar" value="aceptar">Registrar
          </div>

        </div>
        </form>
  </div>
</section>
</main>
<script src="js/fechaInicio.js"></script>
</body>

</html>