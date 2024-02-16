<?php

require_once "connection.php";

// Obtener el código del vino a eliminar
$codigo = htmlspecialchars($_GET['codigo']);

// Preparar la consulta para eliminar el vino
$sql = "DELETE FROM Vinos WHERE codigo = :codigo";

try {
    // Preparar la sentencia
    $stmt = $pdo->prepare($sql);

    // Asignar parámetro
    $stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);

    // Ejecutar la consulta
    $stmt->execute();

    // Enviar respuesta al cliente
    $jsondata["mensaje"] = "Vino eliminado con éxito";
    echo json_encode($jsondata);

} catch (PDOException $e) {
    // Enviar mensaje de error al cliente
    $jsondata["mensaje"] = "Error al eliminar el vino";
    echo json_encode($jsondata);
}

// Cerrar la conexión
$pdo = null;
exit();

