<?php

    require_once("../../conexion/conexion.php");

    session_start();

    class AdultoMayor extends Conexion{
     
        function __construct(){
            $this->db = parent::__construct();
        }

        function verMisCursos($id){
            $rows = null;
            $table = $this->db->prepare("SELECT DISTINCT
            usuario.nombre,
            usuario.id_usuario,
            curso.nombre_curso,
            curso.descripcion,
            curso.id_curso,
            usuario_curso.curso_id
            FROM usuario
            INNER JOIN usuario_curso
            ON usuario_curso.usuario_id = usuario.id_usuario
            INNER JOIN curso
            ON curso.id_curso = usuario_curso.curso_id
            WHERE usuario_curso.usuario_id = :id");

            $table->bindParam(":id", $id);

            $table->execute();

            while($result = $table->fetch()){
                $rows[] = $result;
            }

            if ($rows == null) {
                return null;
            } else {
                return $rows;
            }
            
            //return $rows;
        }

        function verCursos($id){
            //cursos a los que está inscrito el usuario
            $rows1 = null;
            $table1 = $this->db->prepare("SELECT DISTINCT
            usuario.nombre,
            usuario.id_usuario,
            curso.nombre_curso,
            curso.descripcion,
            curso.id_curso,
            usuario_curso.curso_id, 
            usuario_curso.usuario_id,
            niveles.nivel
            FROM usuario
            INNER JOIN usuario_curso
            ON usuario_curso.usuario_id = usuario.id_usuario
            INNER JOIN curso
            ON curso.id_curso = usuario_curso.curso_id
            INNER JOIN niveles
            ON niveles.nivel = 1
            WHERE usuario_curso.usuario_id = :id");
            $table1->bindParam(":id", $id);
            $table1->execute();
            while($result = $table1->fetch(PDO::FETCH_ASSOC)){
                $rows1[] = $result;
            }
            
            //TODOS LOS CURSOS
            $rows2 = null;
            $table2 = $this->db->prepare("SELECT DISTINCT nombre_categoria, id_curso, nombre_curso, descripcion FROM categoria, curso WHERE categoria_id = id_categoria");
            
            $table2->execute();

            while ($result = $table2->fetch(PDO::FETCH_ASSOC)) {
                $rows2[] = $result;
            }

            /*            
            echo "Cursos del usuraio <br>";
            echo "<pre>";
            print_r($rows1);
            echo "<pre>";
            */
            
            
            
            if ($rows1 != null) {
                foreach ($rows1 as $usuraioCursos) {
                    foreach ($rows2 as $todosCursos) {
                        if ($usuraioCursos['curso_id'] == $todosCursos['id_curso']) {
                            for ($i=0; $i < sizeof($rows1); $i++) { 
                                //echo $usuraioCursos['curso_id'];
                                //echo $todosCursos['id_curso'];
                                unset($rows2[$i]);
                            }
                            return $rows2;
                            
                        }      
                    }
                }
            }else{
                return $rows2;
            }
            
            //return $rows2;
        }


        function inscribirseCurso($curso_id, $fecha, $usuario_id, $estado){

            //verificar que el usuario no esté inscrito a un curso
            /*
            $table2 = $this->db->prepare("SELECT * FROM curso c LEFT JOIN usuario_curso u ON u.curso_id = c.id_curso");
            $table2->execute();

            while ($result = $table2->fetch(PDO::FETCH_ASSOC)) {
                $rows2[] = $result;
            }

            for ($i=0; $i < sizeof($rows2); $i++) { 
               if ($rows2[$i]['id_usuario_curso'] == null) {
                   echo "de es null";
               }
            }
            echo "<pre>";
            print_r($rows2);
            echo "<pre>";
            */

            $table = $this->db->prepare("INSERT INTO usuario_curso (curso_id, fecha_inicio, usuario_id, estado) VALUES (:curso_id, :fecha, :usuario_id, :estado)");
      
            /*
            foreach((array) $curso_id as $val){
                $table->bindParam(":curso_id", $val);
            }
            */

            $table->bindParam(":curso_id", $curso_id);
            $table->bindParam(":fecha", $fecha);
            $table->bindParam(":usuario_id", $usuario_id);
            $table->bindParam(":estado", $estado);

            if($table->execute()){
                header("Location: ../../adulto-mayor/vista/perfil.php");
            }else{
                header("../index.php");
            }
            
        }

        function verIdCursos(){
            $rows = null;
            $table = $this->db->prepare("SELECT id_curso, nombre_curso FROM curso");
            $table->execute();
            while ($result = $table->fetch()) {
                $rows[] = $result;
            }
            return $rows;

        }

        function verDatosPerfil($id){
            $rows = null;
            $table = $this->db->prepare("SELECT nombre, apellido, email, contrasena, celular, edad, Imagen FROM usuario WHERE id_usuario = :id");
            $table->bindParam(":id", $id);
            $table->execute();

            while ($result = $table->fetch()) {
                $rows[] = $result;
            }
            return $rows;
        }

        public function verMisEvaluaciones($id){
			$rows = null;
			$table = $this->db->prepare("SELECT descripcion, puntaje FROM evluacion WHERE usuario_id = :id");
            $table->bindParam(":id", $id);
            $table->execute();
            while ($result = $table->fetch()) {
                $rows[] = $result;
            }
            return $rows;
		}

        public function verPreguntas($id){
            $rows = null;
            $table = $this->db->prepare("SELECT * FROM preguntas WHERE evaluacion_id = :id");
            $table->bindParam(":id", $id);
            $table->execute();

            while ($result = $table->fetch()) {
                $rows[] = $result;
            }

            return $rows;
        }


        public function verIdperfil($id)
        {
            $rows = null;
            $table=$this->db->prepare("SELECT id_usuario, nombre, apellido, celular FROM usuario where id_usuario=:id");
            $table->bindParam(":id", $id);
            $table->execute();
            while($result=$table->fetch()){
                $rows[]=$result;
            }
            return $rows;
        }

        public function editarperfil($id_usuario, $nombre, $apellido, $celular)
        {
            $table=$this->db->prepare("UPDATE usuario SET nombre=:nombre, apellido=:apellido, celular=:celular  where id_usuario=:id_usuario");
            $table->bindParam(":id_usuario", $id_usuario);
            $table->bindParam(":nombre", $nombre);
            $table->bindParam(":apellido", $apellido);
       
            $table->bindParam(":celular", $celular);
            if ($table->execute()) {
                header('Location: ../vista/perfil.php');
            }else{
                echo "imposibol";
            }
        }

    }