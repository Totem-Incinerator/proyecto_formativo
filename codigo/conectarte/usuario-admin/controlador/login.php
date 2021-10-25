<?php 
	require_once("../modelo/usuario-admin.php");
	

	if(isset($_REQUEST['iniciarSesion'])){
		$email = $_POST['correo'];
		$password = $_POST['password'];

		$objUser = new Usuario();
		$verRol = $objUser->login($email, $password);

		if (isset($verRol)) {

			$verIdUsuario = $verRol[0]['id_usuario'];

			if ($verRol[0]['nombre_rol'] == "administrador") {
				header('Location: ../../usuario-admin/vista/index.php');
			}elseif ($verRol[0]['nombre_rol'] == "adulto_mayor"){
				header('Location: ../../adulto-mayor/vista/perfil.php');
			}else{
				header('Location: ../../index.php');
			}
		}else{
			header('Location: ../../index.php');
		}

	}



 