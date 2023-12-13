<?php
session_start();
require_once('preguntas.php');

// Verificar si el usuario ya está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Obtener preguntas y respuestas
$preguntas = obtenerPreguntas();
$numPreguntas = count($preguntas);

// Verificar si se envió el formulario de respuestas
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["respuestas"])) { //el segindo isset verificar si $_POST["respuestas"] está definido antes de intentar contarlo.
    $respuestasUsuario = $_POST["respuestas"];

    // Validación simple de respuestas (ademas de comprobar que despuestas es un array)
    if (is_array($respuestasUsuario) && count($respuestasUsuario) === $numPreguntas) {
        // Calcular puntaje
        $puntaje = 0;
        for ($i = 0; $i < $numPreguntas; $i++) {
            if ($respuestasUsuario[$i] == $preguntas[$i]['respuesta']) {
                $puntaje++;
            }
        }

        // Guardar el puntaje en la sesión
        $_SESSION['puntaje'] = $puntaje;

        header("Location: resultado.php");
        exit();
    } else {
        $error = "Debes responder todas las preguntas.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Trivia</title>
</head>
<body>

<h2>Bienvenido al Juego de Trivia</h2>

<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="post" action="">
    <?php foreach ($preguntas as $indice => $pregunta): ?>
        <p><?php echo $pregunta['enunciado']; ?></p>
        <?php foreach ($pregunta['opciones'] as $opcion): ?>
            <label>
                <input type="radio" name="respuestas[<?php echo $indice; ?>]" value="<?php echo $opcion; ?>" required>
                <?php echo $opcion; ?>
            </label><br>
        <?php endforeach; ?>
        <br>
    <?php endforeach; ?>

    <input type="submit" value="Enviar Respuestas">
</form>

<a href="resultado.php">Ver Resultado</a>

</body>
</html>
