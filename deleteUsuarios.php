<?php

require_once('bd/conexion.php');

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    try {
        
        $consulta = $pdo->prepare("UPDATE afiliados SET id_estado = 0 WHERE id = $id");

        $consulta->execute();

        } catch(PDOException $e) {
    
        echo $e->getMessage();
        }

        header('location: abmUsuarios.php');
    
    }
?>


