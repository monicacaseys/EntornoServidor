<?php
session_start();

/* // Definir un usuario y contraseña válidos (solo para propósitos de ejemplo)
$usuarioValido = "usuario";
$contrasenaValida = "contraseña"; */

// Verificar si el usuario ya está logueado
if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Verificar si se envió el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $_SESSION['usuario'] = $usuario;
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>login</h2>

<form method="post" action="">
    <label for="usuario">¿Como te llamas?</label>
    <input type="text" name ="usuario" required><br>

    <input type = "submit" value="Iniciar Sesion">
</form>
    
</body>
</html>