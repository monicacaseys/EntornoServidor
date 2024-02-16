<?php

require_once "connection.php";

// Obtener el chip del perro a eliminar
$chip = htmlspecialchars($_POST['chip']);

// Consulta para eliminar el perro
$sql = "DELETE FROM perros WHERE chip = :chip";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':chip', $chip, PDO::PARAM_STR);

    // Ejecutar la consulta
    $stmt->execute();

    $jsondata["mensaje"] = "Perro eliminado con éxito";
} catch (PDOException $e) {
    $jsondata["mensaje"] = "Error al eliminar el perro";
}

// Cerrar la conexión y enviar la respuesta JSON
$pdo = null;
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
exit();
