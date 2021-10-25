<?php

require_once("../modelo/videos.php");
if(isset($_REQUEST["btnInsertar"])){

    $url = $_POST['url_video'];
   
    $curso_id = $_POST['curso_id'];
    $url_video = str_replace("watch?v=", "embed/", $url);

 

    $ModeloVideo = new Videos();
    $ModeloVideo->InsertarVideo($url_video, $curso_id);

}
else{

    header('Location: ../vista/index.php');
   }







?>
   