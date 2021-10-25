
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Conectarte | Inicio</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">

    <!-- Main content -->
    <div class="wrapper">
      <?php 
        //NavBar
        include "../templates/adminheader.php";

        //BarraLateral
        include "../templates/sidebar.php";

        //Body
        include "../templates/adminbody.php";

        //LISTA PAGINAS HTACCESS
        if(isset($_GET["rutas"])){
          if ($_GET["rutas"] == "uActivos") {
            include "usuario-admin/vista/".$_GET["rutas"].".php";
          }else{
            echo "NO HAY RUTAAAA";
            //header('refresh:3; url../index.php');
          }
        }else{
          echo "EY NO HAY URL";
        }
        

        //FOOTER
        include "../templates/footer.php";
       ?>

    </div>


  
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
</body>
</html>
