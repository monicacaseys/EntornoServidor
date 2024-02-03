<?php
//CAMBIAR Conexión a la base de datos 
$host = "localhost";
$usuario = "root";
$clave = "";
$db = "personas";

$conexion = new mysqli($host, $usuario, $clave, $db);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener el valor de 'sexo' enviado por AJAX
$sexo = $_POST['sexo'];

// Consulta SQL basada en la opción seleccionada
if ($sexo == 'hombres' || $sexo == 'mujeres') {
    $sql = "SELECT * FROM listado_personas WHERE sexo = '$sexo'";
} elseif ($sexo == 'todos') {
    $sql = "SELECT * FROM listado_personas";
} else {
    die("Opción no válida");
}

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Imprimir resultados en formato HTML
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " Nombre: " . $row['nombre'] . " Apellidos: " . $row['apellidos'] . "<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

$conexion->close();
?>
