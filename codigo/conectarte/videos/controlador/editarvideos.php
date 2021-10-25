
<?php
    require_once('../modelo/videos.php');

    if(isset($_REQUEST['btnEditar'])){
         $url = $_POST['url_video'];
   
    $curso_id = $_POST['curso_id'];
    $url_video = str_replace("watch?v=", "embed/", $url);

        $ModeloVideo = new Videos();
        $id_video =$_POST['id_video'];
        

        $ModeloVideo->editarVideo($id_video, $url_video, $curso_id);
    }else{
        header('Location: ../vista/index.php');
    }

?>

   