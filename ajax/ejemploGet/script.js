"use strict";

document.addEventListener("DOMContentLoaded", ()=>{

var mostrar = document.getElementById("boton");

mostrar.addEventListener("click", function(){ iniciarSesion()} );
});

function iniciarSesion() {
    var nombre = document.getElementById("nombre").value;
    var password = document.getElementById("pswd").value;
    console.log(nombre);
    //objeto xml
    var xhr = new XMLHttpRequest();
    //abrir petidion
    
    //comprobar estado
    xhr.onreadystatechange  = function (){
        if (xhr.readyState == 4 && xhr.status == 200){
       console.log(xhr.responseText);
        }
    };
    xhr.open("GET","admin.php?nombre="+ nombre +"&pswd="+password, true);
    xhr.send();
  }









   /*  if(xmlHttp!=undefined){
        document.querySelector("#boton").addEventListener("click",mostrarMensaje());
    }else{
        alert("el navegador no soporta Ajax. Actualiza")
    }
})


var user;
var password;
    $("#boton").click(function(){
        user = $("#nombre").val();
        password = $("#pswd").val();
    })

    
const mostrarMensaje=()=>{
    xmlHttp.onreadystatechange = () =>{
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200){
            console.log(xmlHttp.responseText)
        }
    }
    xmlHttp.open("GET", `admin.php?nombre=${user}$pswd=${password}`,true);
    xmlHttp.send();
 */

