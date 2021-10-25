<?php 
	require_once('../modelo/cursos.php');

	if (isset($_REQUEST['btnEditar'])) {
		$ModeloCurso = new Curso();
		$id_curso = $_POST['id_curso'];
		$nombre_curso = $_POST['nombre_curso'];
		$descripcion = $_POST['descripcion'];
		$categoria_id = $_POST['id_categoria'];
		$ModeloCurso -> editarCurso($id_curso, $nombre_curso, $descripcion, $categoria_id);
	}else{
		header('Location: ../vista/index.php');
	}

 ?>
