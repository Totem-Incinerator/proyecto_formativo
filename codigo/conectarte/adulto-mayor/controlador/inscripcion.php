<?php
require_once("../modelo/modelo-adulto.php");

    if (isset($_REQUEST['prueba'])) {
        $objAdulto = new AdultoMayor();
        $usuario_id = $_POST['id_usuario'];
        $curso_id = $_POST['curso_id'];
        $estado = $_POST['estado'];
        $fecha = $_POST['fecha_inicio'];

        print_r($curso_id);
        $objAdulto->inscribirseCurso($curso_id, $fecha, $usuario_id, $estado);
    }else{
        header('Location: ../../index.php');
    }
    

?>

