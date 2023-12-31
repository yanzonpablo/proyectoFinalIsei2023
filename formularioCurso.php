<?php
session_start();

if ($_SESSION['rol_usuario'] != 2) {
	header("location: index.php");
} 
?>

<?php
require_once ('varErrorCursos.php');
require_once ('bd/conexion.php');

if (isset($_POST['registrar'])) {

  try {
      $nombre = $_POST['nombre'];
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
      $fecha_inicio = date('y-m-d',strtotime($_POST['fecha_inicio']));
      $fecha_fin = date('y-m-d', strtotime($_POST['fecha_fin']));
      $carga_horaria = $_POST['carga_horaria'];
      $nivel_curso = $_POST['nivel_curso'];
      $modalidad = $_POST['modalidad'];
      $capacitador = $_POST['capacitador'];
      
      $query = $pdo->prepare('INSERT INTO cursos (nombre, nivel_curso, descripcion, logo_curso, carga_horaria, fecha_inicio, fecha_fin, id_modalidad, id_capacitador) VALUES (:nombre, :nivel_curso, :descripcion, :logo_curso, :carga_horaria, :fecha_inicio, :fecha_fin, :modalidad, :capacitador)');
      
      $query->bindParam(':nombre', $nombre);
      $query->bindParam(':descripcion', $descripcion);
      $query->bindParam(':logo_curso', $nombreNuevaImagen);
      $query->bindParam(':fecha_inicio', $fecha_inicio); 
      $query->bindParam(':fecha_fin', $fecha_fin);
      $query->bindParam(':carga_horaria', $carga_horaria); //id
      $query->bindParam(':nivel_curso', $nivel_curso); //id
      $query->bindParam(':modalidad', $modalidad); //id
      $query->bindParam(':capacitador', $capacitador); //id

      $query->execute();

    } catch (PDOException $e) {

        echo $e->getMessage();
  }
  
  header('location: abmCursos.php');

} else {
  
  if (isset($_POST['cancelar'])) {

    header('location: abmCursos.php');
  }
}

  ?>

  <?php
  $consulta = $pdo -> prepare("SELECT * FROM modalidades ORDER BY modalidad ASC");
  $consulta -> execute();
  ?>

  <?php
  $instructor = $pdo -> prepare("SELECT id, nombre, apellido FROM capacitadores ORDER BY nombre DESC");
  $instructor -> execute();
  ?>

  <?php
  $niveles = $pdo -> prepare("SELECT * FROM niveles_cursos ORDER BY nivel ASC");
  $niveles -> execute();
  ?>
  <?php
  
  $carga = $pdo -> prepare("SELECT DISTINCT carga_horaria, sub_indice FROM niveles_cursos");
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
  <link rel="stylesheet" href="css/formularioCurso.css">
</head>

<body>
<?php require_once("navAdmin.php") ?>
  <section>
  <div class="container">
    <h1 class="form-title">REGISTRO DE CURSOS</h1>
    <form action="" method="POST" enctype="multipart/form-data">
      <div>
      <div class="main-user-info">
        <div class="user-input-box">

          <input type="text" name="nombre" value="" placeholder="Ingrese nombre del curso" />
          <?= $nombreError?>
        </div>

        <div class="user-input-box">
          <select name="nivel_curso" id="nivel_curso" class="style-select">
            <option value="0" selected disabled>* Seleccione tipo de curso</option>
            <?php
            while($nivel = $niveles->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?= $nivel['id'] ?>" name="nivel_curso" ><?= $nivel['nivel'] ?></option>
              <?php } ?>
              </select>
              <?= $nivel_cursoError?>
            </div>

            <div class="user-input-box">
              <input type="date" id="fechaInicio" name="fecha_inicio" value="" placeholder="* Ingrese fecha inicio" />
              <span for="fecha_inicio" class="error"></span>
              <?= $fecha_inicioError?>
            </div>

            <div class="user-input-box">
            <input type="date" name="fecha_fin" id="fechaFin" value="" placeholder="* Ingrese fecha fin">
              <span for="fecha_fin" class="error"></span>
              <?= $fecha_finError?>
            </div>
            <div class="user-input-box">
              <select name="carga_horaria" id="carga_horaria" class="style-select">
                <option value="0" selected disabled>* Seleccione carga horaria</option>
                <?php
            while($hs = $carga->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $hs['sub_indice'] ?>" name="carga_horaria">
              <?= $hs['carga_horaria'] ?></option>
              <?php } ?>
            </select>
            <?= $carga_horariaError?>
          </div>

          <div class="user-input-box">
          <select name="capacitador" id="capacitador" class="style-select">
            <option value="0" selected disabled>* Seleccione capacitador</option>
            <?php while($capacitador = $instructor->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $capacitador['id'] ?>" name="capacitador" ><?=  $capacitador['nombre'] ?> <?= $capacitador['apellido'] ?></option>
            <?php } ?>
          </select>
          <?= $capacitadorError?>
        </div>

          <label for="logo_curso" class="textoLogo"><i class="fa fa-upload fa-lg" aria-hidden="true" style="color: #027fb5; margin-right: 5px;"></i>Subir Imagen
          <div class="user-input-boxFile">
            <input type="file" id="logo_curso" name="logo_curso"/>
          </div>
        </label>

          <div class="user-input-box">
            <select name="modalidad" id="modalidad" class="style-select">
              <option value="0" selected disabled>* Seleccione una modalidad</option>
              <?php while($modalidad = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?= $modalidad['id'] ?>" name="modalidad" ><?= $modalidad['modalidad'] ?></option>
              <?php } ?>
            </select>
            <?= $modalidadError?>
          </div>
            </div>
            </div>

          <div class="user-input-box2">
            <label for="descripcion">Ingrese descripción:</label>
            <textarea type="text" id="descripcion" maxlength="1000" rows="10"  name="descripcion" value="" class="textareaCurso"> </textarea>
            <div id="contador">0/1000</div>
            <?=$descripcionError?>
          </div>
          <div class="linea"></div>
          <div class="contenedorBtn">
          <div class="form-submit-btn">
          <button type="submit" name="cancelar" value="cancelar">Cancelar
          </div>
          <div class="form-submit-btn">
            <button type="submit" name="registrar" value="registrar">Registrar
          </div>
        </div>
      </form>
  </div>
</section>
<script src="js/fechaInicio.js"></script>
<script src="js/fechaFin.js"></script>
<script src="js/contador.js"></script>
</body>

</html>