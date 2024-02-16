<?php

require_once "connection.php";

// Obtener datos del nuevo perro
$chip = htmlspecialchars($_POST['chip']);
$nombre = htmlspecialchars($_POST['nombre']);
$raza = htmlspecialchars($_POST['raza']);
$fechaNac = htmlspecialchars($_POST['fechaNac']);

// Consulta para insertar un nuevo perro
$sql = "INSERT INTO perros (chip, nombre, raza, fechaNac) VALUES (:chip, :nombre, :raza, :fechaNac)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':chip', $chip, PDO::PARAM_STR);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':raza', $raza, PDO::PARAM_STR);
    $stmt->bindParam(':fechaNac', $fechaNac, PDO::PARAM_STR);

    // Ejecutar la consulta
    $stmt->execute();

    $jsondata["mensaje"] = "Perro agregado con éxito";
} catch (PDOException $e) {
    $jsondata["mensaje"] = "Error al agregar un nuevo perro";
}

// Cerrar la conexión y enviar la respuesta JSON
$pdo = null;
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
exit();
