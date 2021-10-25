<?php 
  require_once("../modelo/preguntas.php");
  

  $ModeloPreguntas = new Preguntas();
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
     
</div>
<a href="addpreguntas.php" type="button" class="btn btn_agregar">Agregar pregunta</a >
<div class="card card-primary ">
    
    <table class="table table-light table-striped">
      <thead>
        
        <th scope="col">Tipo pregunta</th>
        <th scope="col">Pregunta</th>
        <th scope="col">Rta1</th>
        <th scope="col">Rta2</th>
        <th scope="col">Rta3</th>
        <th scope="col">Rta4</th>
        <th scope="col">Rta correcta</th>

              
      </thead>

      <tbody>
        <?php 
        $listaPreguntas = $ModeloPreguntas->verPreguntas();
        if ($listaPreguntas != null) {
          foreach ($listaPreguntas as $lista) {
            
        ?>

          <tr>
          
            <td><?= $lista['tipo_pregunta'] ?></td>
            <td><?= $lista['texto_pregunta'] ?></td>
            <td><?= $lista['item1'] ?></td>
            <td><?= $lista['item2'] ?></td>
            <td><?= $lista['item3'] ?></td>
            <td><?= $lista['item4'] ?></td>
            <td><?= $lista['rta_correcta'] ?></td>
            <td><?= $lista['evaluacion_id'] ?></td>
                  
            <td>  
              <a href="delatepreguntas.php?Id=<?= $lista['id_pregunta']; ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Eliminar</a>
            </td>
            <td>  
              <a href="editpreguntas.php?Id=<?= $lista['id_pregunta']; ?>" class="btn btn-warning btn-sm active" role="button" aria-pressed="true">Editar</a>
            </td>
          </tr>

        <?php 
          }
        }
        ?>
 		</tbody>
 	</table>
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