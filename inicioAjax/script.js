function cargarPersonas(sexo) {
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                document.getElementById("resultado").innerHTML = xhr.responseText;
            } else {
                console.error("Error en la solicitud: " + xhr.status);
            }
        }
    };
    
    xhr.open("POST", "obtener_personas.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("sexo=" + sexo);
}
