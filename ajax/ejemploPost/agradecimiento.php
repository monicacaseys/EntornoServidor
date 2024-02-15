<?php
//recuperar parametros de solicitud
$nombre = $_POST['nombre'];
$mensaje = $_POST['mensaje'];

//crear mensaje
$respueta= "Hola $nombre, Gracias por tu mendaje: $mensaje.";

//enviar respuesta
echo $respueta;