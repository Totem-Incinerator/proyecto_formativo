<?php
require_once("../../conexion/conexion.php");
class comentarios extends Conexion
	{
		
		function __construct()
		{
			$this->db = parent::__construct();
		}
          public function verIdComentario($id)
        {
            $rows = null;
            $table = $this->db->prepare("SELECT id_comentario, nombre, correo, asunto, sugerencia FROM comentarios WHERE id_comentario = :id");
            $table->bindParam(":id", $id);
            $table->execute();
            while ($result = $table->fetch()) {
                $rows[] = $result;
            }

            return $rows;
        }

        public function verComentarios(){
            $rows= null;
            $table=$this->db->prepare("SELECT id_comentario, nombre, correo, asunto, sugerencia FROM comentarios");
            $table->execute();
    
            while ($result =$table->fetch()){
                $rows[]= $result;
            }
            return $rows;
            }
    public function eliminarComentario($id)
        {
            $table = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario = :id");
            $table->bindParam(":id", $id);
            if ($table->execute()) {
                header('Location: ../vista/index.php');
            }else{
                header('Location: ../vista/eliminarcomentario.php');
            }
        }

    }
        ?>