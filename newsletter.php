<?php

require_once('bd/conexion.php');

try {
$consulta = $pdo->prepare('SELECT * FROM newsletters');

$consulta -> execute();

} catch (PDOException $e) {

	echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>Listado Newsletter</title>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="images/logoCapacitacion.png" />
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/excellentexport@3.4.3/dist/excellentexport.min.js">
	</script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximun-scale=2" />
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/newsletter.css">
</head>

<body>
		<?php require_once("navAdmin.php") ?>
		<div class="cont_title">
			<p>E-MAILS ASOCIADOS A NEWSLETTERS</p>
		</div>
	<div class="contenedor">
	<a href="" class="btnDescarga" id="download_xls" download="filename.xls">DESCARGAR LISTA</a>
		<table border="1" id="datatable" >
			<thead>
				<tr>
					<th>Correo Electrónica</th>
					<th>Fecha de alta</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<?php while ($datos = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
					<td data-label="E-mail:"><?= $datos['email'] ?></td>
					<td data-label="Fecha Alta:"><?= $datos['fecha_alta'] ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>

<script src="js/descargaExcel.js"></script>

</html>