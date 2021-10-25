<?php 
require_once("../modelo/usuario-admin.php");

if (isset($_REQUEST['btnEliminar'])){

    $id=$_POST['id'];
    $ModeloUsuario= new Usuario();
    $ModeloUsuario->eliminarUsuario($id);
}else{
    header('location: ../vista/index.php');
}




?>



