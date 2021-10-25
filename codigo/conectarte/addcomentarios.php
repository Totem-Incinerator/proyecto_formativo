
<?php

require_once('modelocomentarios.php');
if(isset($_REQUEST["btnInsertar"])){
    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $asunto=$_POST['asunto'];
    $sugerencia=$_POST['sugerencia'];
    $ModeloUsuario= new Usuario();
    $ModeloUsuario->insertarComentario($nombre, $correo, $asunto, $sugerencia);

}else{
    header('Location: index.php');
}

?>