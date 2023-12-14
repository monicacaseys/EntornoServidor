<?php
include "bromas.php";
// Función para simular el lanzamiento de un dado
function lanzarDado()
{
    return rand(1, 6); 
}

// Iniciar o reanudar la sesión
session_start();

// Manejar el formulario de ingreso de nombre
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_nombre'])) {
        $_SESSION['nombre'] = $_POST['nombre'];
    }

    if (isset($_POST['opcion'])) {
        // Verificar que el usuario 
        if (isset($_SESSION['nombre'])) {
            $nombre = $_SESSION['nombre'];

            $opcion = $_POST['opcion'];

            switch ($opcion) {
                case 'adivinanzas':
                    require_once('juegoAdivinanza.php');
                    break;
                case 'dados':
                    $dadosGuybrush = lanzarDado();
                    $dadosMonkey = lanzarDado();

                    //resultado del juego
                    if ($dadosGuybrush > $dadosMonkey) {
                        $resultado = 'Ganaste';
                    } elseif ($dadosGuybrush < $dadosMonkey) {
                        $resultado = 'Perdiste';
                    } else {
                        $resultado = 'Empate';
                    }

                    // Mostrar el resultado
                    echo '<p>"Guybrush: ¡Lancé un dado y saqué ' . $dadosGuybrush . '! TuNombre lanzó un dado y sacó ' . $dadosMonkey . '."</p>';
                    echo '<p>"Guybrush: ' . $resultado . ' en el juego de dados. ¡Esa suerte de pirata!"</p>';

                    break;
                case 'bos':
                    
    $conexion_db = new conectar_db();

    // Obtener dos bromas aleatorias
    $bromaUsuario = $conexion_db->obtenerBromaAleatoria();
    $bromaGuybrush = $conexion_db->obtenerBromaAleatoria();

 
    $conexion_db->cerrarConexion();

    // Mostrar las bromas en pantalla
    echo '<p>"' . $nombre . ': ' . $bromaUsuario['contenido'] . '."</p>';
    echo '<p>"Guybrush: ' . $bromaGuybrush['contenido'] . '."</p>';

    // Comparar las puntuaciones y determinar el ganador
    if ($bromaUsuario['puntuacion'] > $bromaGuybrush['puntuacion']) {
        $resultado = 'Ganaste';
    } elseif ($bromaUsuario['puntuacion'] < $bromaGuybrush['puntuacion']) {
        $resultado = 'Perdiste';
    } else {
        $resultado = 'Empate';
    }

    // Mostrar el resultado
    echo '<p>"Guybrush: ' . $resultado . ' en la pelea de bromas. ¡Esa lengua afilada!"</p>';
    break;
                    break;
                case 'decirnos':
                    echo "ha sido un placer hasta luego";
                    exit();
                    break;
                default:
                   
                    break;
            }
        } else {
            
            header('Location: login.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monkey Island</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <h2>Monkey Island</h2>

    <?php
    // Mostrar la conversación con el usuario si se ha ingresado un nombre
    if (isset($_SESSION['nombre'])) {
        echo '<p>"Guybrush: Hola como te llamas?"</p>';
        echo '<p>"' . $_SESSION['nombre'] . ': ¡Hola! Me llamo ' . $_SESSION['nombre'] . ' y soy quien manda en este lugar"</p>';
        echo '<p>"Guybrush: Gou es un placer conocerte"</p>';
        echo '<p>"' . $_SESSION['nombre'] . ': Igualmente que te trae por aqui?"</p>';
    }
    ?>

    <!-- Formulario con campo de ingreso de nombre y botones para las opciones -->
    <form method="post" action="" id="formMonkeyIsland">
        <?php if (!isset($_SESSION['nombre'])) : ?>
            <label for="nombre">Ingresa tu nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
            <input type="submit" name="submit_nombre" value="Guardar">
        <?php endif; ?>

        <button type="submit" name="opcion" value="adivinanzas">Quiero ser pirata</button>
        <button type="submit" name="opcion" value="dados">Quiero pelear</button>
        <button type="submit" name="opcion" value="bos">Pelea de bromas</button>
        <button type="submit" name="opcion" value="decirnos">Despedir</button>

        <!-- Agregar un campo oculto para indicar que se quiere pelear -->
        <input type="hidden" name="quiere_pelear" value="1">
    </form>
</body>
</html>
