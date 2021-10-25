<?php 

    require_once('../modelo/usuario-admin.php');
    if(isset($_REQUEST["btnInsertar"])){
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $email=$_POST['email'];
        $contrasena=$_POST['contrasena'];
        $celular=$_POST['celular'];
        $edad=$_POST['edad'];
        $documento=$_POST['documento'];
        $rol_id=$_POST['rol_id'];
        $ModeloUsuario= new Usuario();
        $ModeloUsuario->insertarAdministrador($nombre, $apellido, $email, $contrasena, $celular, $edad , $documento, $rol_id);
    }else{
     
     header('Location: ../vista/index.php');
    }





?>





















        $nombre_curso = $_POST['nombre_curso'];
        $descripcion = $_POST['descripcion'];
        $categoria_id = $_POST['categoria_id'];

        $ModeloCurso = new curso();
        $ModeloCurso -> insertarCurso($nombre_curso, $descripcion, $categoria_id);
    }
    else{
     echo("ghola");
     header('Location: ../vista/index.php');
    }


 ?>