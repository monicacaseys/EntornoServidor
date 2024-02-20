"use strict";
$(document).ready(function() {
    $('#boton').click(function() {
        // Obtener los datos del formulario
        var nombre = $('#nombre').val();
        var pswd = $('#pswd').val();

        // Hacer la petición GET al archivo PHP
        $.getJSON('admin.php', { nombre: nombre, pswd: pswd })
            .done(function(response) {
                // Mostrar la respuesta en un SweetAlert
                swal("Respuesta del servidor", response, "success");
            })
            .fail(function(textStatus, error) {
                // En caso de error, mostrar el mensaje de error en un SweetAlert
                swal("Error en la petición", textStatus + ': ' + error, "error");
            });
    });
});


/* 

document.addEventListener("DOMContentLoaded", ()=> {
    var mostrar = document.getElementById("boton");
    mostrar.addEventListener("click", function() {
        iniciarSesion();
    });
});

function iniciarSesion() {
    var nombre = document.getElementById("nombre").value;
    var password = document.getElementById("pswd").value;

    // Crear objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configurar la función de callback para manejar la respuesta del servidor
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // Mostrar la respuesta en un SweetAlert
                swal("Respuesta del servidor", xhr.responseText, "success");
            } else {
                // En caso de error, mostrar el mensaje de error en un SweetAlert
                swal("Error en la petición", "Error al enviar la solicitud al servidor.", "error");
            }
        }
    };

    // Enviar la solicitud al servidor
    xhr.open("GET", "admin.php?nombre=" + nombre + "&pswd=" + password, true);
    xhr.send();
}
 */