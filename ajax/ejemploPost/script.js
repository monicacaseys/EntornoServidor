"use strict";


document.addEventListener("DOMContentLoaded", function (){

    document.getElementById('enviar').addEventListener("click", hacerPeticion);

})

function hacerPeticion() { 
    let xmlHttp = new XMLHttpRequest();
    var nombre= document.getElementById('nombre').value;
    var mensaje= document.getElementById('mensaje').value;
    xmlHttp.onreadystatechange = function (){
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200){
            
            var respuesta=  xmlHttp.responseText;
            document.getElementById('respuesta').innerHTML=respuesta;
        }
    };

    //configurar solicitud con POST
    xmlHttp.open("POST","agradecimiento.php", true);
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttp.send("nombre=" + nombre + "&mensaje=" + mensaje);


 }
