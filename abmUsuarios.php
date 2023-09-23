<?php
session_start();

if ($_SESSION['rol_usuario'] != 2) {
	header("location: index.php");
} 
?>

<?php

require_once('bd/conexion.php');

try {

$consulta = $pdo->prepare("SELECT usuarios.id, usuarios.nombre, apellido, email, telefono, dni, direccion, afiliados.id_usuario, roles_usuarios.roles AS rol,
IF(afiliados.id_estado = 0, 'PASIVO', 'ACTIVO') AS estado
FROM usuarios
INNER JOIN roles_usuarios ON usuarios.rol_usuario = roles_usuarios.id
INNER JOIN afiliados ON usuarios.id = afiliados.id_usuario
WHERE usuarios.id = afiliados.id_usuario");

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

	$bus = $pdo->prepare("SELECT usuarios.id, usuarios.nombre, apellido, email, telefono, dni, direccion, afiliados.id_usuario, roles_usuarios.roles AS rol,
	IF(afiliados.id_estado = 0, 'PASIVO', 'ACTIVO') AS estado
	FROM usuarios
	INNER JOIN roles_usuarios ON usuarios.rol_usuario = roles_usuarios.id
	INNER JOIN afiliados ON usuarios.id = afiliados.id_usuario
	WHERE LOWER(usuarios.nombre) LIKE LOWER('%$palabra%')");

	$bus->execute();

	} catch(PDOException $e) {

	echo $e->getMessage();
	} 
	} else {

	$bus = $pdo->prepare("SELECT usuarios.id, usuarios.nombre, apellido, email, telefono, dni, direccion, afiliados.id_usuario, roles_usuarios.roles AS rol,
	IF(afiliados.id_estado = 0, 'PASIVO', 'ACTIVO') AS estado
	FROM usuarios
	INNER JOIN roles_usuarios ON usuarios.rol_usuario = roles_usuarios.id
	INNER JOIN afiliados ON usuarios.id = afiliados.id_usuario
	WHERE usuarios.id = afiliados.id_usuario");

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
	<link rel="stylesheet" type="text/css" href="css/abmUsuarios.css">
</head>
</body>
<body>
		<?php require_once("navAdmin.php") ?>
		<div class="cont_title">
			<p>ABM USUARIOS</p>
		</div>
			<div class="contenedor">
			<a href="formularioRegistro.php" class="btnAlta">ALTA USUARIO</a>
		<table border="1">
			<thead>
				<tr>
				<form action="" method="POST">
						<div class="header-content">
							<input type="text" class="input-buscador" id="input-buscador" name="input-buscador" placeholder="Buscar usuario">
						</div>
					</form>
					<th class="Id">Id</th>
					<th class="nombreApellido">Nombre y Apellido</th>
					<th class="email">E-mail</th>
					<th class="telefono">Teléfono</th>
					<th class="dni">D.N.I.</th>
					<th class="rol">Rol</th>
					<th class="editar">Modificar</th>
					<th class="borrar" style="font-size: 16px">Borrar</th>
					<th class="estado">Estado</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<?php while ($datos = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
					<?php while ($datos = $bus->fetch(PDO::FETCH_ASSOC)) { ?>
					<td class="id" data-label="id"><?= $datos['id'] ?></td>
					<td class="nombreApellido" data-label="Nombre y apellido"><?= $datos['nombre'] ?> <?= $datos['apellido'] ?></td>
					<td class="email" data-label="E-mail"><?= $datos['email']?></td>
					<td class="telefono" data-label="Teléfono"><?= $datos['telefono']?></td>
					<td class="dni" data-label="D.N.I."><?= $datos['dni']?></td>
					<td class="rol" data-label="Rol"><?= $datos['rol']?></td>
					<td class="editar"><a href="<?= 'editRegistro.php?id='.$datos['id'] ?>"><i class="fas fa-user-edit edit"></i></a></td>
					<td class="borrar"><a onclick="return confirmaUsuario()" href="<?= 'deleteUsuarios.php?id='.$datos['id'] ?>"><i class="fas fa-trash-alt  borrar "></i></a></td>
					<td class="estado" data-label="Estado"><?= $datos['estado']?></td>
				</tr>
				<?php } ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
<script src="js/confirmaUsuario.js"></script>
</html>