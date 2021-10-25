<?php 
  require_once("../modelo/cursos.php");
  

  $ModeloCurso = new Curso();
 ?>


<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Conectarte | Inicio</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../assets/css/botoness.css">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">

<div class="wrapper">
    
 <?php 
      require_once("../../templates/adminheader.php");
      require_once("../../templates/sidebar.php");
  ?>

  <div class="container"> 
    <div class="container py-3">
        <?php include ("addcurso.php")?>  
        <button type="button" class="btn btn_agregar btn-block" data-toggle="modal" data-target="#agregarcurso">
          Agregar curso
        </button>
    </div>

      <?php 
      $listaCursos = $ModeloCurso->verCurso();
      if ($listaCursos != null) {
        foreach ($listaCursos as $info) {
      ?>
        <div class="card">
            <div class="titulo_caja">
              <h3 class=""><?= $info['nombre_curso']?></h3> 
            </div>
              <div class="">
                <div class="card">
                  <!--<div class="card-group">-->
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <label for="">Nombre del curso</label>
                            <p class="card-text >"><?= $info['nombre_curso']?></p>
                            <label for="">Descripcion</label>
                            <p class="card-text >"><?= $info['descripcion']?></p>
                            <a href="editarcurso.php?Id=<?= $info['id_curso'];?>" aria-pressed="true" type="button" class="btn btn_editar">Editar</a >
                            <a href="eliminarcurso.php?Id=<?= $info['id_curso'];?>" aria-pressed="true" type="button" class="btn btn_eliminar">Eliminar</a >
                      </div>
                  <!--</div>-->
                </div>
              </div>
        </div> 
      <?php
          }
        }
      ?>
      
  </div>

<?php
    require_once("../../templates/footer.php");
?>

</div>

<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../..assets/dist/js/demo.js"></script>
</body>
</html>