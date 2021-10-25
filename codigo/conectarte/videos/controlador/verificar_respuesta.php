<?php
	require_once('../modelo/videos.php');
	$objVideo = new Videos();

	/*
	$idPregunta = $_POST['idPregunta'];
	$respuestaUsuario = $_POST['textoRta'];
	*/

	//respuestas
	$r1 = $_REQUEST['p1'];
	$r2 = $_REQUEST['p2'];
	$r3 = $_REQUEST['p3'];
	//$r4 = $_REQUEST['p4'];
	//$r5 = $_REQUEST['p5'];


	//id de preguntas
	$id1 = $_REQUEST['id_pregunta1'];
	$id2 = $_REQUEST['id_pregunta2'];
	$id3 = $_REQUEST['id_pregunta3'];
	//$id4 = $_REQUEST['id_pregunta4'];
	//$id5 = $_REQUEST['id_pregunta5'];



	$ids = [$id1, $id2, $id3];
	$rtas = [$r1, $r2, $r3];


	for ($i=0; $i < sizeof($ids); $i++) { 
		$respuestaCorrecta[] = $objVideo->verRespuestaCorrecta($ids[$i]);
	}

	$puntos = 0;
	
	for ($i=0; $i < sizeof($rtas); $i++) { 
		if ($rtas[$i] == $respuestaCorrecta[$i][0]['rta_correcta']) {
			$puntos = $puntos + 50;
		}	
	}

	/*
	if ($puntos > 60) {
		echo "has desbloqueado el siguiente nivel".$puntos;
	}else{
		echo "fallaste, puedes volver a intentarlo".$puntos;
	}
	*/

	echo $puntos;
	
?>