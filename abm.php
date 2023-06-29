<?php

require_once('bd/conexion.php');

$consulta = $pdo->prepare('SELECT id, imagen, nombre, apellido FROM capacitadores');

$consulta -> execute();

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
	<link rel="stylesheet" type="text/css" href="css/abm.css">
</head>
</body>
<body>
	<header>
		<?php require_once("nav.php") ?>
	</header>
		<div class="cont_title">
			<p>CAPACITACION ABM</p>
		</div>
			<div class="contenedor">
			<a href="formularioCapacitador.php" class="btnAlta">ALTA CAPACITADOR</a>
		<table border="1">
			<thead>
				<tr>
					<th class="id">Id</th>
					<th class="imagen">Imagen</th>
					<th class="nombreApellido">Nombre y apellido</th>
					<th class="Borrar">Modificar</th>
					<th class="Editar">Borrar</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<?php while ($datos = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
					<td class="id" data-label="id"><?= $datos['id'] ?></td>
					<td class="imagen" ><img width="20%" src="images/capacitadores/<?= $datos['imagen'] ?>" alt=""></td>
					<td class="nombreApellido" data-label="Nombre y Apellido"><?= $datos['nombre'].' '.$datos['apellido'] ?></td>
					<td class="Editar"><a href="<?= 'editCapacitador.php?id='.$datos['id'] ?>"><i class="fas fa-user-edit edit"></i></a></td>
					<td class="Borrar"><a onclick="return confirma()" href="<?= 'deleteCapacitador.php?id='.$datos['id'] ?>"><i class="fas fa-trash-alt  borrar "></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
<script src="js/confirma.js"></script>
</html>