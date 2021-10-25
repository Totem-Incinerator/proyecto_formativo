<?php 

	class Conexion 
	{
		protected $db;
		private $host = "localhost";
		private $usuario = "root";
		private $contrasena = "";
		private $driver = "mysql";
		private $bd = "pruebas_conectarte";
		
		function __construct()
		{	
			try{
				$db = new PDO("{$this->driver}:host={$this->host};dbname={$this->bd}", $this->usuario, $this->contrasena);

				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $db;
				echo "conexion exitante";
			}catch (PDOException $e) {
				echo "ha ocurrido un error al conectarse a la base de datos".$e->getMessage();
			}
		}
	}



	//$objConex = new Conexion();


 ?>