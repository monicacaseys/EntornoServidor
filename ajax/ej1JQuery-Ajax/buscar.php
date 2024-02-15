<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $searchTerm = $_GET["term"];
   
    // Simulación de búsqueda en una lista ficticia
    $dataList = ["Verde", "Amarillo", "Rojo", "Azul"];

    // Filtrar resultados que coincidan con el término de búsqueda
    $filteredResults = array_filter($dataList, function ($item) use ($searchTerm) {
        return stripos($item, $searchTerm) !== false;
    });

    // Devolver resultados en formato JSON
    echo json_encode($filteredResults);
} else {
    // Si la solicitud no es de tipo GET, devolver un mensaje de error
    header("HTTP/1.1 405 Method Not Allowed");
    echo "Método no permitido";
}
?>
