<?php

// Procesar los datos del formulario
$nombre = $_GET["nombre"];
$edad = $_GET["edad"];

// Generar una respuesta
$respuesta = "Formulario recibido. Nombre: $nombre, Edad: $edad";

// Devolver la respuesta en formato JSON
echo json_encode(array(
  "respuesta" => $respuesta,
));

?>
