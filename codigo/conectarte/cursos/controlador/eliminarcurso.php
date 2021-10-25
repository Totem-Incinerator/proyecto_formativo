<?php 
	require_once('../modelo/cursos.php');
	
	if (isset($_REQUEST['btnEliminar'])) {
		$id = $_POST['id'];
		$ModeloCurso = new Curso();
		$ModeloCurso->eliminarCurso($id);
	}else{
		header('Location: ../vista/index.php');
	}



 ?>