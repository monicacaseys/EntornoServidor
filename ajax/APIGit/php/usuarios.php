<?php
require_once "connection.php";

// Función para obtener todos los usuarios
function getAllUsuarios($pdo) {
    // Mensaje de depuración antes de ejecutar la consulta SQL
   // echo "Ejecutando consulta SQL para obtener todos los usuarios...";

    $sql = "SELECT nombre, apellido, ciudad FROM usuarios";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mensaje de depuración después de ejecutar la consulta SQL
   // echo "Consulta SQL ejecutada correctamente.";

    // Puedes usar var_dump para imprimir los resultados y verificar qué datos se están recuperando
   // var_dump($usuarios);

    return $usuarios;
}

// Verificar si se solicitan todos los usuarios
if (isset($_GET['allUsuarios']) && $_GET['allUsuarios'] === 'true') {
    $allUsuarios = getAllUsuarios($pdo);
    header('Content-Type: application/json');
    echo json_encode($allUsuarios);
    exit(); // Terminar la ejecución después de enviar la respuesta JSON
}

?>
