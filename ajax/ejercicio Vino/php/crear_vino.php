<?php

require_once "connection.php";

// Obtener datos del formulario
$codigo = htmlspecialchars($_POST['codigo']);
$nombre = htmlspecialchars($_POST['nombre']);
$tipo = htmlspecialchars($_POST['tipo']);
$anio = htmlspecialchars($_POST['anio']);
$descripcion = htmlspecialchars($_POST['descripcion']);

// Preparar la consulta para insertar el nuevo vino
$sql = "INSERT INTO Vinos (codigo, nombre, tipo, anio, descripcion) VALUES (:codigo, :nombre, :tipo, :anio, :descripcion)";

try {
    // Preparar la sentencia
    $stmt = $pdo->prepare($sql);

    // Asignar parámetros
    $stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':anio', $anio, PDO::PARAM_INT);
    $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);

    // Ejecutar la consulta
    $stmt->execute();

    // Enviar respuesta al cliente
    $jsondata["mensaje"] = "Vino creado con éxito";
    echo json_encode($jsondata);

} catch (PDOException $e) {
    // Enviar mensaje de error al cliente
    $jsondata["mensaje"] = "Error al crear el vino";
    echo json_encode($jsondata);
}

// Cerrar la conexión
$pdo = null;
exit();
