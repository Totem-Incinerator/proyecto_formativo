<?php 

	require_once('conexion/conexion.php');
	
	session_start();
	
	class Usuario extends Conexion{

		function __construct(){
			$this->db = parent::__construct();
		}
        public function insertarComentario($nombre, $correo, $asunto, $sugerencia){
            $table=$this->db->prepare("INSERT INTO comentarios(id_comentario, nombre, correo, asunto, sugerencia) VALUES (NULL, :nombre, :correo, :asunto, :sugerencia)");
            $table->bindParam(":nombre", $nombre);
            $table->bindParam(":correo", $correo);
            $table->bindParam(":asunto", $asunto);
            $table->bindParam(":sugerencia", $sugerencia);
          
            if($table->execute()){
              header('Location: index.php');
            }else{
              
            }
          }

	

	}//end class

	//$objUser = new Usuario();
	//$objUser->login("jose@hotmail.com", "12345");





 