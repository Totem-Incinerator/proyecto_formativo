<?php
require_once("../modelo/modelo-adulto.php");




  $ModeloAdulto= new AdultoMayor();
  $Id = $_GET['Id'];
  $infoperfil = $ModeloAdulto->verIdperfil($Id);
   


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
   <div class="card card-primary mt-5" >
              <div class="titulos">
              <div class="card-header" >
                <h3 class="card-title">Editar Perfil</h3>
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../controlador/editarperfil.php" method="POST">
                <input type="hidden" name="id_usuario" value="<?= $Id?>">

                <?php
      if ($infoperfil != null) {
        foreach ($infoperfil as $key) {
      ?>
        

                <div class="card-body">
                  <div class="form-group">
                     <label for="">Nombre</label>
                    <input type="text" class="form-control"  name="nombre"
                    value="<?= $key['nombre']?>">

                  </div>


                  <div class="form-group">
                     <label for="">Apellido</label>
                    <input type="text" class="form-control"  name="apellido"
                    value="<?= $key['apellido']?>">

                  </div>

                    
                    
                 <div class="form-group">
                 <label for="">Celular</label>
                  <input type="text" class="form-control"  name="celular" 
                  value="<?= $key['celular']?>">
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