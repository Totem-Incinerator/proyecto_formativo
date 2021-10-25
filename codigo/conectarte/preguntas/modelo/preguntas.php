<?php
require_once("../../conexion/conexion.php");
class Preguntas extends Conexion
	{
		
		function __construct()
		{
			$this->db = parent::__construct();
		}
        public function verEvaluacion()
        {
            $rows = null;
            $table = $this->db->prepare("SELECT id_evaluacion, descripcion, instrucciones, puntaje, curso_id FROM evaluacion");
            $table->execute();

            while ($result = $table->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $result;
            }

            return $rows;
        }
           public function verIdEvaluacion($id){
            $rows = null;
            $table = $this->db->prepare("SELECT id_evaluacion, descripcion, instrucciones, puntaje, curso_id FROM evaluacion WHERE id_evaluacion = :id");
            $table->bindParam(":id", $id);
            $table->execute();

            while ($result = $table->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $result;
            }

            return $rows;
            
        }

        
          public function verIdPreguntas($id)
        {
            $rows = null;
            $table = $this->db->prepare("SELECT id_pregunta , tipo_pregunta, texto_pregunta, item1, item2, item3, item4, retroalimentacion_correcta, retroalimentacion_negativa, rta_correcta, evaluacion_id  FROM preguntas WHERE id_pregunta = :id");
            $table->bindParam(":id", $id);
            $table->execute();
            while ($result = $table->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $result;
            }

            return $rows;
        }
            public function verPreguntas(){
            $rows= null;
            $table=$this->db->prepare("SELECT id_pregunta , tipo_pregunta, texto_pregunta, item1, item2, item3, item4, retroalimentacion_correcta, retroalimentacion_negativa, rta_correcta, evaluacion_id FROM preguntas");
            $table->execute();
    
            while ($result =$table->fetch()){
                $rows[]= $result;
            }
            return $rows;
            }
      
     

        public function insertarPreguntas($tipo_pregunta, $texto_pregunta, $item1, $item2, $item3, $item4,  $retroalimentacion_correcta, $retroalimentacion_negativa,$rta_correcta, $evaluacion_id){
            $table = $this->db->prepare("INSERT INTO preguntas ( tipo_pregunta, texto_pregunta, item1, item2, item3, item4, retroalimentacion_correcta, retroalimentacion_negativa, rta_correcta, evaluacion_id) VALUES ( :tipo_pregunta, :texto_pregunta, :item1, :item2, :item3, :item4, :retroalimentacion_correcta, :retroalimentacion_negativa, :rta_correcta, :evaluacion_id)");
            $table->bindParam(":tipo_pregunta", $tipo_pregunta);
            $table->bindParam(":texto_pregunta", $texto_pregunta);
            $table->bindParam(":item1", $item1);
            $table->bindParam(":item2", $item2);
            $table->bindParam(":item3", $item3);
            $table->bindParam(":item4", $item4);
            $table->bindParam(":retroalimentacion_correcta", $retroalimentacion_correcta);
            $table->bindParam(":retroalimentacion_negativa", $retroalimentacion_negativa);
            $table->bindParam(":rta_correcta", $rta_correcta);
            $table->bindParam(":evaluacion_id", $evaluacion_id);

            if ($table->execute()) {
                header('Location: ../index.php');
            }else{
                echo "err";
            }
        }

        public function editarPreguntas($id_pregunta, $tipo_pregunta, $texto_pregunta, $item1, $item2, $item3, $item4,  $retroalimentacion_correcta, $retroalimentacion_negativa,$rta_correcta, $evaluacion_id)
        {
            $table = $this->db->prepare("UPDATE preguntas SET tipo_pregunta=:tipo_pregunta, texto_pregunta=:texto_pregunta, item1=:item1 , item2=:item2, item3=:item3 , item4=:item4 ,retroalimentacion_correcta=:retroalimentacion_correcta, retroalimentacion_negativa=:retroalimentacion_negativa, rta_correcta=:rta_correcta, evaluacion_id=:evaluacion_id WHERE id_pregunta=:id_pregunta");
            $table->bindParam(":id_pregunta", $id_pregunta);
            $table->bindParam(":tipo_pregunta", $tipo_pregunta);
            $table->bindParam(":texto_pregunta", $texto_pregunta);
            $table->bindParam(":item1", $item1);
            $table->bindParam(":item2", $item2);
            $table->bindParam(":item3", $item3);
            $table->bindParam(":item4", $item4);
            $table->bindParam(":retroalimentacion_correcta", $retroalimentacion_correcta);
            $table->bindParam(":retroalimentacion_negativa", $retroalimentacion_negativa);
            $table->bindParam(":rta_correcta", $rta_correcta);
            $table->bindParam(":evaluacion_id", $evaluacion_id);

            if ($table->execute()) {
                
                header('Location: ../vista/index.php');
            }else{
                header('Location: ../vista/editpreguntas.php');
            }
        }
        

        


    public function eliminarPreguntas($id)
        {
            $table = $this->db->prepare("DELETE FROM preguntas WHERE id_pregunta = :id");
            $table->bindParam(":id", $id);
            if ($table->execute()) {
                header('Location: ../vista/index.php');
            }else{
                header('Location: ../vista/delatepreguntas.php');
            }
        }

    }
        ?>