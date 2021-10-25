<?php

	require_once("../modelo/modelo-adulto.php");
	$objAmayor = new AdultoMayor();
	$idCursoUsuario = $_SESSION['id_usuario'];
	$cursos = $objAmayor->verMisCursos($idCursoUsuario);
	//$id_curso = $objAmayor->verIdCursos();

	//require_once("../../templates/sidebarAm.php");
	require_once("../../templates/adultoHeader.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
	<title>Conectarte</title>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">

	<div class="container">
		<h1 class="text-center font-weight-bold mt-3">Tus Cursos</h1>
	</div>

	<section class="container d-flex flex-wrap pb-5 col-md-10">
		<?php
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
						<a href="contenido.php?Id=<?= $key['id_curso']; ?>" class="small-box-footer">
							Ver más... <i class="fas fa-arrow-circle-right"></i>
						</a>
				</div>
			</div>
		<?php
				}
			}
		?>
	</section>
	
	<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/dist/js/demo.js"></script>

			<?php
				require_once("../../templates/footer.php");
			?>

</body>
</html>