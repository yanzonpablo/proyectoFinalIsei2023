<?php

require_once('bd/conexion.php');

try {

$consulta = $pdo->prepare('SELECT id, logo_camara, nombre, descripcion FROM camaras ORDER BY id');

$consulta -> execute();

	} catch(PDOException $e) {

	echo $e->getMessage();
	}
?>

<?php
require_once('bd/conexion.php');

if (isset( $_POST['input-buscador'])) {

	$palabra = $_POST['input-buscador'];

	try {

	$bus = $pdo->prepare("SELECT id, logo_camara, nombre, descripcion FROM camaras WHERE LOWER(camaras.nombre) LIKE LOWER('%$palabra%') ORDER BY id");

	$bus->execute();

	} catch(PDOException $e) {

	echo $e->getMessage();
	} 
	} else {

	$bus = $pdo->prepare("SELECT id, logo_camara, nombre, descripcion FROM camaras ORDER BY id");

	$bus->execute();

	}

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="images/logoCapacitacion.png" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximun-scale=2" />
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
	<title>CAPACITACION</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/abmCamaras.css">
</head>
</body>
<body>
		<?php require_once("nav.php") ?>
		<div class="cont_title">
			<p>ABM CAMARAS</p>
		</div>
			<div class="contenedor">
			<a href="formularioCamara.php" class="btnAlta">ALTA CAMARA</a>
		<table border="1">
			<thead>
				<tr>
				<form action="" method="POST">
						<div class="header-content">
							<input type="text" class="input-buscador" id="input-buscador" name="input-buscador" placeholder="Buscar cámara">
						</div>
					</form>
					<th class="id">Id</th>
					<th class="imagen">Imagen</th>
					<th class="nombre">Nombre</th>
					<th class="descripción">Descripción</th>
					<th class="borrar">Modificar</th>
					<th class="editar">Borrar</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<?php while ($datos = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
					<?php while ($datos = $bus->fetch(PDO::FETCH_ASSOC)) { ?>
					<td class="id" data-label="id"><?= $datos['id'] ?></td>
					<td class="imagen" ><img width="20%" src="images/logosCamaras/<?= $datos['logo_camara'] ?>" alt=""></td>
					<td class="nombre" data-label="Nombre"><?= $datos['nombre'] ?></td>
					<td class="descripcion" data-label="Descripcion"><?= $datos['descripcion']?></td>
					<td class="Editar"><a href="<?= 'editCamara.php?id='.$datos['id'] ?>"><i class="fas fa-user-edit edit"></i></a></td>
					<td class="Borrar"><a onclick="return confirmaCamara()" href="<?= 'deleteCamaras.php?id='.$datos['id'] ?>"><i class="fas fa-trash-alt  borrar "></i></a></td>
				</tr>
				<?php } ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
<script src="js/confirmaCamara.js"></script>
</html>