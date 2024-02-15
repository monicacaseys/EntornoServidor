document.addEventListener("DOMContentLoaded", function() {
    var botonObtenerDatos = document.getElementById("mostrar");

    botonObtenerDatos.addEventListener("click", function() {
        var comunidadSeleccionada = document.getElementById("comunidad").value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "procesar.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
           
                if (xhr.status === 200) {
                    var resultado = JSON.parse(xhr.responseText);
                    console.log("Número de provincias: " + resultado.provincias);
                    console.log("Extensión: " + resultado.extension);
                    console.log("Clima: " + resultado.clima);
                } else {
                    console.error("Error en la solicitud");
                }
            
        };

       xhr.send("comunidad="+comunidadSeleccionada,true); // true porque es peticion asincrona
        
    });
});

