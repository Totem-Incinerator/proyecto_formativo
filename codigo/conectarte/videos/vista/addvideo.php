
<?php
require_once("../modelo/videos.php");
require_once("../../templates/sidebar.php");
require_once("../../templates/adminheader.php");

$Modelo_Video = new Videos();
$listaVideos= $Modelo_Video->verVideo();
$ver_curso=$Modelo_Video->verCurso();




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

                                     
      


<!-- Button trigger modal -->

  <div class="container-sm ">

<!-- Modal -->
<div class="modal fade" id="agregarvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header titulo_caja">
        <h5 class="modal-title " id="exampleModalLongTitle">Agregar video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



         <div class="card card-primary">
              
   <form action="../controlador/addvideo.php" method="POST">
                <div class="card-body">

                  <div class="form-group">

                    <label for="">Url video</label>
                    <input type="text" class="form-control" placeholder="Url video" name="url_video">
                  </div>

                   <div class="form-group">
                        <label> selecciona el curso</label>
                    <select name='curso_id' class="form-control mt-7">
                    
                    <option label="" >Seleccione el curso</option>
                    <?php
                    print_r($ver_curso);
                        
                    if($ver_curso != null){
                        foreach ($ver_curso as $curso) {
                    ?>
                        <option value="<?= $curso['id_curso'] ?>" ><?= strtoupper(str_replace("_", " ", $curso['nombre_curso']))?></option>
                    <?php 
                        }
                    }
                    ?>


                </select>
              </div>

                 


                   




            </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn_agregar" name="btnInsertar">Insertar</button>
                  <button type="submit" name="btnCancelar" class="btn btn_editar">Cancelar</button>
                </div>
              </form>
              
            </div>
            <!-- /.card -->

    
     </div>   
        
      </div>
    </div>
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