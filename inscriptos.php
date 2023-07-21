<?php
require_once('bd/conexion.php');

$id = $_GET['id'];

$consulta = $pdo->prepare("SELECT inscripciones.id, inscripciones.fecha_inscripcion, usuarios.nombre AS nombre, usuarios.apellido AS apellido,  
cursos.nombre AS curso, cursos.fecha_inicio, cursos.fecha_fin
from inscripciones 
INNER JOIN usuarios ON inscripciones.id_usuario = usuarios.id
INNER JOIN cursos ON inscripciones.id_curso = cursos.id");

$consulta->execute();

?>

<?php

if (isset( $_POST['buscador'])) {

	$palabra = $_POST['buscador'];

	$bus = $pdo->prepare("SELECT inscripciones.id, inscripciones.fecha_inscripcion, usuarios.nombre AS nombre, usuarios.apellido AS apellido, 
	cursos.nombre AS curso, cursos.fecha_inicio, cursos.fecha_fin
	from inscripciones 
	INNER JOIN usuarios ON inscripciones.id_usuario = usuarios.id
	INNER JOIN cursos ON inscripciones.id_curso = cursos.id
	WHERE LOWER(usuarios.nombre) LIKE LOWER('%$palabra%') AND LOWER(usuarios.apellido) LIKE LOWER('%$palabra%')");

	$bus->execute();

	} else {

	$bus = $pdo->prepare("SELECT inscripciones.id, inscripciones.fecha_inscripcion, usuarios.nombre AS nombre, usuarios.apellido AS apellido,  
	cursos.nombre AS curso, cursos.fecha_inicio, cursos.fecha_fin
	from inscripciones 
	INNER JOIN usuarios ON inscripciones.id_usuario = usuarios.id
	INNER JOIN cursos ON inscripciones.id_curso = cursos.id");

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
	<link rel="stylesheet" type="text/css" href="css/inscriptos.css">
</head>
</body>
<body>
		<?php require_once("nav.php") ?>
		<div class="cont_title">
			<p>LISTA DE INSCRIPTOS</p>
		</div>
		<div class="contenedor">
			<table border="1">
				<thead>
					<tr>
					<form action="" method="POST">
						<div class="header-content">
							<input type="text" class="input-buscador" id="input-buscador" name="buscador" placeholder="Buscar inscripto">
						</div>
					</form>
					<th class="Id">Id</th>
					<th class="nombre">Nombre y Apellido</th>
					<th class="modalidad">Fecha Insc.</th>
					<th class="horas">Curso</th>
					<th class="horas">Fecha Inicio</th>
					<th class="horas">Fecha Fin</th>
					<th class="borrar" style="font-size: 16px">Borrar</th>
				</tr>
			</thead>
			<tbody>
				<tr>
						<?php while ($datos = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
							<?php while ($datos = $bus->fetch(PDO::FETCH_ASSOC)) { ?>
					<td class="id" data-label="Id"><?= $datos['id'] ?></td>
					<td class="nombre" data-label="Nombre"><?= $datos['nombre'] ?> <?= $datos['apellido'] ?></td>
					<td class="modalidad" data-label="Fecha Insc."><?= $datos['fecha_inscripcion'] ?></td>
					<td class="curso" data-label="Curso"><?= $datos['curso'] ?></td>
					<td class="curso" data-label="Fecha inicio"><?= $datos['fecha_inicio'] ?></td>
					<td class="curso" data-label="Fecha Fin"><?= $datos['fecha_fin'] ?></td>
					<td class="borrar"><a onclick="return confirmaInscripto()" href="<?= 'deleteInscripto.php?id='.$datos['id'] ?>"><i class="fas fa-trash-alt  borrar "></i></a></td>
				</tr>
				<?php } ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
<script src="js/confirmaInscripto.js"></script>
</html>