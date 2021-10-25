<?php
require_once("../modelo/videos.php");
require_once("../../templates/adminheader.php");
require_once("../../templates/sidebar.php");

$ModeloVideo = new Videos();
//$ver_categoria = $ModeloCurso->verCategoria();

$id = $_GET['Id'];
  echo $id;
    $info = $ModeloVideo->verIdvideo($id);

//require_once("../../templates/sidebar.php");

?>


<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Conectarte | Inicio</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../assets/css/botoness.css">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">

<div class="container-sm mt-5">



       <div class="container-sm mt-5">
         <div class="card card-primary">
          <div class="titulos">
              <div class="card-header">
                <h3 class="card-title">Eliminar video</h3>
              </div>
         </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form action="../controlador/eliminarvideo.php" method="POST">
              
            <input type="hidden" name="id" value="<?= $id?>">
            
            
            <label>url video </label><br>
            <?php 
                if ($info != null) {
                    foreach ($info as $infoVideo) {  
                        echo $infoVideo['url_video']."<br>";
                    }
                    
                }
                
             ?>
            <p>¿Está seguro de eliminar el video??</p> 
            
            

             <button type="submit" name="btnEliminar" class="btn btn_eliminar">Eliminar</button>
             <button type="submit" name="btnCancelar" class="btn btn_editar">Cancelar</button>
        </form>
            </div>
            <!-- /.card -->

        
     </div>                                        
      

    </div>


     


  
<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../..7assets/dist/js/demo.js"></script>
</body>
</html>