<?php 
	require_once('../modelo/preguntas.php');
	
	if (isset($_REQUEST['btnEliminar'])) {
		$id = $_POST['id'];
		$ModeloPreguntas = new Preguntas();
		$ModeloPreguntas->eliminarPreguntas($id);
	}else{
		header('Location: ../vista/index.php');
	}



 ?>