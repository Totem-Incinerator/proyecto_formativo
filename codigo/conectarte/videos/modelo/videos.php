<?php

    //session_start();
    require_once("../../conexion/conexion.php");

    class Videos extends Conexion{

        public function __construct()
        {
            $this->db = parent::__construct();
        }

        public function verVideosCurso($id){
            $rows = null;
            $table = $this->db->prepare("SELECT * FROM video_curso WHERE curso_id = :id");
            $table->bindParam(":id", $id);
            $table->execute();

            while ($result = $table->fetch()) {
                $rows[] = $result;
            }

            return $rows;
        }

        public function verInfoVideo($id){
            $rows = null;
            $table = $this->db->prepare("SELECT DISTINCT id_curso, nombre_curso, descripcion FROM curso, video_curso WHERE id_curso = :curso_id");
            $table->bindParam(":curso_id", $id);
            $table->execute();

            while ($result = $table->fetch()) {
                $rows[] = $result;
            }
            return $rows;
        }


        public function verVideo(){
            $rows = null;
            $table =$this->db->prepare("SELECT id_video, url_video, curso_id FROM video_curso");
            $table->execute();

            while($result = $table->fetch())
            {
                $rows[] = $result;

            }
            return $rows;
        }

        public function verIdvideo($id){
             $rows =null;
             $table=$this->db->prepare("SELECT id_video, url_video, curso_id FROM video_curso WHERE id_video=:id ");
             $table->bindParam(":id", $id);
             $table->execute();
             while ($result =$table->fetch()){
                $rows[] = $result;
             }
             return $rows;
        }

        public function InsertarVideo($url_video, $curso_id){
            $table = $this->db->prepare("INSERT INTO video_curso (id_video,url_video,curso_id) VALUES (NULL, :url_video, :curso_id)");
            $table->bindParam(":url_video", $url_video);
            $table->bindParam(":curso_id", $curso_id);

     
            if ($table->execute()) {
                header('Location: ../vista/index.php');
            }else{
                header('Location: ../vista/addvideo.php');
            }
    
        }

        public function eliminarVideo($id)
        {
            $table=$this->db->prepare("DELETE FROM video_curso WHERE id_video =:id");
            $table->bindParam(":id", $id);
            if($table->execute()){
                header('Location: ../vista/indeX.php');
            }else{
                header('..(vista/eliminarvideo.php');
            }
        }

        public function editarVideo($id_video, $url_video, $curso_id)
        {
            $table = $this->db->prepare("UPDATE video_curso SET url_video=:url_video, curso_id=:curso_id WHERE id_video=:id");
            $table->bindParam(":id", $id_video);
            $table->bindParam(":url_video", $url_video);
            $table->bindParam(":curso_id", $curso_id);
            
            if($table->execute()){
                header('Location: ../vista/index.php');

            }else{
                header('Location: ../vista/editarvideo.php');
            }
        }

        public function verCurso()
        {
            $rows = null;
            $table = $this->db->prepare("SELECT id_curso, nombre_curso, descripcion FROM curso");
            $table->execute();
             while ($result = $table->fetch()) {
                 $rows[] = $result;
             }

             return $rows;
        }

        public function verIdEvaluacion($id){
            $rows = null;
            $table = $this->db->prepare("SELECT id_evaluacion
                                        FROM evaluacion e
                                        INNER JOIN curso c
                                        ON c.id_curso = e.curso_id
                                        INNER JOIN preguntas p
                                        ON e.id_evaluacion = p.evaluacion_id
                                        WHERE c.id_curso = :id 
                                        LIMIT 1");
            $table->bindParam(":id", $id);
            $table->execute();

            while ($result = $table->fetch()) {
                $rows[] = $result;
            }

            return $rows;
        }

        public function preguntasEvaluacion($id){
            $rows = null;
            $table = $this->db->prepare("SELECT * FROM preguntas p WHERE p.evaluacion_id = :id ORDER BY rand()");
            $table->bindParam(":id", $id);
            $table->execute();

            while ($result = $table->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $result;
            }

            return $rows;
        }


        public function verRespuestaCorrecta($id){
            $rows = null;
            $table = $this->db->prepare("SELECT rta_correcta FROM preguntas WHERE id_pregunta = :id");
            $table->bindParam(":id", $id);

            $table->execute();

            while($result = $table->fetch(PDO::FETCH_ASSOC)){
                $rows[] = $result;
            }
            
            return $rows;
        }

    }
    

