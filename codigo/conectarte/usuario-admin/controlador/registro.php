<?php
    require_once("../modelo/usuario-admin.php");

    if (isset($_REQUEST['registro'])) {
        $objUser = new Usuario();
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];
        $rol = $_POST['rol'];

        $objUser->registrarse($nombre, $apellido, $edad, $email, $contrasena, $rol);
        echo '<script>alert("Usuario registrado!!!")</script>';
    }else{
        echo "error al registrarse";
    }


?>