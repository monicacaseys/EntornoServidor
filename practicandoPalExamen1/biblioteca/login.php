<?php
session_start();

// Definir un usuario y contraseña válidos (solo para propósitos de ejemplo)
$usuarioValido = "usuario";
$contrasenaValida = "contraseña";

// Verificar si el usuario ya está logueado
if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Verificar si se envió el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Validación simple de campos (puedes mejorar esto según tus necesidades)
    if ($usuario == $usuarioValido && $contrasena == $contrasenaValida) {
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
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
<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>
<h2>login</h2>

<form method="post" action="">
    <label for="usuario">Usuario:</label>
    <input type="text" name ="usuario" required><br>

    <label for = "contrasena">Contraseña: </label>
    <input type="text" name ="contrasena" required><br>

    <input type = "submit" value="Iniciar Sesion">
</form>
    
</body>
</html>
