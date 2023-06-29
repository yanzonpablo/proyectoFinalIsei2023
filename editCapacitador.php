<?php
require_once('bd/conexion.php');

$id = $_GET['id'];

$con = $pdo->prepare("SELECT * FROM capacitadores WHERE id = $id");

$con->execute();
?>

<?php
require_once ('varErrorCapacitador.php');
require_once ('bd/conexion.php');

if (isset($_POST['aceptar'])) {

  try {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $cuil_cuit = $_POST['cuil_cuit'];

  // ---------------imagen-----------------
  $nombre_imagen = $_FILES['imagen']['name'];
  $tamano_imagen = $_FILES['imagen']['size'];
  $tmp_imagen = $_FILES['imagen']['tmp_name'];
  $error_imagen = $_FILES['imagen']['error'];

  if ($error_imagen == 0) {
    if($tamano_imagen > 2000000) {
      $info = "Archivo muy grande";
      header('location: formularioCamara.php?error = $info');
    } else {
      $imagen_extension = pathinfo($nombre_imagen, PATHINFO_EXTENSION);
      $imagen_extension_1 = strtolower($imagen_extension);

      $imagenPermitida = array('png', 'jpg', 'jpeg', 'gif');

      if (isset($_FILES['imagen'])) { 
        if (in_array($imagen_extension, $imagenPermitida)) {
          $nombreNuevaImagen = uniqid("IMG-", true).".".$imagen_extension_1;
          $imagen_subida = "images/capacitadores/". $nombreNuevaImagen;
          move_uploaded_file($tmp_imagen, $imagen_subida);
        }
      }
    }
  }
  // ---------------fin logo-----------------

  $telefono = $_POST['telefono'];
  $direccion = $_POST['direccion'];
  $codigo_postal = $_POST['codigo_postal'];
  $email = $_POST['email'];
  $especialidad = $_POST['especialidad'];
  $descripcion = $_POST['descripcion'];
  $provincia = $_POST['provincia'];

  $consulta = $pdo->prepare("UPDATE capacitadores SET nombre = :nombre, apellido = :apellido, cuil_cuit = :cuil_cuit, imagen = :imagen, telefono = :telefono, direccion = :direccion, codigo_postal = :codigo_postal, email = :email, especialidad = :especialidad, descripcion = :descripcion, provincia = :provincia WHERE id = $id");
  
  $consulta->bindParam(':nombre', $nombre);
  $consulta->bindParam(':apellido', $apellido);
  $consulta->bindParam(':cuil_cuit', $cuil_cuit);
  $consulta->bindParam(':imagen', $nombreNuevaImagen);
  $consulta->bindParam(':telefono', $telefono);
  $consulta->bindParam(':direccion', $direccion);
  $consulta->bindParam(':codigo_postal', $codigo_postal);
  $consulta->bindParam(':email', $email);
  $consulta->bindParam(':especialidad', $especialidad);
  $consulta->bindParam(':descripcion', $descripcion);
  $consulta->bindParam(':provincia', $provincia);

  $consulta->execute();
    } catch(PDOException $e) {

      echo $e->getMessage();
    }
}

?>

<?php
$consulta = $pdo->query("SELECT id, nombre FROM provincias order by nombre ASC");
?>

<!DOCTYPE html>
<html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="images/logoCapacitacion.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CAPACITACION ABM</title> 
  <!-- inicio font roboto -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto&display=swap" rel="stylesheet">
  <!-- fin font roboto -->
  <!-- iconos -->
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <!-- fin iconos -->
    <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/editCapacitador.css">
</head>

<body>
  <?php require_once ('nav.php') ?>
  <section>
  <div class="container">
    <h1 class="form-title">ACTUALIZAR CAPACITADOR</h1>
    <?php while($res = $con->fetch(PDO::FETCH_ASSOC)) { ?>
    <form action="" method="POST" enctype="multipart/form-data">
      <div>
        <div class="main-user-info">
        <div class="user-input-box">
        <input type="text" name="nombre" value="<?= $res['nombre'] ?>" placeholder="Ingrese nombre" />
        <?=$nombreError?></div>

        <div class="user-input-box">
        <input type="text" name="apellido" value="<?= $res['apellido'] ?>" placeholder="Ingrese apellido" />
        <?=$apellidoError?></div>

        <div class="user-input-box">
        <input type="text" name="cuil_cuit" value="<?= $res['cuil_cuit'] ?>" placeholder="Ingrese CUIL/CUIT" />
        <?=$cuilCuitError?></div>
          

        <div class="user-input-box">
        <input type="text" id="telefono" name="telefono" value="<?= $res['telefono'] ?>" placeholder="Ingrese número de teléfono" />
        <span for="teléfono" class="error"></span>
        <?=$telefonoError?></div>
          
        <div class="user-input-box">
        <input type="text" name="email" value="<?= $res['email'] ?>" placeholder="Ingrese e-mail" />
        <?=$emailError?></div>
        
        <div class="user-input-box">
        <input type="text" name="direccion" value="<?= $res['direccion'] ?>" placeholder="Ingrese dirección" />
        <?=$direccionError?></div>
        
        <div class="user-input-box">
          <input type="text" name="codigo_postal" value="<?= $res['codigo_postal'] ?>" placeholder="Ingrese código postal" />
          <?=$codigo_postalError?></div>
          
          <div class="user-input-box">
            <select name="provincia" id="provincia" class="style-select">
              <option value="0" selected disabled>* Seleccione una provincia</option>
              <?php
        while($provincias = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
        <option value="<?= $provincias['nombre'] ?>" name="provincia" id="provincia"><?= $provincias['nombre'] ?></option>
        <?php } ?>
      </select>
    </div>
    
    <label for="imagen" class="textoLogo"><i class="fa fa-upload fa-lg" aria-hidden="true" style="color: #027fb5; margin-right: 5px;"></i>Subir Imagen
    <div class="user-input-boxFile2">
      <input type="file" id="imagen" name="imagen"/>
      <img class="imagencapacitador" width="50%"src="images/capacitadores/<?= $res['imagen'] ?>" alt="">
    </div></label>
    
    <div class="user-input-box">
        <input type="text" name="especialidad" value="<?= $res['especialidad'] ?>" placeholder="<?= $res['especialidad'] ?>" />
        <?=$especialidadError?>
      </div>
    </div>
    
    <div class="user-input-box2">
      <label for="descripcion">Ingrese descripción:</label>
      <textarea type="text" id="descripcion" rows="10"  name="descripcion" value="<?= $res['descripcion'] ?>" class="textareaCurso"><?= $res['descripcion'] ?> </textarea>
      <?=$descripcionError?>
    </div>
    <?php } ?>
    <div class="form-submit-btn">
      <button type="submit" name="aceptar" value="aceptar">Registrar
        </div>
          </form>
  </div>
</section>
</body>

</html>