<?php
    
    require_once("../modelo/modelo-adulto.php");
    //sidebar
    //require_once("../../templates/sidebarAm.php");
    //header
    //require_once("../../templates/adultoHeader.php");


    $objMayor = new AdultoMayor();
    $id_usuario = $_SESSION['id_usuario'];
    $datosPerfil = $objMayor->verDatosPerfil($id_usuario);

    $idCursoUsuario = $_SESSION['id_usuario'];
	  $cursos = $objMayor->verMisCursos($idCursoUsuario);


   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
     <link rel="stylesheet" href="../../assets/css/botoness.css">
    <title>Perfil</title>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">

   
    <!-- Preloader -->
    
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../assets/images/icons/conectarteLogo.png" alt="ConectarteLogo" height="250" width="250">
  </div> 


<div class="wrapper">
  <?php 
      require_once("../../templates/adultoheader.php");
      require_once("../../templates/sidebarAm.php");
  ?>
  <div class="content-wrapper pt-5 pb-5">

      <div class="container">
      <?php
      if ($datosPerfil != null) {
          foreach($datosPerfil as $key){

      ?>

          <div class="main-body">
            <div class="row gutters-sm ">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <div class="field">
                        
                      </div>
                      <img src="data:image/jpg;base64, <?php echo base64_encode($key['Imagen']);?>" alt="Foto de perfil" class="rounded-circle" width="250">
                      <div class="mt-3">
                                <h4><?= $key['nombre']; ?></h4>
                               
    
                                <p class="text-secondary mb-1"></p>
                                <form action="../../imagenperfil/proceso_editar.php" method="POST" enctype="multipart/form-data" >
                                  <input type="file"  class="subir_archivo" required name="Imagen">
                                  <input type="hidden" required name="id_usuario" value="<?= $id_usuario ?>">
                                  <button class="btn btn_agregar">Editar Perfil</button>
                                </form>
                    
                  <!--<input type="file" name="Imagen">
                  <a href="../../imagenperfil/proceso_editar.php?id_usuario=<?= $id_usuario;?>" type="submit" name="Imagen" > editar </a> -->
  
    
    

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Nombre</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <?= $key['nombre']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Apellido</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $key['apellido']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Correo</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <?= $key['email']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Celular</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <?= $key['celular']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Edad</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <?= $key['edad']; ?>
                      </div>
                    </div>

                  </div>
                  <a href="editarperfil.php?Id=<?=$id_usuario;?>" aria-pressed="true" type="button" class="btn btn_editar">Editar Datos Personales</a >
                     <!-- Button trigger modal -->
                     

                </div>
              </div>
            </div>
          </div>
      <?php
          }
      }
      ?>
      </div>

      <!--CURSOS-->
      <!--
      <div class="container">
        <h1 class="text-center font-weight-bold mt-3">Tus Cursos</h1>
      </div>
      -->

    <section class="container d-flex flex-wrap pb-5 col-md-12">
      <?php
        if ($cursos == null) {
          echo '
            <div class="container">
              <h1 class="text-center font-weight-bold mt-3">No tienes cursos, 
                <a class="text-center" href="verCursos.php">explorar cursos...</a>
              </h1>
            </div>
            ';
        }else{
          echo '
            <div class="container">
              <h1 class="text-center font-weight-bold mt-3">Mis cursos</h1>
            </div>
            ';
        }

        if($cursos != null){
          foreach($cursos as $key){
      ?>
        <div class="container col-md-6 mt-5">

            <?php
              //foreach($colores as $key){
            ?>
          <div class="small-box bg-info">
            <?php
              //}
            ?>
            <div class="inner">
              <h3><?= $key['nombre_curso']; ?></h3>
              <p><?= $key['descripcion']; ?></p>
            </div>
            <div class="icon">
              <i class="fas fa-book"></i>
            </div>
              <a href="../../videos/vista/reproducir.php?Id=<?= $key['id_curso']; ?>" class="small-box-footer">
                ir al curso... <i class="fas fa-arrow-circle-right"></i>
              </a>
          </div>
        </div>
      <?php
          }
        }
      ?>
    </section>
    <?php
        include_once("../../templates/footer.php");
    ?>
  </div> 
</div>


    	<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/dist/js/demo.js"></script>
</body>
</html>