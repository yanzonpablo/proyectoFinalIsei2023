<?php

require_once('bd/conexion.php');

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $consulta = $pdo->query('DELETE FROM capacitadores WHERE id = $id');
    
    $consulta -> execute();
}

// header('location: abm.php');
?>


