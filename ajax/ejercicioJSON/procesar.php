<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la comunidad autónoma seleccionada
    $comunidad = $_POST["comunidad"];

    // Array con información de las comunidades autónomas
    $comunidades = array(
        "Andalucia" => array("provincias" => 8, "extension" => "87,268 km²", "clima" => "Mediterráneo"),
        "Extremadura" => array("provincias" => 2, "extension" => "41,634 km²", "clima" => "Mediterráneo continental"),
        "Galicia" => array("provincias" => 4, "extension" => "29,574 km²", "clima" => "Oceánico"),
    );

    // Verificar si la comunidad autónoma existe en el array
    if (array_key_exists($comunidad, $comunidades)) {
        // Obtener datos de la comunidad autónoma seleccionada
        $datos = $comunidades[$comunidad];

        // Enviar JSON como respuesta
        echo json_encode($datos);
    } else {
        // Comunidad autónoma no válida
        echo json_encode(array("error" => "Comunidad autónoma no válida"));
    }
}
?>
