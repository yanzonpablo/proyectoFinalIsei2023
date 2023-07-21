<?php
require_once('bd/conexion.php');

$id = $_GET['id'];

$consulta = $pdo->prepare("SELECT entidades.fecha_alta, CONCAT(usuarios.nombre,' ',usuarios.apellido) AS nombre, 
cursos.nombre AS curso, cursos.fecha_inicio, cursos.fecha_fin
from entidades 
INNER JOIN usuarios ON entidades.id_usuario = usuarios.id
INNER JOIN cursos ON entidades.id_curso = cursos.id
WHERE entidades.id_curso = $id ORDER BY nombre");

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
							<input type="text" class="input-buscador" id="input-buscador" name="input-buscador" placeholder="Buscar inscripto">
						</div>
					</form>
					<th class="nombre">Nombre y Apellido</th>
					<th class="modalidad">Fecha Insc.</th>
					<th class="horas">Curso</th>
					<th class="horas">Fecha Inicio</th>
					<th class="horas">Fecha Fin</th>

					<th class="borrar" style="font-size: 16px">Borrar</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($datos = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>

					<tr>
					<td class="nombre" data-label="Nombre"><?= $datos['nombre'] ?></td>
					<td class="modalidad" data-label="Fecha Insc."><?= $datos['fecha_alta'] ?></td>
					<td class="curso" data-label="Curso"><?= $datos['curso'] ?></td>
					<td class="curso" data-label="fecha inicio"><?= $datos['fecha_inicio'] ?></td>
					<td class="curso" data-label="fecha Fin"><?= $datos['fecha_fin'] ?></td>
					<td class="borrar"><a onclick="return confirmaCurso()" href=""><i class="fas fa-trash-alt  borrar "></i></a></td>
				</tr>
				<?php } ?>

			</tbody>
		</table>
	</div>
</body>
<script src="js/confirmaCurso.js"></script>
</html>