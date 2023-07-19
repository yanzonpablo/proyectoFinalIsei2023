<?php

require_once('bd/conexion.php');

$consulta = $pdo->prepare("SELECT cursos.id, cursos.nombre, cursos.logo_curso, capacitadores.nombre AS profe, modalidades.modalidad, niveles_cursos.carga_horaria, niveles_cursos.nivel, niveles_cursos.carga_horaria, id_capacitador, id_modalidad
from cursos 
INNER JOIN niveles_cursos ON cursos.nivel_curso = niveles_cursos.id 
INNER JOIN capacitadores ON cursos.id_capacitador = capacitadores.id
INNER JOIN modalidades ON cursos.id_modalidad = modalidades.id ORDER BY id");

$consulta -> execute();

?>
<?php
require_once('bd/conexion.php');

if (isset( $_POST['input-buscador'])) {

	$palabra = $_POST['input-buscador'];

	try {

	$bus = $pdo->prepare("SELECT cursos.id, cursos.nombre, cursos.logo_curso, capacitadores.nombre AS profe, modalidades.modalidad, niveles_cursos.carga_horaria, niveles_cursos.nivel, niveles_cursos.carga_horaria
	from cursos 
	INNER JOIN niveles_cursos ON cursos.nivel_curso = niveles_cursos.id 
	INNER JOIN capacitadores ON cursos.id_capacitador = capacitadores.id
	INNER JOIN modalidades ON cursos.id_modalidad = modalidades.id 
	WHERE LOWER(cursos.nombre) LIKE LOWER('%$palabra%')");

	$bus->execute();

	} catch(PDOException $e) {

	echo $e->getMessage();
	} 
	} else {

	$bus = $pdo->prepare('SELECT cursos.id, cursos.nombre, cursos.logo_curso, capacitadores.nombre AS profe, modalidades.modalidad, niveles_cursos.carga_horaria, niveles_cursos.nivel, niveles_cursos.carga_horaria, id_capacitador, id_modalidad
	from cursos 
	INNER JOIN niveles_cursos ON cursos.nivel_curso = niveles_cursos.id 
	INNER JOIN capacitadores ON cursos.id_capacitador = capacitadores.id
	INNER JOIN modalidades ON cursos.id_modalidad = modalidades.id ORDER BY id');

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
	<link rel="stylesheet" type="text/css" href="css/abmCursos.css">
</head>
</body>
<body>
		<?php require_once("nav.php") ?>
		<div class="cont_title">
			<p>ABM CURSOS</p>
		</div>
		<div class="contenedor">
			<a href="formularioCurso.php" class="btnAlta">ALTA CURSOS</a>
			<table border="1">
				<thead>
					<tr>
					<form action="" method="POST">
						<div class="header-content">
							<input type="text" class="input-buscador" id="input-buscador" name="input-buscador" placeholder="Buscar curso">

						</div>
					</form>
					<th class="id">Id</th>
					<th class="imagen">Imagen</th>
					<th class="nombre">Nombre de Curso</th>
					<th class="modalidad">Modalidad</th>
					<th class="horas">Carga horaria</th>
					<th class="capacitador">Capacitador</th>
					<th class="nivel">Nivel</th>
					<th class="editar">Modificar</th>
					<th class="borrar" style="font-size: 16px">Borrar</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($datos = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
					<?php while($datos = $bus->fetch(PDO::FETCH_ASSOC)) { ?>
					<tr>
					<td class="id" data-label="id"><?= $datos['id'] ?></td>
					<td class="imagen"><img width="30%" src="images/cursos/<?= $datos['logo_curso'] ?>" alt=""></td>
					<td class="nombre" data-label="Nombre"><?= $datos['nombre'] ?></td>
					<td class="modalidad" data-label="Modalidad"><?= $datos['modalidad'] ?></td>
					<td class="horas" data-label="Carga Horaria"><?= $datos['carga_horaria'] ?></td>
					<td class="capacitador" data-label="Capacitador"><?= $datos['profe'] ?></td>
					<td class="nivel" data-label="Nivel"><?= $datos['nivel'] ?></td>
					<td class="editar"><a href="<?= 'editCurso.php?id='.$datos['id'] ?>"><i class="fas fa-user-edit edit"></i></a></td>
					<td class="borrar"><a onclick="return confirmaCurso()" href="<?= 'deleteCursos.php?id='.$datos['id'] ?>"><i class="fas fa-trash-alt  borrar "></i></a></td>
				</tr>
				<?php } ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
<script src="js/confirmaCurso.js"></script>
</html>