<?php
require_once("../modelo/videos.php");


require_once("../../templates/sidebar.php");
require_once("../../templates/adminheader.php");
	 $Modelo_Video = new Videos();
$listaVideos= $Modelo_Video->verVideo();
	?>
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

	<div class="content-wrapper p-3">

    <div class="container">
      <h1 class="text-center">Vídeos</h1>
    </div>
		<div class="wrapper p-3">
  
    
 		
 	<table class="table table-light table-striped">
 		<thead class="btn_agregar">
 			<div>
 			<th  scope="col" > Url video </th>
 			<th scope="col"> Curso id</th>
      <th scope="col"> Acciones</th>
      
			
 		</thead>

 		<tbody > 
 			<?php 
 			$listaVideos = $Modelo_Video->verVideo();
 			if ($listaVideos != null) {
 				foreach ($listaVideos as $lista) {
 					
 			 ?>

 			 	<tr>
 			 	
 			 		<td><?= $lista['url_video'] ?></td>
 			 		<td><?= $lista['curso_id'] ?></td>
         
 			 	
                
 			 		<td>
 			 			
 						<a href="eliminarvideo.php?Id=<?= $lista['id_video']; ?>" class="btn btn_eliminar" role="button" aria-pressed="true">Eliminar</a>
						 <a href="editarvideo.php?Id=<?= $lista['id_video'];?>" aria-pressed="true" type="button" class="btn btn_editar">Editar</a >
 			 		</td>
 			 	</tr>

 			<?php 
 				}
 			}
 			 ?>
 		</tbody>



 	</table>
   <?php include ("addvideo.php");?>       
<button type="button" class="btn btn_agregar" data-toggle="modal" data-target="#agregarvideo">
  Agregar video
</button>
          



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





?>