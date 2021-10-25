<?php 
	require_once('../../conexion/conexion.php');
	

	
	class curso extends Conexion
	{
		
		function __construct()
		{
			$this->db = parent::__construct();
		}


        public function verCategoria(){
            $rows = null;
            $table = $this->db->prepare("SELECT id_categoria, nombre_categoria FROM categoria");
            $table->execute();

            while($resul = $table->fetch())
            {
                $rows[] = $resul;
            }
            return $rows;


        }

        public function verIdCurso($id)
		{
			$rows = null;
			$table = $this->db->prepare("SELECT id_curso, nombre_curso, descripcion FROM curso WHERE id_curso = :id");
			$table->bindParam(":id", $id);
			$table->execute();
			while ($result = $table->fetch()) {
				$rows[] = $result;
			}

			return $rows;
		}
		public function verCurso()
		{
			$rows = null;
			$table = $this->db->prepare("SELECT id_curso, nombre_curso, descripcion, categoria_id FROM curso");
			$table->execute();

			while ($result = $table->fetch()) {
				$rows[] = $result;
			}

			return $rows;
		}


	
		public function insertarCurso($nombre_curso, $descripcion, $categoria_id, $idNivel)
		{
			$table = $this->db->prepare("INSERT INTO `curso` (`id_curso`, `nombre_curso`, `descripcion`, `categoria_id`, `nivel_id` ) VALUES (NULL, :nombre_curso, :descripcion, :categoria_id, :idNivel)");
			$table->bindParam(":nombre_curso", $nombre_curso);
            $table->bindParam(":descripcion", $descripcion);
			$table->bindParam(":categoria_id", $categoria_id);
			$table->bindParam(":idNivel", $idNivel);
			
			
			if ($table->execute()) {
				
				header('Location: ../vista/index.php');
				
			}else{
				header('Location: ../vista/addcurso.php');
			}
		}

	
		
        public function editarCurso($id_curso, $nombre_curso, $descripcion)
		{
			$table = $this->db->prepare("UPDATE curso SET nombre_curso=:nombre_curso, descripcion=:descripcion WHERE id_curso=:id_curso");
			$table->bindParam(":id_curso", $id_curso);
			$table->bindParam(":nombre_curso", $nombre_curso);
			$table->bindParam(":descripcion", $descripcion);
			

			if ($table->execute()) {
				
				header('Location: ../vista/index.php');
			}else{
                header('Location: ../vista/editarcurso.php');
			}
		}

	


        public function eliminarCurso($id)
		{
			$table = $this->db->prepare("DELETE FROM curso WHERE id_curso = :id");
			$table->bindParam(":id", $id);
			if ($table->execute()) {
				header('Location: ../vista/index.php');
			}else{
				header('Location: ../vista/eliminarcurso.php');
			}
		}

		public function insertarNivel($id, $nombreCurso, $categoria){

		}

		public function verNivel(){
			$rows = null;
			$table = $this->db->prepare("SELECT * FROM niveles");
			$table->execute();
			while ($result = $table->fetch()){
				$rows[] = $result;
			}

			return $rows;
		}
		

	}

 ?>