<?php

$dsn = "mysql:host=localhost;dbname=capacitacion;charset=UTF8";
$usuario = "root";
$contrasenia = "d79f2f87";

try {
$bd = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$pdo = new PDO($dsn, $usuario, $contrasenia, $bd);

    } catch (PDOException $e){
        echo "Error en la conexion: " . $e->getMessage();
    }

?>
