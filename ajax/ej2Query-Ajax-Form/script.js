"use strict";

document.addEventListener("DOMContentLoaded",()=>{

    var enviar = document.querySelector('button');
    console.log(enviar);
    

    enviar.addEventListener("click", function(){enviar(e)} );

});

function enviar(e){

    e.preventDefault(); // no previene bien el evento
    var nombre= document.getElementById(".nombre").value;
    var edad= document.getElementById(".edad").value;

    var datos = {
        nombre : nombre,
        edad: edad
    }
    $.ajax({
        type: "GET",
        url: "procesar_formulario.php",
        data: JSON.parse(datos),
        
        success: function(respuesta){
            console.log(respuesta )
            mostarMensaje(respuesta);
        },
        error: function(){
            console.log("error");
        }
    })
}
function mostarMensaje(respuesta){
    var parsear= JSON.parse(respuesta);
    Swal.fire({
        icon:"warning",
        title: "tu madre",
        text: parsear
    })
}