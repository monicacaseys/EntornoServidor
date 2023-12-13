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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>

<h2>Iniciar Sesión</h2>

<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" required><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" required><br>

    <input type="submit" value="Iniciar Sesión">
</form>

</body>
</html>
