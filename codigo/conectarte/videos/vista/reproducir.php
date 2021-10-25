<?php

    require_once("../modelo/videos.php");
    //require_once("../../templates/adultoHeader.php");
    //require_once("../../templates/sidebarAm.php");
    require_once("../../adulto-mayor/modelo/modelo-adulto.php");
    $objVideo = new Videos();
    $objAdulto = new AdultoMayor();
    $id_video = $_GET['Id'];
    $_SESSION['idVideo'] = $_GET['Id'];
    $idVideo = $_SESSION['idVideo'];

    //echo ($id_video);

    $urlVideo = $objVideo->verVideosCurso($idVideo);
    $infoVideo = $objVideo->verInfoVideo($idVideo);

    
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
    <link rel="stylesheet" href="../../assets/css/sweetalert2.css">



    <title>Conectarte</title>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse" >

<div class="wrapper">

<?php 
  require_once("../../templates/adultoheader.php");
  require_once("../../templates/sidebarAm.php");
?>

<div class="content-wrapper pt-1">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Lección</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Evaluación</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Resultados</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <!-- VIDEOS -->
        <div class="container">
            <?php
            if ($infoVideo != NULL) {
                foreach($infoVideo as $key){
            ?>
                <h2 class="text-primary fw-6">Curso: <b><?= $key['nombre_curso'];?></b></h2>
                <p class="text-secondary"><?= $key['descripcion']; ?></p>
                <input type="hidden" class="Idcurso" value="<?= $key['id_curso']; ?>">
            <?php
                }
            }
            ?>
        </div>
    <section class="pb-1">
        <?php
        if ($urlVideo != NULL) {
            foreach($urlVideo as $key){
        ?>
        <div class="container md-5 mb-1 pb-5">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-md-4 mb-1 mt-md-0">
                    <!--div class="">-->
                    <iframe class="mx-auto" width="329" height="640"
                        src="<?= $key['url_video']; ?>"
                        allowfullscreen=""></iframe>
                    <!--</div>-->
                </div>
            </div>
        </div>
        <?php
            }
        }else {
            echo '<h1 class="text-center">Video no encontrado... <a href="../../adulto-mayor/vista/perfil.php">volver atras</a></h1>';
        }
        ?>
           
    </section>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <section class="container-fluid pt-3">
                <h1 class="text-center text-primary font-weight-bold mt-3">Selecciona la respuesta correcta</h1>
                <hr>

                <form id="formulario" action="../controlador/verificar_respuesta.php" method="POST">
                    <div id="preguntas">
                       
                        
                    </div>
                    <button class="btn btn-success btn-block">Enviar</button>
                </form>

            </section>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div id="puntaje">
                <div class="container pt-3">
                    <h1 class="text-center font-weight-bold punto"></h1>
                </div>
                <div class="container">
                    <h1 class="text-center font-weight-bold mt-3">Ver otro 
                        <a class="text-center" href="../../adulto-mayor/vista/verCursos.php">curso...</a>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <?php
        require_once("../../templates/footer.php");
    ?>
    </div>
</div>
</div>
<!-- jQuery -->
<script src="../../assets/jquery/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/dist/js/demo.js"></script>

<!--Mis SCRIPTS -->
<script src="../../assets/js/preguntas.js"></script>
<script src="../../assets/js/sweetalert2.js"></script>


<!--<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->

<script>
    function redireccionar(){
        console.log('click click')
        $("#nav-contact-tab").trigger("click")
    }

    function recargarPreguntas(){
        location.reload();
    }


</script>

</body>
</html>