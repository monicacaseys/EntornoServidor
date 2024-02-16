<?php

$host = '127.0.0.1'; // Reemplazar con el nombre de tu host de MySQL
$dbname = 'Vinoteca'; // Nombre de tu base de datos
$username = 'root'; // Tu nombre de usuario de MySQL
$password = ''; // Tu contraseña de MySQL
$charset = 'utf8';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

?>
