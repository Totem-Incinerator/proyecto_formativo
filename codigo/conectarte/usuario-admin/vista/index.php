<?php
require_once("../modelo/usuario-admin.php");


require_once("../../templates/sidebar.php");
require_once("../../templates/adminheader.php");
	 $Modelo_usuario = new Usuario();

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

		<h1 class="text-center"> Usuarios registrados</h1>
		
		<div class="wrapper p-3">
  
    
 		<div>
 	<table class="table table-light table-striped">
 		<thead>
 			
 			<th scope="col">Nombres</th>
 			<th scope="col">Apellidos</th>
 			<th scope="col">Email</th>
 			<th scope="col">Contraseña</th>
            <th scope="col">Celular</th>
            <th scope="col">Edad</th>
            
 		</thead>

 		<tbody>
 			<?php 
 			$listarUsuarios = $Modelo_usuario->verUsuarios();
 			if ($listarUsuarios != null) {
 				foreach ($listarUsuarios as $lista) {
 					
 			 ?>

 			 	<tr>
 			 	
 			 		<td><?= $lista['nombre'] ?></td>
 			 		<td><?= $lista['apellido'] ?></td>
 			 		<td><?= $lista['email'] ?></td>
 			 		<td><?= $lista['contrasena'] ?></td>
                    <td><?= $lista['celular'] ?></td>
                    <td><?= $lista['edad'] ?></td>
                
 			 		<td>
 			 			
 						<a href="eliminar.php?Id=<?= $lista['id_usuario']; ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Eliminar</a>
 			 		</td>
 			 	</tr>

 			<?php 
 				}
 			}
 			 ?>
 		</tbody>



 	</table>
       <?php include ("addadministrador.php");?>       
<button type="button" class="btn btn_agregar" data-toggle="modal" data-target="#agregaradministrador">
  Agregar administrador
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