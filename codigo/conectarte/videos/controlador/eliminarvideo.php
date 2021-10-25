

 <?php
  require_once('../modelo/videos.php');
  if(isset($_REQUEST['btnEliminar'])){
      $id =$_POST['id'];
      $ModeloVideo = new Videos();
      $ModeloVideo->eliminarVideo($id);

  }else{
      header('Location: ../vista/index.php');
  }
  ?>
       
