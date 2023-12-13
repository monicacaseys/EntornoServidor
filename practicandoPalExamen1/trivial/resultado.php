<?php

session_start();

//comprobar sesion

if (!isset ($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}


// Obtener el puntaje almacenado en la sesión
$puntaje = isset($_SESSION['puntaje']) ? $_SESSION['puntaje'] : 0;

// Limpiar la sesión
unset($_SESSION['puntaje']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Juego</title>
</head>
<body>

<h2>Resultado del Juego</h2>

<p>Tu puntaje es: <?php echo $puntaje; ?> / 3</p>

<a href="index.php">Volver a Jugar</a>
<a href="logout.php">Cerrar sesión</a>

</body>
</html>