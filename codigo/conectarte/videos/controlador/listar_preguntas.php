<?php 

		require_once("../modelo/videos.php");
		$objVideo = new Videos();

		$id = $_POST['id'];

		$arrayEvaluacion = $objVideo->verIdEvaluacion($id);
    	$idEvaluacion = $arrayEvaluacion[0][0];
    	//echo $idEvaluacion;

		$preguntas = $objVideo->preguntasEvaluacion($idEvaluacion);
		
		$jsonstring = json_encode($preguntas);
		
		echo $jsonstring;
		
 ?>