<?php 
  require_once("../modelo/comentarios.php");




  

  $ModeloComentarios = new comentarios();
 ?>


<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Conectarte | Comentarios</title>

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
  
<div class="card card-primary ">

    <?php 
    $listaComentarios = $ModeloComentarios->verComentarios();
    if ($listaComentarios != null) {
      foreach ($listaComentarios as $info) {
    ?>

    
             <div class="titulo_caja">
                <h3 class="">Comentarios</h3> 
             </div>
      <div class="wrapper">
      <div class="card">
       <div class="card-group tarjetas">
          
               <div class="card-body">
              <h5 class="card-title"> 
              <label for="">Nombre</label>
                <span class="">
               <p class="card-text >"><?= $info['nombre']?></p>
              </span><br>


            <label for="">Correo</label>
                <span class="">
               <p class="card-text >"><?= $info['correo']?></p>
              </span><br>

                

                <label for="">Asunto</label>
                <span class="">
               <p class="card-text >"><?= $info['asunto']?></p>
              </span><br>

                <label for="">Sugerencia</label>
                <span class="">
               <p class="card-text >"><?= $info['sugerencia']?></p>
              </span><br>
                 

              <a href="delatecomentario.php?Id=<?= $info['id_comentario'];?>" aria-pressed="true" type="button" class="btn btn_eliminar">Eliminar</a >

              
           </div>
         
        </div>
      </div>
      </div>
    <?php  
      }
    }
    ?>
  </div>  
              
              
            </div>
            <!-- /.card -->

        
     </div> 

 
  
    </div>

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