<?php

include("conexion.php");


$imagen=addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

$query="INSERT INTO usuario(imagen) VALUES('$imagen')";
$resultado = $conexion->query($query);



?>