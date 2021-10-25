

 <?php 
 
	require_once('../modelo/usuario-admin.php');


		if (isset($_REQUEST[''])){
			if(isset($_REQUEST['btnEditar'])){
				$ModeloUsuario = new Usuario();
				$id_usuario=$_POST['id_usuario'];
				$nombre = $_POST['nombre'];
				$apellido = $_POST['apellido'];
		
				$celular =$_POST['celular'];

				
				



			}

		}
 
 
 
 
 ?>