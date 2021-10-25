<?php

	require_once("../modelo/modelo-adulto.php");
	$objMayor = new AdultoMayor();
    $id_usuario = $_SESSION['id_usuario'];
    
    //require_once("../../templates/sidebarAm.php");
	//require_once("../../templates/adultoHeader.php");

    //$id = $_GET['Id'];
    //print_r($id);

    $verCursos = $objMayor->verCursos($id_usuario);

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
    <title>Cursos</title>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">

<div class="wrapper">
<?php 
  require_once("../../templates/adultoheader.php");
  require_once("../../templates/sidebarAm.php");
?>

    <div class="content-wrapper">
    <form action="../controlador/inscripcion.php" method="POST">
        <section class="container d-flex flex-wrap pb-5 col-md-10">

                <div class="container pt-3">
                    <h1 class="text-center font-weight-bold">Selecciona un curso para iniciar</h1>
                </div>
                <?php
                    if($verCursos != null){
                        foreach($verCursos as $key){
                ?>
            
                    <div class="container col-md-8 mt-3">
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3><?= $key['nombre_curso']; ?></h3>
                                    <p><?= $key['descripcion']; ?></p>
                                    <p>Categoria: <?= ucfirst(str_replace("_", " ", $key["nombre_categoria"]));?></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="icheck-primary small-box-footer">
                                        <input type="checkbox" id="curso_check" name="curso_id" value="<?= $key['id_curso']; ?>"/>
                                        <input type="hidden" name="id_usuario" value="<?= $id_usuario; ?>">
                                        <input type="hidden" name="estado" value="<?= $estado = "en_curso"; ?>">
                                        <label for="someCheckboxId">Seleccionar curso</label>
                                        <input type="hidden" value="<?= $fecha = date("Y-m-d"); ?>" name="fecha_inicio">
                                </div>
                                
                            </div>

                        </div>
                <?php
                        }
                    }
                ?>
                 <div class="container-fluid">
                    <input class="btn btn-success btn-block" type="submit" value="Inscribirme al curso seleccionado" name="prueba">
                </div>
            </section>
           
        </form>
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
<script src="../../assets/js/validarCursoSelec.js"></script>
</body>
</html>