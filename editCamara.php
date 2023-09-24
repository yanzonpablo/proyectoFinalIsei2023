<?php
session_start();

if ($_SESSION['rol_usuario'] != 2) {
	header("location: index.php");
} 
?>

<?php
require_once('bd/conexion.php');

$id = $_GET['id'];

$con = $pdo->prepare("SELECT * FROM camaras WHERE id = $id");

$con->execute();
?>
<?php

require_once ('./varErrorCamara.php');
require_once ('bd/conexion.php');

if (isset($_POST['aceptar'])) {
  
  try {
    
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];

      // ---------------logo-----------------
      $nombre_imagen = $_FILES['logo_camara']['name'];
      $tamano_imagen = $_FILES['logo_camara']['size'];
      $tmp_imagen = $_FILES['logo_camara']['tmp_name'];
      $error_imagen = $_FILES['logo_camara']['error'];

      if ($error_imagen == 0) {
        if($tamano_imagen > 2000000) {
          $info = "Archivo muy grande";
          header('location: formularioCamara.php?error = $info');
        } else {
          $imagen_extension = pathinfo($nombre_imagen, PATHINFO_EXTENSION);
          $imagen_extension_1 = strtolower($imagen_extension);

          $imagenPermitida = array('png', 'jpg', 'jpeg', 'gif');

          if (isset($_FILES['logo_camara'])) { 
            if (in_array($imagen_extension, $imagenPermitida)) {
              $nombreNuevaImagen = uniqid("IMG-", true).".".$imagen_extension_1;
              $imagen_subida = "images/logosCamaras/". $nombreNuevaImagen;
              move_uploaded_file($tmp_imagen, $imagen_subida);
            }
          }
        }
      }
      // ---------------fin logo-----------------

      $telefono = $_POST['telefono'];
      $direccion = $_POST['direccion'];
      $codigo_postal = $_POST['codigo_postal'];
      $provincia = $_POST['provincia'];
      $email = $_POST['email'];
      $web = $_POST['web'];
      $facebook = $_POST['facebook'];
      $instagram = $_POST['instagram'];

      $query = $pdo->prepare("UPDATE camaras SET nombre = :nombre, descripcion = :descripcion, logo_camara = :logo_camara, telefono = :telefono, direccion = :direccion, codigo_postal = :codigo_postal, provincia = :provincia, email = :email, web = :web, facebook = :facebook, instagram = :instagram WHERE id = $id");
      
      $query->bindParam(':nombre', $nombre);
      $query->bindParam(':descripcion', $descripcion);
      $query->bindParam(':logo_camara', $nombreNuevaImagen);
      $query->bindParam(':telefono', $telefono);
      $query->bindParam(':direccion', $direccion);
      $query->bindParam(':codigo_postal', $codigo_postal);
      $query->bindParam(':provincia', $provincia);
      $query->bindParam(':email', $email);
      $query->bindParam(':web', $web);
      $query->bindParam(':facebook', $facebook);
      $query->bindParam(':instagram', $instagram);

      $query->execute();

    } catch(PDOException $e) {

      echo $e->getMessage();
    }
    
    header('location: abmCamaras.php');
  
    } else {

      if (isset($_POST['cancelar'])) {
  
      header('location: abmCamaras.php');
    }
}
?>
<?php
      // ---------------provincias-----------------
require_once ('bd/conexion.php');

$consulta = $pdo->query("SELECT id, nombre FROM provincias ORDER BY nombre ASC");
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
  <!-- iconos -->
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
    integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
    crossorigin="anonymous"></script>
  <!-- fin iconos -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/editCamara.css">
</head>

<body>
<?php require_once("navAdmin.php") ?>
  <section>
    <div class="container">
      <h1 class="form-title">EDICION REGISTRO DE CAMARA</h1>
      <form action="" method="POST" enctype="multipart/form-data">
        <?php while($res = $con->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="main-user-info">

          <div class="user-input-box">
            <input type="text" name="nombre" value="<?= $res['nombre'] ?>" placeholder="Ingrese nombre" />
            <?=$nombreError?>
          </div>

          <div class="user-input-box">
            <input type="text" id="descripcion" name="descripcion" value="<?= $res['descripcion'] ?>"
              placeholder="Ingrese descripción" />
            <?=$descripcionError?>
          </div>

          <label for="logo_camara" class="textoLogo"><i class="fa fa-upload fa-lg" aria-hidden="true"
              style="color: #027fb5; margin-right: 5px;"></i>Subir Imagen
            <div class="user-input-boxFile2">
              <input type="file" id="logo_camara" name="logo_camara"
                value="images/logosCamaras/<?= $res['logo_camara'] ?>" />
              <img class="imagencapacitador" width="50%" src="images/logosCamaras/<?= $res['logo_camara'] ?>" alt="">
            </div>
          </label>

          <div class="user-input-box">
            <input type="tel" id="telefono" name="telefono" value="<?= $res['telefono'] ?>"
              placeholder="Ingrese teléfono" />
            <span for="teléfono" class="error"></span>
            <?=$telefonoError?>
          </div>

          <div class="user-input-box">
            <input type="text" id="direccion" name="direccion" value="<?= $res['direccion'] ?>"
              placeholder="Ingrese dirección" />
            <?=$direccionError?>
          </div>

          <div class="user-input-box">
            <input type="text" id="codigo_postal" name="codigo_postal" value="<?= $res['codigo_postal'] ?>"
              placeholder="Ingrese código postal" />
            <?=$codigoPostalError?>
          </div>
          
          <div class="user-input-box">
            <select name="provincia" id="provincia" class="style-select">
              <option value="<?= $res['provincia'] ?>">
                <?= $res['provincia'] ?>
              </option>
              <?php
            while($provincias = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
              <option value="<?= $provincias['nombre'] ?>" name="provincia">
                <?= $provincias['nombre'] ?>
              </option>
              <?php } ?>
            </select>
            <?= $provinciaError?>
          </div>

          <div class="user-input-box">
            <input type="email" id="email" name="email" value="<?= $res['email'] ?>" placeholder="Ingrese e-mail" />
            <?=$emailError?>
          </div>

          <div class="user-input-box">
            <input type="text" id="web" name="web" value="<?= $res['web'] ?>" placeholder="Ingrese web" />
            <?=$webError?>
          </div>

          <div class="user-input-box">
            <input type="text" id="facebook" name="facebook" value="<?= $res['facebook'] ?>"
              placeholder="Ingrese facebook" />
            <?=$facebookError?>
          </div>

          <div class="user-input-box">
            <input type="text" id="instagram" name="instagram" value="<?= $res['instagram'] ?>"
              placeholder="Ingrese instagram" />
            <?=$instagramError?>
          </div>
          <?php } ?>
        </div>
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
</body>

</html>