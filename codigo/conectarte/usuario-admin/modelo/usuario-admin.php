<?php 

	require_once('../../conexion/conexion.php');
	session_start();
	
	class Usuario extends Conexion{

		function __construct(){
			$this->db = parent::__construct();
		}


		public function login($email, $contrasena){
			$table = $this->db->prepare("SELECT email, contrasena, id_usuario, nombre_rol FROM usuario, rol WHERE email = :email AND contrasena = :contrasena AND rol_id = id_rol");
			$table->bindParam(":email", $email);
			$table->bindParam(":contrasena", $contrasena);
			$table->execute();

			if ($table->rowCount() == 1) {
					
				while ($result = $table->fetch()) {
					$rows[] = $result;
					$_SESSION['email'] = $result["email"];
					$_SESSION['contrasena']	 = $result["contrasena"];
					$_SESSION['id_usuario'] = $result["id_usuario"];
				}

				return $rows;

			}else{
				echo "Error al iniciar sesión. redireccionando...";
				header('refresh:3; url=../../index.php');
				die();
			}
		}


		public function verUsuarios(){
			$rows = null;
			$table = $this->db->prepare("SELECT id_usuario, nombre, apellido, email, contrasena, celular, edad FROM usuario");
			$table->execute();

			while ($result = $table->fetch()) {
				$rows[] = $result;
			}

			return $rows;
		}

		public function salir(){
			unset($_SESSION['email']);
			session_destroy();
			header("refresh:3 url=../../index.php");
			echo "Cerrando sesión...";
		}
	
		public function registrarse($nombre, $apellido, $edad, $email, $contrasena, $rol){
			$table = $this->db->prepare("INSERT INTO usuario (nombre, apellido, email, edad, contrasena, rol_id) VALUES (:nombre, :apellido, :email, :edad, :contrasena, :rol_id)");
			$table->bindParam(":nombre", $nombre);
			$table->bindParam(":apellido", $apellido);
			$table->bindParam(":edad", $edad);
			$table->bindParam(":email", $email);
			$table->bindParam(":contrasena", $contrasena);
			$table->bindParam(":rol_id", $rol);
		
			if ($table->execute()) {
				header('Location: ../../index.php');
			}else{
				echo "NO FUE POSIBLE REGISTRARSE";
				header('refresh:3; url=../../index.php');
			}	
		}


		public function verRol(){
            $rows = null;
            $table = $this->db->prepare("SELECT id_rol, nombre_rol FROM rol");
            $table->execute();

            while($resul = $table->fetch())
            {
                $rows[] = $resul;
            }
            return $rows;
        }


        public function insertarAdministrador($nombre, $apellido, $email, $contrasena, $celular, $edad , $documento, $rol_id)
		{
			$table = $this->db->prepare("INSERT INTO usuario (id_usuario, nombre, apellido, email, contrasena,  celular, edad, documento, rol_id) VALUES 
			(NULL, :nombre, :apellido, :email, :contrasena, :celular, :edad, :documento, :rol_id)");
			$table->bindParam(":nombre", $nombre);
			$table->bindParam(":apellido",$apellido);
			$table->bindParam("email",$email);
			$table->bindParam("contrasena", $contrasena);
			$table->bindParam("celular", $celular);
			$table->bindParam("edad", $edad);
			$table->bindParam("documento", $documento);
			$table->bindParam("rol_id", $rol_id);

		  	if ($table->execute()) {
				header('Location: ../vista/index.php');
			}else{
				header('Location: ../vista/addadministrador.php');
			}
		}

		public function eliminarUsuario($id)
		{
			$table =$this->db->prepare("DELETE FROM usuario WHERE id_usuario = :id");
			$table->bindParam(":id", $id);
			if ($table->execute()){
				header ('Location: ../vista/index.php');
			}else{
				header('location: ..vista/eliminar.php');
			}
		}


		public function verIdUsuario($id)
		{
			$rows = null;
			$table = $this->db->prepare("SELECT  nombre, apellido, email, contrasena, celular, edad FROM usuario WHERE id_usuario = :id");
			$table->bindParam(":id", $id);
			$table->execute();
			while ($result = $table->fetch()) {
				$rows[] = $result;
			}

			return $rows;
		}
		

	}//end class

	//$objUser = new Usuario();
	//$objUser->login("jose@hotmail.com", "12345");





 