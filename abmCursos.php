<?php

require_once('bd/conexion.php');

$consulta = $pdo->prepare('SELECT id, logo_curso, nombre FROM cursos');

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
		<?php require_once("nav.php") ?>
		<div class="cont_title">
			<p>CAPACITACION ABM</p>
		</div>
			<div class="contenedor">
			<a href="formularioCurso.php" class="btnAlta">ALTA CURSOS</a>
		<table border="1">
			<thead>
				<tr>
					<th class="Id">Id</th>
					<th class="Imagen">Imagen</th>
					<th class="Nombre">Nombre</th>
					<th class="Nivel">Nivel</th>
					<th class="Carga Horaria">Carga horaria</th>
					<th class="Capacitador">Capacitador</th>
					<th class="Modalidad">Modalidad</th>
					<th class="Borrar">Modificar</th>
					<th class="Editar">Borrar</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<?php while ($datos = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
					<td class="id" data-label="id"><?= $datos['id'] ?></td>
					<td class="imagen" ><img width="20%" src="images/cursos/<?= $datos['logo_curso'] ?>" alt=""></td>
					<td class="nivel" data-label="Nivel"><?= $datos['nivel'] ?></td>
					<td class="horas" data-label="Carga Horaria"></td>
					<td class="capacitador" data-label="Capacitador"></td>
					<td class="modalidad" data-label="Modalidad"></td>
					<td class="editar"><a href="<?= 'editCapacitador.php?id='.$datos['id'] ?>"><i class="fas fa-user-edit edit"></i></a></td>
					<td class="borrar"><a onclick="return confirma()" href="<?= 'deleteCapacitadores.php?id='.$datos['id'] ?>"><i class="fas fa-trash-alt  borrar "></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
<script src="js/confirma.js"></script>
</html>