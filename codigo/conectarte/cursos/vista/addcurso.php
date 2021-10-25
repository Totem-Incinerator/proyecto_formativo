<?php
require_once("../modelo/cursos.php");
require_once("../../templates/sidebar.php");
require_once("../../templates/adminheader.php");

$ModeloCurso = new Curso();
$ver_categoria = $ModeloCurso->verCategoria();



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


<!-- Modal -->
<div class="modal fade" id="agregarcurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



  <div class="container-sm ">
         <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../controlador/addcurso.php" method="POST">
                <div class="card-body">

                    <div class="form-group">
                        <label>Seleccionar Categoria</label>
                        <?php //$dato = $_GET['dato']; echo $dato; ?>
                    <select name='categoria_id' class="form-control mt-7" required>
                    
                    <option label="" >Seleccione categoria</option>
                    <?php
                    print_r($ver_categoria);
                        
                    if($ver_categoria != null){
                        foreach ($ver_categoria as $categoria) {
                    ?>
                        <option value="<?= $categoria['id_categoria'] ?>" ><?= strtoupper(str_replace("_", " ", $categoria['nombre_categoria']))?></option>
                    <?php 
                        }
                    }
                    ?>


                </select>
              </div>
                  <div class="form-group">
                    <label for="">Nombre del curso</label>
                    <input type="text" class="form-control" placeholder="Añadir curso" name="nombre_curso" required>
                  </div>

                  <div class="form-group">
                    <label for="">Descripcion</label>
                    <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" required>
                  </div>
                  <input type="hidden" name="idNivel" value="<?= $id = 1; ?>">
            </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="" class="btn btn_agregar" name="btnInsertar">Insertar</button>
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