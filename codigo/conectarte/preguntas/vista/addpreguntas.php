<?php
require_once("../modelo/preguntas.php");


$ModeloPreguntas = new Preguntas();
$ver_evaluacion = $ModeloPreguntas->verEvaluacion();
?>


<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Conectarte | Inici</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../assets/css/botoness.css">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">

                                     
      


<!-- Button trigger modal -->


<!-- Modal -->

      
  <div class="container-sm ">
         <div class="card card-primary">
          
              <form action="../controlador/addpreguntas.php" method="POST">
                <div class="card-body">
              
                  
                <div class="form-group">
                    <select name="tipo_pregunta" class="form-group" name="tipo_pregunta">
                
                <option class="form-control">Seleccione el tipo de pregunta</option>
                <option value="select_multi">select_multi</option>
                <option value="falso_verdadero">falso_verdadero</option>
                <option value="abierta">abierta</option>

              </select>
                  </div>


                  <div class="form-group">
                    <label for="">Texto pregunta</label>
                    <input type="text" class="form-control" placeholder="Texto Pregunta" name="texto_pregunta">
                  </div>

                  <div class="form-group">
                    <label for="">Respuesta 1</label>
                    <input type="text" class="form-control" placeholder="item1" name="item1">
                  </div>

                  <div class="form-group">
                    <label for="">Respuesta 2</label>
                    <input type="text" class="form-control" placeholder="item2" name="item2">
                  </div>

                  <div class="form-group">
                    <label for="">Respuesta 3</label>
                    <input type="text" class="form-control" placeholder="item3" name="item3">
                  </div>

                  <div class="form-group">
                    <label for="">Respuesta 4</label>
                    <input type="text" class="form-control" placeholder="item4" name="item4">
                  </div>
                  
                  <div class="form-group">
                    <label for="">Retroalimentacion correcta</label>
                    <input type="text" class="form-control" placeholder="retroalimentacion correcta" name="retroalimentacion_correcta">
                  </div>

                  <div class="form-group">
                    <label for="">Retroalimentacion incorrecta</label>
                    <input type="text" class="form-control" placeholder="Retroalimentacion incorrecta" name="retroalimentacion_negativa">
                  </div>


                  <div class="form-group">
                    <label for="">Respuesta correcta</label>
                    <input type="text" class="form-control" placeholder="Texto pregunta" name="rta_correcta">
                  </div>

                  
                     <div class="form-group">
                        <label>Seleccionar id evaluacion</label>
                       
                    <select name='evaluacion_id' class="form-control mt-7">
                    
                    <option label="" >Seleccione el curso id</option>
                    <?php
                    print_r($ver_evaluacion);
                        
                    if($ver_evaluacion!= null){
                        foreach ($ver_evaluacion as $evaluacion) {
                    ?>
                        <option value="<?= $evaluacion['id_evaluacion'] ?>" ><?= strtoupper(str_replace("_", " ", $evaluacion['descripcion']))?></option>
                    <?php 
                        }
                    }
                    ?>


                </select>
              </div>
                    
                 
                  
            </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="" class="btn btn_agregar" name="btnInsertar">Insertar</button>
                  <button type="submit" name="btnCancelar" class="btn btn_editar">Cancelar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

    
     </div>   
        
          














    


  
<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../..7assets/dist/js/demo.js"></script>
</body>
</html>