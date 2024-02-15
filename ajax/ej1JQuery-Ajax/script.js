"use strict";

document.addEventListener("DOMContentLoaded",()=>{

    var mostrar = document.getElementById("buscar");

mostrar.addEventListener("click", function(){ buscar()} );


});

function buscar (){
    var term= document.getElementById("searchTerm").value;
    $.ajax({
        type: "GET",
        url: "buscar.php",
        data: {term: term},
        
        success: function(respuesta){
            mostarMensaje(respuesta);
        },
        error: function(){
            console.log("error");
        }
    })
}

function mostarMensaje(respuesta){
    var parsear= JSON.parse(respuesta);
    document.getElementById("searchResults").innerHTML=parsear.toString();
}
