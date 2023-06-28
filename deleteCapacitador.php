<?php

require_once('bd/conexion.php');

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    try {
    $consulta = $pdo->query('DELETE FROM capacitadores WHERE id = $id');
    
    $consulta -> execute([$id]);
    
    } catch(PDOException $e) {

        echo $e->getMessage();
    }
}

// header('location: abm.php');
?>


