<?php
// Ejercicio 3: Gestión de Sesiones y Usuarios
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}

// Conexión a la base de datos
$servername = "localhost";
$username = "usuario";
$password = "contraseña";
$dbname = "nombre_base_de_datos";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener información del usuario actual
$usuario_id = $_SESSION["usuario_id"];
$sql = "SELECT id, nombre, email FROM usuarios WHERE id = $usuario_id";
$result = $conn->query($sql);

// Muestra los detalles del usuario
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Bienvenido, " . $row["nombre"] . "!<br>";
    echo "Detalles del Usuario:<br>";
    echo "ID: " . $row["id"] . "<br>";
    echo "Nombre: " . $row["nombre"] . "<br>";
    echo "Email: " . $row["email"] . "<br>";
} else {
    echo "Usuario no encontrado.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
