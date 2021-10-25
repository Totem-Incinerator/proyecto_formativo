<?php 
    require_once("../modelo/cursos.php");
    if(isset($_REQUEST["btnInsertar"])){

        $nombre_curso = $_POST['nombre_curso'];
        $descripcion = $_POST['descripcion'];
        $categoria_id = $_POST['categoria_id'];
        $idNivel = $_POST['idNivel'];

        $ModeloCurso = new curso();
        $ModeloCurso -> insertarCurso($nombre_curso, $descripcion, $categoria_id, $idNivel);
    }
    else{
     echo("ghola");
     header('Location: ../vista/index.php');
    }


 ?>
