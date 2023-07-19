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
 

  $consulta = $pdo->prepare('INSERT INTO capacitadores (nombre, apellido, cuil_cuit, imagen, telefono, direccion, codigo_postal, email, especialidad, descripcion, provincia) VALUES (:nombre, :apellido, :cuil_cuit, :imagen, :telefono, :direccion, :codigo_postal, :email, :especialidad, :descripcion, :provincia)');
  
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
  header('location: abmCapacitadores.php');
  
  } else {
    
    if (isset($_POST['cancelar'])) {

      header('location: abmCapacitadores.php');
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
  <title>CAPACITACION</title> 
  <!-- inicio font roboto -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto&display=swap" rel="stylesheet">
  <!-- fin font roboto -->
  <!-- iconos -->
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <!-- fin iconos -->
    <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/formularioCapacitador.css">
</head>

<body>
  <?php require_once ('nav.php') ?>
  <section>
  <div class="container">
    <h1 class="form-title">REGISTRO CAPACITADOR</h1>
    <form action="" method="POST" enctype="multipart/form-data">
      <div>
      <div class="main-user-info">

        <div class="user-input-box">
        <input type="text" name="nombre" value="<?php if (isset($nombre)) echo $nombre ?>" placeholder="Ingrese nombre" />
        <?=$nombreError?></div>

        <div class="user-input-box">
        <input type="text" name="apellido" value="<?php if (isset($apellido)) echo $apellido ?>" placeholder="Ingrese apellido" />
        <?=$apellidoError?></div>

        <div class="user-input-box">
        <input type="text" name="cuil_cuit" value="<?php if (isset($cuil_cuit)) echo $cuil_cuit ?>" placeholder="Ingrese CUIL/CUIT" />
        <?=$cuilCuitError?></div>
          

        <div class="user-input-box">
        <input type="text" id="telefono" name="telefono" value="" placeholder="Ingrese número de teléfono" />
        <span for="teléfono" class="error"></span>
        <?=$telefonoError?></div>
          
        <div class="user-input-box">
        <input type="text" name="email" value="<?php if (isset($email)) echo $email ?>" placeholder="Ingrese e-mail" />
        <?=$emailError?></div>
        
        <div class="user-input-box">
        <input type="text" name="direccion" value="<?php if (isset($direccion)) echo $direccion ?>" placeholder="Ingrese dirección" />
        <?=$direccionError?></div>

        <div class="user-input-box">
        <input type="text" name="codigo_postal" value="<?php if (isset($codigo_postal)) echo $codigo_postal ?>" placeholder="Ingrese código postal" />
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
        <div class="user-input-boxFile">
          <input type="file" id="imagen" name="imagen"/>
        </div>
        </label>

        <div class="user-input-box">
        <input type="text" name="especialidad" value="<?php if (isset($especialidad)) echo $especialidad ?>" placeholder="Ingrese especialidad capacitadora" />
        <?=$especialidadError?>
        </div>
        </div>

        <div class="user-input-box2">
        <label for="descripcion">Ingrese descripción:</label>
        <textarea type="text" id="descripcion" maxlength="1000" rows="10"  name="descripcion" value="<?php if (isset($descripcion)) echo $descripcion ?>" class="textareaCurso"> </textarea>
        <div id="contador">0/1000</div>
        <?=$descripcionError?>
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
<script src="js/contador.js"></script>
</body>
</html>