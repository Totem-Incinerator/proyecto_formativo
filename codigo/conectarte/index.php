<?php

  require_once('conexion/conexion.php');
  


    class Index extends Conexion {
      function __construct(){
        $this->db = parent::__construct();
      }
    
      function verCursos(){
        $rows2 = null;
        $table2 = $this->db->prepare("SELECT DISTINCT nombre_categoria, id_curso, nombre_curso, descripcion FROM categoria, curso WHERE categoria_id = id_categoria");
        
        $table2->execute();

        while ($result = $table2->fetch(PDO::FETCH_ASSOC)) {
            $rows2[] = $result;
        }
        return $rows2;
      }
    }


    //$id = $_GET['Id'];
    //print_r($id);
    $objMayor = new Index();
    $verCursos = $objMayor->verCursos();
    

    

?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <title>Conectarte</title>

    <meta charset="utf-8">
    <meta name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="icono">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="assets/css/botoness.css">
    
    <!--<link  rel="stylesheet" href="assets/b5/css/bootstrap.min.css ">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    

    <!-- Plugins -->
  </head>

  <body>

    <nav class="navbar navbar-light bg-white  navbar-expand-md ">
      <div class="container logotipo">
        <div class="col-3 pl-md-0 text-left">
          <?php 
      include("imagenperfil/conexion.php");
      $query= "SELECT * FROM imagen Where nombre='logo'";

      $resultado=$conexion->query($query);
          // print_r($resultado);
      while($row =$resultado->fetch_assoc()){
        
      
          //print_r($row);

        ?>
        <tr> 
            <td>  <img  src="data:image/jpg;base64, <?php echo base64_encode($row['Imagen']);?>" height="100px">
            </td>
         
          
        </tr>
        <?php
        
      }
    ?>
          
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
          data-target=".navbar-collapse-2" aria-controls="navbarNav7"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse navbar-collapse-2 justify-content-center col-md-6"
          id="navbarNav7">
          <ul class="navbar-nav justify-content-center">
            <li class="nav-item active">
              <a class="nav-link texto-morado" href="#" style="font-size: 39px; color: var(--second-color)">Inicio<span
                  class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link texto_morado" href="#nosotros" style="font-size: 39px; color: var(--second-color)">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link texto-morado" href="#contactos" style="font-size: 39px; color: var(--second-color)">Contacto</a>
            </li>
          </ul>
        </div>
  
      </div>
    </nav>

  

    
    <section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark" 
      style="min-height: 100vh; background-size: cover; background-image: url(' assets/images/content/fondo.jpg'); ">

      
       
      <div class="container ">
        <div class="row align-items-center d-flex justify-content-between">
          <div class="col-12 col-md-6 pb-5 order-2 order-sm-2 ">
            <h1 class="   fw-bold mb-3 mt-5 display-3"style="font-size: 100px; color: var(--white)" >Conectarte</h1>
            <p class="lead text-white">“Aún estando solos nuestros adultos mayores, han encontrado la forma de no estarlo, juntos y unidos con CONECTARTE" :)</p>
              <div class=" d-flex mt-3 mb-1">
              <a class="btn btn-primary btn-raised text-uppercase btn-lg  mt-md-3 pd-4 btn-outline-dark ms-md-2 ,l-5"  style=" border: 1px solid #ccc; color: var(--white);font-size: 35px; background-color: var(--none) " 
                href="usuario-admin/vista/login.php" role="button"  >Iniciar sesion</a>
<br>
                <a class="btn btn-primary btn-raised text-uppercase btn-lg  mt-md-3 pd-4 btn-outline-dark ms-md-2 ml-5"  style=" font-size: 35px; background-color: var(--first-color); border: 1px solid var(--first)" 
              
                href="usuario-admin/vista/registro.php" role="button"  > Registrarse </a>
            </div>
          </div>
          <div class="col-12 col-md-6 order-sm-1 order-md-2  ">
            
          </div>
        </div>
      </div>
    </section>
    <!--- TEMAS -->
    <section class="container d-flex flex-wrap pb-5 col-md-10">

                <div class="container pt-3">
                    <h1 class="text-center font-weight-bold" style="font-size: 97px;">Cursos</h1>
                </div>
                <?php
                    if($verCursos != null){
                        foreach($verCursos as $key){
                ?>  
            
                    <div class="container col-md-6 mt-3">
                            <div class="small-box" style="background-color: var(--second-color)">
                                <div class="inner">
                                    <h3 style="color: var(--light)"><?= $key['nombre_curso']; ?></h3>
                                    <p style="color: var(--light)"><?= $key['descripcion']; ?></p>
                                    <p style="color: var(--light)">Categoria: <?= ucfirst(str_replace("_", " ", $key["nombre_categoria"]));?></p>
                                </div>
                                <div class="icon">
                                    <i></i>
                                </div>
                                <div class="icheck-primary small-box-footer ">
                                        
                                        <input type="hidden" name="id_usuario" value="<?= $id_usuario; ?>">
                                        <input type="hidden" name="estado" value="<?= $estado = "en_curso"; ?>">
                                        <a  href="usuario-admin/vista/registro.php" style="font-size: 39px; color: var(--light)"  class="small-box-footer">Registrarse </a>
                                       
                                </div>
                                
                            </div>

                        </div>
                <?php
                        }
                    }
                ?>
                  
            </section>




    <!--- NOSOTROS -->

    <section class="bg-white text-dark pt-5 pb-5">
      <div class="container">
        <div class="row text-center">
          <div class="col">
            <h3 class="mb-4 fw-bold display-4" style="color: var(--second-color);" id="nosotros">Nosotros</h3>
          </div>
        </div>
        <div class="row text-center mt-md-5">
          <div class="col-md-3 mb-5 col-12">
              <?php 
      include("imagenperfil/conexion.php");
      $query= "SELECT * FROM imagen Where nombre='jonathan'";

      $resultado=$conexion->query($query);
          // print_r($resultado);
      while($row =$resultado->fetch_assoc()){
        
      
          //print_r($row);

        ?>
        
              <img style="max-width:80%" class="img-fluid mb-4 mt-3 rounded-circle img-rised" src="data:image/jpg;base64, <?php echo base64_encode($row['Imagen']);?>" >
            
         
          
        
        <?php
        
      }
    ?>
            <h3 class="texto-morado"><strong>Jhonatan Ceron</strong></h3>
            <p>Backend (php) - Frontend (HTML, CSS y Js)</p>
            <p class="fst-italic">Comienza donde estás, usa lo que tienes, haz lo que puedes (Arthur Ashe).</p>
      <!-- <div class="mb-1 mt-2 me-3 align-self-center pt-3 d-block">
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-twitter fa-md text-primary"
                  aria-hidden="true"></i>
              </a>
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-facebook fa-md  text-primary"
                  aria-hidden="true"></i>
              </a>
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-linkedin fa-md color text-primary"
                  aria-hidden="true"></i>
              </a>
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-google-plus fa-md  text-primary"
                  aria-hidden="true"></i>
              </a>
            </div> -->
          </div>
          <div class="col-md-3 mb-5 col-12">
            <?php 
      include("imagenperfil/conexion.php");
      $query= "SELECT * FROM imagen Where nombre='jean'";

      $resultado=$conexion->query($query);
          // print_r($resultado);
      while($row =$resultado->fetch_assoc()){
        
      
          //print_r($row);

        ?>
        
              <img style="max-width:80%" class="img-fluid mb-4 mt-3 rounded-circle img-rised" src="data:image/jpg;base64, <?php echo base64_encode($row['Imagen']);?>" >
            
         
          
        
        <?php
        
      }
    ?>
            <h3 class="texto-morado"><strong>Jean Martinez</strong></h3>
            <p>Frontend</p>
            <p class="fst-italic">Una persona que nunca cometió un error nunca intentó nada nuevo (Albert Einstein).</p>
            <!-- <div class="mb-1 mt-2 me-3 align-self-center pt-3 d-block">
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-twitter fa-md text-primary"
                  aria-hidden="true"></i>
              </a>
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-facebook fa-md  text-primary "
                  aria-hidden="true"></i>
              </a>
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-linkedin fa-md  text-primary"
                  aria-hidden="true"></i>
              </a>
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-google-plus fa-md  text-primary"
                  aria-hidden="true"></i>
              </a>
            </div> -->
          </div>
          <div class="col-md-3 mb-5 col-12">
            <?php 
      include("imagenperfil/conexion.php");
      $query= "SELECT * FROM imagen Where nombre='valentina'";

      $resultado=$conexion->query($query);
          // print_r($resultado);
      while($row =$resultado->fetch_assoc()){
        
      
          //print_r($row);

        ?>
        
              <img style="max-width:80%" class="img-fluid mb-4 mt-3 rounded-circle img-rised" src="data:image/jpg;base64, <?php echo base64_encode($row['Imagen']);?>" >
            
         
          
        
        <?php
        
      }
    ?>
            <h3 class="texto-morado"><strong>Valentina Camayo</strong></h3>
            <p>Analista</p>
            <p class="fst-italic"> Si haces lo que siempre has hecho, llegarás donde siempre has llegado (Tony Robbins).</p>
            <!-- <div class="mb-1 mt-2 me-3 align-self-center pt-3 d-block">
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-twitter fa-md text-primary"
                  aria-hidden="true"></i>
              </a>
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-facebook fa-md  text-primary"
                  aria-hidden="true"></i>
              </a>
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-linkedin fa-md  text-primary"
                  aria-hidden="true"></i>
              </a>
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-google-plus fa-md  text-primary"
                  aria-hidden="true"></i>
              </a>
            </div> -->
          </div>
          <div class="col-md-3 mb-5 col-12">
            <?php 
      include("imagenperfil/conexion.php");
      $query= "SELECT * FROM imagen Where nombre='Arley'";

      $resultado=$conexion->query($query);
          // print_r($resultado);
      while($row =$resultado->fetch_assoc()){
        
      
          //print_r($row);

        ?>
        
              <img style="max-width:80%" class="img-fluid mb-4 mt-3 rounded-circle img-rised" src="data:image/jpg;base64, <?php echo base64_encode($row['Imagen']);?>" >
            
         
          
        
        <?php
        
      }
    ?>
            <h3 class="texto-morado"><strong>Arley Anacona</strong></h3>
            <p>Backend (php) - Frontend (HTML, CSS y Js)</p>
            <p class="fst-italic">Cuando tienes un sueño, tienes que agarrarlo y nunca dejarlo ir (Carol Burnett).</p>
            <!-- <div class="mb-1 mt-2 me-3 align-self-center pt-3 d-block">
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-twitter fa-md text-primary"
                  aria-hidden="true"></i>
              </a>
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-facebook fa-md  text-primary"
                  aria-hidden="true"></i>
              </a>
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-linkedin fa-md  text-primary"
                  aria-hidden="true"></i>
              </a>
              <a href="#" role="button" class="  p-1 m-2">
                <i class="fab fa-google-plus fa-md  text-primary"
                  aria-hidden="true"></i>
              </a>
            </div> -->
          </div>
        </div>
      </div>
    </section>

    <!--- FORMULARIO CONTACTO -->

    <section class="pt-3 pb-3" styl="" id="contactos">
      <grammarly-extension data-grammarly-shadow-root="true"
        style="position: absolute; top: 0px; left: 0px; pointer-events: none;"
        class="cGcvT"></grammarly-extension>
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="">
              <div class="row text-center justify-content-center">
          
              </div>

              <div class="row justify-content-center pt-4 div border" >
              <div class="col-12 col-md-9 col-lg-7">
              
                  <p class="col text-center" style="font-size: 60px; color: var(--first-color)">Comentarios</p>
                </div>
                <div class="col-12 col-md-8 " >
                  
                  <form action="addcomentarios.php" method="POST">
                    <div class="row g-3">
                      <div class="col-12 col-md">
                        <input type="text" class="form-control" name="nombre" style="font-size: 40px; width: 300px; height:50px;"
                          placeholder="Nombre">
                      </div>
                      <div class="col-12 col-md mt-4 mt-md-0">
                        <input type="email" name="correo" class="form-control" style="font-size: 40px; width: 390px; height:50px;"
                          placeholder="Correo">
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col">
                        <input type="text" class="form-control" name="asunto" style="font-size: 40px; width: 750px; height:90px;"
                          placeholder="Asunto">
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col">
                        <textarea class="form-control border-secondary"name="sugerencia" style="font-size: 40px; width: 750px; height:90px;"
                          name="message" rows="3" placeholder="Escribe tu sugerencia"
                          spellcheck="false"></textarea>
                      </div>
                    </div>
                    <div class="row mt-4 mb-4">
                      <div class="col text-center">
                        <button type="" class="btn btn-primary px-3" name="btnInsertar">Enviar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--- FOOTER -->
    <section class="">
      <footer class="pt-4 pb-4  bg-dark text-light">
        <div class="container">
          <div class="row text-center align-items-center">
            <div class="col">
              <ul class="nav justify-content-center ">
                <li class="nav-item ">
                  <a class="nav-link active " href="#">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active " href="#">Facebook</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active " href="#">YouTube</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#">Terminos y condiciones</a>
                </li>
              </ul>
              <p class="text-h5 mt-4">© 2020-2021 Conectarte</p>
            </div>
          </div>
        </div>
      </footer>
    </section>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy"
      crossorigin="anonymous"></script>
  </body>
</html>