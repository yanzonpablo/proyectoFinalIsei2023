<?php
require_once('bd/conexion.php');

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    try {
        
        $consulta = $pdo->query("UPDATE afiliados SET afiliados.id_estado = 0 
        WHERE afiliados.id_usuario = $id");
        
        $consulta->execute();

        } catch(PDOException $e) {
    
            echo $e->getMessage();

        }

        header('location: abmUsuarios.php');
    
    }
?>


