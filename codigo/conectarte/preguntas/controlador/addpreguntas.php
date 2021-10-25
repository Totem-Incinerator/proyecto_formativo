<?php
 require_once('../modelo/preguntas.php');
if (isset($_REQUEST['btnInsertar'])) {
        $objModelo = new Preguntas();
        
        $tipo_pregunta = $_POST['tipo_pregunta'];
        $texto_pregunta = $_POST['texto_pregunta'];
        $item1 = $_POST['item1'];
        $item2 = $_POST['item2'];
        $item3 = $_POST['item3'];
        $item4 = $_POST['item4'];
        $retroalimentacion_correcta= $_POST['retroalimentacion_correcta'];
        $retroalimentacion_negativa = $_POST['retroalimentacion_negativa'];
        $rta_correcta = $_POST['rta_correcta'];
        $evaluacion_id = $_POST['evaluacion_id'];


        $objModelo->insertarPreguntas($tipo_pregunta, $texto_pregunta, $item1, $item2, $item3, $item4, $retroalimentacion_correcta, $retroalimentacion_negativa, $rta_correcta, $evaluacion_id);
    }else{
        header('Location: ../vista/index.php');
    }
    ?>