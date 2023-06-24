<?php
require_once ('./validacionFunction.php');
require_once ('./varErrorCamara.php');
require_once ('bd/conexion.php');

if (isset($_POST['aceptar'])) {
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
      $codigoPostal = $_POST['codigoPostal'];
      $provincia = $_POST['provincia'];
      $email = $_POST['email'];
      $web = $_POST['web'];
      
      $query = $pdo->prepare('INSERT INTO camaras (nombre, descripcion, logo_camara, telefono, direccion, codigo_postal, provincia, email, web) VALUES (:nombre, :descripcion, :logo_camara, :telefono, :direccion, :codigo_postal, :provincia, :email, :web)');
      
      $query->bindParam(':nombre', $nombre);
      $query->bindParam(':descripcion', $descripcion);
      $query->bindParam(':logo_camara', $nombreNuevaImagen);
      $query->bindParam(':telefono', $telefono);
      $query->bindParam(':direccion', $direccion);
      $query->bindParam(':codigo_postal', $codigoPostal);
      $query->bindParam(':provincia', $provincia);
      $query->bindParam(':email', $email);
      $query->bindParam(':web', $web);
      
      $query->execute();
  }
    ?>
<?php
      // ---------------provincias-----------------
require_once ('bd/conexion.php');

$consulta = $pdo->query("SELECT id, nombre FROM provincias ORDER BY nombre ASC");
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="dash.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/formularioCamara.css">
    <title>Admin Dashboard Panel</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name">CAPACITACION</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Inicio</span>
                </a></li>
                <li><a href="FormularioCamara.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Registro de cámaras</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Registro de cursos</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Registro de usuarios</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Registro de docentes</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Share</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <!-- <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div> -->
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>

        <div class="dash-content">
        <section>
  <div class="container">
    <h1 class="form-title">REGISTRO DE CAMARA</h1>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="main-user-info">
        <div class="user-input-box">
          <input type="text" name="nombre" value="<?php if (isset($nombre)) echo $nombre ?>" placeholder="Ingrese nombre" />
          <?=$nombreError?>
        </div>
        <div class="user-input-box">
          <input type="text" id="descripcion" name="descripcion" value="<?php if (isset($descripcion)) echo $descripcion ?>" placeholder="Ingrese descripción" />
          <?=$descripcionError?>
        </div>
    <label for="logo_camara" class="textoLogo"><i class="fa fa-upload fa-lg" aria-hidden="true" style="color: #027fb5; margin-right: 5px;"></i>Subir Imagen
        <div class="user-input-boxFile">
          <input type="file" id="logo_camara" name="logo_camara"/>
        </div></label>
        <div class="user-input-box">
          <input type="tel" id="telefono" name="telefono" value="<?php if (isset($telefono)) echo $telefono ?>" placeholder="Ingrese teléfono" />
          <span for="teléfono" class="error"></span>
          <?=$telefonoError?>
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
            <option value="0" selected disabled>* Seleccione una provincia</option>
            <?php
            while($provincias = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?= $provincias['nombre'] ?>" name="provincia" ><?= $provincias['nombre'] ?></option>
              <?php } ?>
              </select>
              <?= $provinciaError?>
            </div>
          <div class="user-input-box">
            <input type="email" id="email" name="email" value="<?php if (isset($email)) echo $email ?>" placeholder="Ingrese e-mail" />
            <?=$emailError?>
          </div>
          <div class="user-input-box">
          <input type="text" id="web" name="web" value="<?php if (isset($web)) echo $web ?>" placeholder="Ingrese web" />
          <?=$webError?>
        </div>
      </div>
      <div class="form-submit-btn">
        <button type="submit" name="aceptar" value="aceptar">Registrar
      </div>
    </form>

  </div>
</section>
            
        </div>
    </section>

    <script src="dash.js"></script>
</body>
</html>