
<?php 

	require_once('../modelo/modelo-adulto.php');
	if (isset($_REQUEST['btnEditar'])) {
		$ModeloAdulto = new AdultoMayor();
		$id_usuario =$_POST['id_usuario'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$celular=$_POST['celular'];      
		$ModeloAdulto->editarperfil($id_usuario, $nombre, $apellido, $celular);
	}else{
		header('Location: ../vista/perfil.php');
	}



?>