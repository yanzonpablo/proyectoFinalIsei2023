<?php
require_once ('varErrorCapacitador.php');
require_once ('bd/conexion.php');

if (isset($_POST['aceptar'])) {
      $nombre = $_POST['nombre'];
      $nivel_curso = $_POST['nivel_curso'];
      $descripcion = $_POST['descripcion'];

      // ---------------logo-----------------
      $nombre_imagen = $_FILES['logo_curso']['name'];
      $tamano_imagen = $_FILES['logo_curso']['size'];
      $tmp_imagen = $_FILES['logo_curso']['tmp_name'];
      $error_imagen = $_FILES['logo_curso']['error'];

      if ($error_imagen == 0) {
        if($tamano_imagen > 2000000) {
          $info = "Archivo muy grande";
          header('location: formularioCamara.php?error = $info');
        } else {
          $imagen_extension = pathinfo($nombre_imagen, PATHINFO_EXTENSION);
          $imagen_extension_1 = strtolower($imagen_extension);

          $imagenPermitida = array('png', 'jpg', 'jpeg', 'gif');

          if (isset($_FILES['logo_curso'])) { 
            if (in_array($imagen_extension, $imagenPermitida)) {
              $nombreNuevaImagen = uniqid("IMG-", true).".".$imagen_extension_1;
              $imagen_subida = "images/cursos/". $nombreNuevaImagen;
              move_uploaded_file($tmp_imagen, $imagen_subida);
            }
          }
        }
      }
      // ---------------fin logo-----------------

      $carga_horaria = $_POST['carga_horaria'];
      $fecha_inicio = $_POST['fecha_inicio'];
      $fecha_fin = $_POST['fecha_fin'];
      $modalidad = $_POST['modalidad'];
      
      $query = $pdo->prepare('INSERT INTO cursos (nombre, nivel_curso, descripcion, carga_horaria, logo_curso, fecha_inicio, fecha_fin, modalidad) VALUES (:nombre, :nivel_curso, :descripcion, :carga_horaria, :logo_curso, :fecha_inicio, :fecha_fin, :modalidad)');
      
      $query->bindParam(':nombre', $nombre);
      $query->bindParam(':nivel_curso', $nivel_curso);
      $query->bindParam(':descripcion', $descripcion);
      $query->bindParam(':carga_horaria', $carga_horaria);
      $query->bindParam(':logo_curso', $logo_curso);
      $query->bindParam(':fecha_inicio', $fecha_inicio);
      $query->bindParam(':fecha_fin', $fecha_fin);

      $query->execute();
    }
    ?>

  <?php
  $consulta = $pdo -> prepare("SELECT * FROM modalidades ORDER BY modalidad ASC");
  $consulta -> execute();
  ?>

  <?php
  $niveles = $pdo -> prepare("SELECT nivel, carga_horaria FROM niveles_cursos ORDER BY nivel ASC");
  $niveles -> execute();
  ?>
  <?php
  
  $carga = $pdo -> prepare("SELECT DISTINCT carga_horaria FROM niveles_cursos");
  $carga -> execute();
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
          <input type="text" name="nombre" value="<?php if (isset($nombre)) echo $nombre ?>" placeholder="Ingrese nombre del capacitador" />
          <?=$nombreError?></div>

          <div class="user-input-box">
            <input type="text" name="apellido" value="<?php if (isset($apellido)) echo $apellido ?>" placeholder="Ingrese apellido del capacitador" />
            <?=$apellidoError?></div>
            
            <div class="user-input-box">
              <input type="text" name="cuilCuit" value="<?php if (isset($cuilCuit)) echo $cuilCuit ?>" placeholder="Ingrese apellido del capacitador" />
              <?=$cuilCuitError?></div>
              
            <div class="user-input-box">
              <input type="text" id="telefono" name="telefono" value="" placeholder="Ingrese número de teléfono" />
              <span for="teléfono" class="error"></span>
              <?=$telefonoError?></div>

          <div class="user-input-box">
          <select name="provincia" id="provincia" class="style-select">
            <option value="0" selected disabled>* Seleccione una provincia</option>
            <?php
            while($provincias = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?= $provincias['nombre'] ?>" name="provincia" ><?= $provincias['nombre'] ?></option>
              <?php } ?>
              </select>
              <?= $provinciaError?>
            </div>
            
            <div class="user-input-box">
            <input type="text" name="email" value="<?php if (isset($email)) echo $email ?>" placeholder="Ingrese apellido del capacitador" />
            <?=$codigoPostalError?></div>
            
            <div class="user-input-box">
            <input type="text" name="codigoPostal" value="<?php if (isset($codigoPostal)) echo $codigoPostal ?>" placeholder="Ingrese apellido del capacitador" />
            <?=$codigoPostalError?></div>

            <div class="user-input-box">
            <input type="text" name="empresa" value="<?php if (isset($empresa)) echo $empresa ?>" placeholder="Ingrese apellido del capacitador" />
            <?=$empresaError?></div>

          
          
          <label for="logo_curso" class="textoLogo"><i class="fa fa-upload fa-lg" aria-hidden="true" style="color: #027fb5; margin-right: 5px;"></i>Subir Imagen
          <div class="user-input-boxFile">
            <input type="file" id="logo_curso" name="logo_curso"/>
          </div></label>
          
          <div class="user-input-box">
            <select name="modalidad" id="modalidad" class="style-select">
              <option value="0" selected disabled>* Seleccione una modalidad</option>
              <?php while($modalidad = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?= $modalidad['modalidad'] ?>" name="modalidad" ><?=  $modalidad['modalidad'] ?></option>
                <?php } ?>
              </select><?= $modalidadError?></div>
            </div>
            </div>
          <div class="user-input-box2">
            <label for="descripcion">Ingrese descripción:</label>
            <textarea type="text" id="descripcion" rows="10"  name="descripcion" value="<?php if (isset($descripcion)) echo $descripcion ?>" class="textareaCurso"> </textarea>
            <?=$descripcionError?>
          </div>

            <div class="form-submit-btn">
              <button type="submit" name="aceptar" value="aceptar">Registrar
                </div>
    </form>
    

  </div>
</section>
</body>

</html>