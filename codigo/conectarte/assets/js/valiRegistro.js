document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('registro', validarFormulario);
});

function validarFormulario(evento){
    evento.preventDefault();

    //validar nombre
    var nombre = document.getElementById('nombre').value;
    if (nombre.length === 0) {
        alert('No has escrito un nombre');
        return;
    }

    //validar apellido
    var apellido = document.getElementById('apellido').value;
    if (apellido.length === 0) {
        alert('No has escrito un apellido');
        return;
    }

    var edad = document.getElementById('edad').value;
    if (edad.length === 0) {
        alert('No has escrito una edad');
        return;
    }

    var email = document.getElementById('email').value;
    if (email.length === 0) {
        alert('No has ingresado un email');
        return;
    }
    var contrasena = document.getElementById('contrasena').value;
    if (contrasena.length === 0) {
        alert('No has ingresado una contraseña');
        return;
    }

    var edad = document.getElementById('edad').value;
    if (edad.length === 0) {
        alert('No has escrito una edad');
        return;
    }
    this.registro();
}