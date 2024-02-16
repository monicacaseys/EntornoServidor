"use strict";

$(document).ready(function(){

    $("#mostrarVinos").on("click", mostrar);
    $("#crearPerro").on("click", abrirModalCrearVino);
})

function mostrar(){

    var datos = {
        vino: ""
    }

    $.ajax({
        url: "php/mostrar_vinos.php",
        type: "GET",
        data: datos

    })

    .done(function(responseText){
        $("tbody").empty(); //para borrar si hay elemento0s

        $(responseText.data).each((ind,ele)=>{
            $("tbody").append(`<tr><td>${ele.codigo}</td><td>${ele.nombre}</td><td>${ele.tipo}</td><td>${ele.anio}</td><td>${ele.descripcion}</td>
            <td><button class="btn btn-danger btn-sjm" onclick="eliminarVino('${ele.codigo}')">Eliminar </button></td></tr>
            `);
        })
    })

    .fail(function(responseText, statusText ,xhr){
        console.log(responseText);
        Swal.fire({
            icon:"error",
            title: "Error"+xhr.status,
            text: xhr.statusText
        })
    })

    
}

function abrirModalCrearVino(){


    $("#modalCrearVino").dialog({
        modal:true,
        width: 400,
        buttons: {
            "Guardar": function(){
                CrearVino();
                $(this).dialog("close");
            },
            "Cancelar": function(){
                $(this).dialog("close");
            }
        }
    })
}

function CrearVino(){
    var nuevoVino={
        codigo: $("#nuevoCodigo").val(),
        nombre: $("#nuevoNombre").val(),
        tipo: $("#nuevoTipo").val(),
        anio: $("#nuevoAnio").val(),
        descripcion: $("#nuevaDescripcion").val()

    }

$.ajax({
    url:"php/crear_vino.php",
    type: "POST",
    data: nuevoVino
})
.done(function(responseText){
    mostrar();
})
.fail(function(responseText){
    Swal.fire({
        icon: "error",
        title: "Error"+ xhr.status,
        text: xhr.statusText
    })
})
}


function eliminarVino(codigo){
    Swal.fire({
        title: "¿Estas seguro?",
        text: "Esto eliminara el vino",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3056d6",
        confirmButtonText: "Si eliminar"
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                url: "php/eliminar_vino.php",
                type: "GET", //FIJARSE EN EL PHP QUE METODO TIENE!!!!
                data: {codigo: codigo}
            })
            .done(function(responseText){
                mostrar();
            })
            .fail(function(xhr, textStatus, errorThrown){
                Swal.fire({
                    icon: "error",
                    title: "Error"+ xhr.status,
                    text: xhr.statusText
                })
            })
        }
    })
}
