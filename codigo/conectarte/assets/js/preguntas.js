$(function () {
    

    let puntos = 0

    
    $(document).on('click', '.pregunta-seleccionada', function () {
        let respuestaUsuario = this;
        let textoRta = $(respuestaUsuario).attr('value');
        let nodoPadre = this.parentElement.parentElement;
        let idPregunta = $(nodoPadre).attr('idPregunta');
          
    })


    const h1 = document.querySelector(".punto");
    h1.textContent = "No has respondido la evaluación aún"  

    $('#formulario').bind("submit", function(e) {
        e.preventDefault();
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function(response){
                //console.log(response)
                if (response > 60) {

                    console.log("es mayor a 60");

                    const h1 = document.querySelector(".punto");
                    h1.textContent = `Tus puntos: ${response}`

                    Swal.fire({
                        title: 'Felicidades',
                        text: '¡¡¡Has respondido todo correctamente!!!',
                        icon: 'success',
                        confirmButtonText: '<a class="enlaces" onclick="redireccionar()">Ver puntaje</a>',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false
                    })

                }else{
                    Swal.fire({
                        title: 'Fallaste',
                        text: 'Pero no te preocupes, puedes volver a intentarlo',
                        icon:'error',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        confirmButtonText: '<a class="enlaces" onclick="redireccionar()">Ver puntaje</a>',
                        footer: '<a onclick="recargarPreguntas()">Recargar preguntas</a>'
                    })

                    console.log(response)
                     
                    
                    if (response != null) {
                        console.log(response)
                        h1.textContent = `Tus puntos: ${response}`
                    }
                    

                }
            }
        })
    })

    function redireccionar(){
        windows.location.href = 'http://localhost/conectarte/videos/vista/reproducir.php#nav-contact';
    }

    function recargarPreguntas(){
        location.reload();
    }


    //traer el id del curso para posteriormente traer las preguntas que pertenecen a ese curso
    const id = $(".Idcurso").val();
    

    //peticion ajax para mostrar las preguntas
    $.ajax({
        url: '../controlador/listar_preguntas.php',
        type: 'POST',
        data: {id},
        success: function (response) {
            
            //convertir a json
            let preguntas = JSON.parse(response);
            //console.log(preguntas[0]['texto_pregunta'])
            //template html
            let template = '';

            //recorrido del arreglo de preguntas
            
            let puntero = 1;
            let puntero2 = 1;
            let bandera = 1;
            preguntas.forEach(pregunta => {
                bandera--
                template += ` 
                <div class="card bg-purple" >
                    <div class="card-header">
                        <h1 class="font-weight-bold ">
                            ${pregunta.texto_pregunta}
                        </h1>
                    </div>
                    <div class="card-body">
                        <div id="${pregunta.id_pregunta}" idPregunta="${pregunta.id_pregunta}">
                            <h3 class="fs-5">
                                <input type="hidden" value="${pregunta.id_pregunta}" name="id_pregunta${puntero++}">
                                <input type="radio" required value="${pregunta.item1}" name="p${puntero2-bandera}"  class="pregunta-seleccionada">
                                ${pregunta.item1}
                            </h3>
                            <h3 class="fs-5">
                                <input type="radio" required value="${pregunta.item2}" name="p${puntero2-bandera}" class="pregunta-seleccionada">
                                ${pregunta.item2}
                            </h3>
                            <h3 class="fs-5">
                                <input type="radio" required value="${pregunta.item3}" name="p${puntero2-bandera}"  class="pregunta-seleccionada">
                                ${pregunta.item3}
                            </h3>
                            <h3 class="fs-5">
                                <input type="radio" required value="${pregunta.item4}" name="p${puntero2-bandera}"  class="pregunta-seleccionada">
                                ${pregunta.item4}
                            </h3>
                        </div>
                    </div>
                </div>
                `
            });
                      

            $('#preguntas').html(template);

        }
    })

    
});