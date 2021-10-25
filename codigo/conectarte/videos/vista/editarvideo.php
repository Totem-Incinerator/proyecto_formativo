<?php
require_once("../modelo/videos.php");
require_once("../../templates/adminheader.php");
require_once("../../templates/sidebar.php");



  $ModeloVideo = new Videos();
  $Id = $_GET['Id'];
  $infoVideo = $ModeloVideo->verIdvideo($Id);
    


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
    <div class="container">
   <div class="card card-primary" >
              <div class="titulos">
              <div class="card-header" >
                <h3 class="card-title">Editar curso</h3>
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../controlador/editarvideos.php" method="POST">
                <input type="hidden" name="id_video" value="<?= $Id?>">

                <?php
      if ($infoVideo != null) {
        foreach ($infoVideo as $info) {
      ?>
        

                <div class="card-body">
                  <div class="form-group">
                    
                     <label for="">url</label>
              
                    <input type="text" class="form-control" placeholder="" name="url_video" 
                    value="<?= $info['url_video']?>">

                    <label for="">curso_id</label>
              
                    <input type="text" class="form-control" placeholder="" name="curso_id" 
                    value="<?= $info['curso_id']?>">

                  </div>
                    
                 

                    
            </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn_editar" name="btnEditar">Editar</button>
                  <button type="submit" name="btnCancelar" class="btn btn_eliminar">Cancelar</button>
                </div>
                <?php
                  }
                }
                ?>
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