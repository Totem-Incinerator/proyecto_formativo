<?php

include("conexion.php");

$id_usuario=$_REQUEST['id_usuario'];


$Imagen=addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
$query="UPDATE usuario SET  Imagen='$Imagen' WHERE id_usuario='$id_usuario'";
$resultado=$conexion->query($query);
if ($resultado) {
	
	header("Location: ../adulto-mayor/vista/perfil.php");
}else{
	echo("no se modidco");
}

?>