<?php

require_once "connection.php";

$jsondata["data"] = array();

$sql = "SELECT * FROM Vinos";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $jsondata["data"] = $stmt->fetchAll();
} catch (PDOException $e) {
    $jsondata["mensaje"] = "Error al recuperar los datos";
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
$pdo = null;
exit();
