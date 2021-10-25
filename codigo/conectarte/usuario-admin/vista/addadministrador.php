<?php
require_once("../modelo/usuario-admin.php");
require_once("../../templates/sidebar.php");
require_once("../../templates/adminheader.php");

$ModeloUsuario = new Usuario();
$ver_rol = $ModeloUsuario->verRol();



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
<div class="modal fade" id="agregaradministrador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header titulo_caja">
        <h5 class="modal-title " id="exampleModalLongTitle">Agregar administrador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



         <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../controlador/addadministrador.php" method="POST">
                <div class="card-body">
 
                  <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                  </div>

                  <div class="form-group">
                    <label for=""> Apellido</label>
                    <input type="text" class="form-control" placeholder="Apellido" name="apellido">
                  </div>


                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" placeholder="Email" name="email">
                  </div>

                  <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Contrasena" name="contrasena">
                  </div>
 
                  <div class="form-group">
                    <label for="">Celular</label>
                    <input type="text" class="form-control" placeholder="Celular" name="celular">
                  </div>

                    <div class="form-group">
                    <label for="">Edad</label>
                    <input type="text" class="form-control" placeholder="edad" name="edad">
                  </div>

                  <div class="form-group">
                    <label for="">Documento</label>
                    <input type="text" class="form-control" placeholder="Documento" name="documento">
                  </div>

                   <br>
                  
                   <div class="form-group">
                        <label>Seleccionar rol</label>
                    <select name='rol_id' class="form-control mt-7">
                    
                    <option label="" >rol</option>
                    <?php
                    print_r($ver_rol);
                  
                    if($ver_rol != null){
                        foreach ($ver_rol as $categoria) {
                    ?>
                        <option value="<?= $categoria['id_rol'] ?>" ><?= strtoupper(str_replace("_", " ", $categoria['nombre_rol']))?></option>
                    <?php 
                        }
                    }
                    ?>


                </select>
              </div>

                    
              </div>
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