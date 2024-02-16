
"use strict";


$(document).ready(function(){


    $("#first, #all").on("click", mostrar);
    $("#crearPerro").on("click", abrirModalCrearPerro);


});


function mostrar(){


    var datos = {
        perro : ""
    }


    if($(this).attr("id")=="first"){
        datos.perro="111A"
    }


    $.ajax({
        url: "php/mostrar.php",
        type: "GET",
        data: datos
    })


    .done(function(responseText){
        $("tbody").empty();


        $(responseText.data).each((ind,ele)=>{
            $("tbody").append(`<tr><td>${ele.chip}</td><td>${ele.nombre}</td><td>${ele.raza}</td><td>${ele.fechaNac}</td>
            <td><button class="btn btn-danger btn-sjm" onclick="eliminarPerro('${ele.chip}')">Eliminar </button></td></tr>
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


$("#nuevaFechaNac").datepicker();


function abrirModalCrearPerro(){


    $("#modalCrearPerro").dialog({
        modal:true,
        width: 400,
        buttons: {
            "Guardar": function(){
                CrearPerro();
                $(this).dialog("close");
            },
            "Cancelar": function(){
                $(this).dialog("close");
            }
        }
    })
}


function CrearPerro(){
    var nuevoPerro={
        chip: $("#nuevoChip").val(),
        nombre: $("#nuevoNombre").val(),
        raza: $("#nuevaRaza").val(),
        fechaNac: formatearFecha($("#nuevaFechaNac").val())
    }




$.ajax({
    url:"php/crear.php",
    type: "POST",
    data: nuevoPerro
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


function formatearFecha(fecha){
    return moment(fecha, 'MM/DD/YYYY').format('YYYY-MM-DD');
}  
}


function eliminarPerro(chip){
    Swal.fire({
        title: "¿Estas seguro?",
        text: "Esto eliminara al perro",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3056d6",
        confirmButtonText: "Si eliminar"
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                url: "php/eliminar.php",
                type: "POST",
                data: {chip: chip}
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







