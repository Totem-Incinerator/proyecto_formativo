<?php 
	require_once('../modelo/comentarios.php');
	
	if (isset($_REQUEST['btnEliminar'])) {
		$id = $_POST['id'];
		$ModeloComentario = new comentarios();
		$ModeloComentario->eliminarComentario($id);
	}else{
		header('Location: ../vista/index.php');
	}



 ?>