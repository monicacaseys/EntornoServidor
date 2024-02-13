"use strict";
let xmlHttp= new XMLHttpRequest()
document.addEventListener("DOMContentLoaded", ()=>{
    if(xmlHttp!=undefined){
        document.querySelector("#boton").addEventListener("click",mostrarMensaje());
    }else{
        alert("el navegador no soporta Ajax. Actualiza")
    }
})

$(document).ready(function(){

    $("#boton").click(function(){
        var user = $("#nombre").val();
        var password = $("#pswd").val();
    })

});

const mostrarMensaje=()=>{
    xmlHttp.onreadystatechange = () =>{
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200){
            console.log(xmlHttp.responseText)
        }
    }
    xmlHttp.open("GET", `admin.php?nombre=${user}$pswd=${password}`,true);
    xmlHttp.send();
}