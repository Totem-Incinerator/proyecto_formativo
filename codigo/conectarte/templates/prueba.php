<?php
 
    require_once("../conexion/conexion.php");
    require_once("../adulto-mayor/modelo/modelo-adulto.php");

    $objAdulto = new AdultoMayor();

    $result = $objAdulto->verMisCursos(6);

    foreach ($result as $key) {
        echo "<pre>";
        print_r($key['nombre_curso']);
        echo "<pre>";

    }


 ?>