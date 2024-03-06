<?php
/*
Plugin Name: Generador de Contraseñas
Description: Plugin que permite a los usuarios generar contraseñas seguras desde el panel de administración de WordPress.
Version: 1.0
Author: Tu Nombre
*/

// Función para mostrar la página de generador de contraseñas
function mostrar_pagina_generador_contrasenas() {
    ?>
    <div class="wrap">
        <h1>Generador de Contraseñas</h1>
        <form method="post" action="">
            <label for="longitud">Longitud de la contraseña:</label>
            <input type="number" id="longitud" name="longitud" min="6" max="32" value="12" required>
            <br><br>
            <input type="checkbox" id="numeros" name="numeros" checked>
            <label for="numeros">Incluir números (0-9)</label>
            <br>
            <input type="checkbox" id="mayusculas" name="mayusculas" checked>
            <label for="mayusculas">Incluir letras mayúsculas (A-Z)</label>
            <br>
            <input type="checkbox" id="minusculas" name="minusculas" checked>
            <label for="minusculas">Incluir letras minúsculas (a-z)</label>
            <br>
            <input type="checkbox" id="especiales" name="especiales">
            <label for="especiales">Incluir caracteres especiales (!@#$%^&*)</label>
            <br><br>
            <input type="submit" name="generar" value="Generar Contraseña" class="button button-primary">
        </form>
        <br>
        <?php
        if (isset($_POST['generar'])) {
            $longitud = intval($_POST['longitud']);
            $numeros = isset($_POST['numeros']);
            $mayusculas = isset($_POST['mayusculas']);
            $minusculas = isset($_POST['minusculas']);
            $especiales = isset($_POST['especiales']);
            $contrasena_generada = generar_contrasena($longitud, $numeros, $mayusculas, $minusculas, $especiales);
            echo '<h3>Contraseña Generada:</h3>';
            echo '<p>' . esc_html($contrasena_generada) . '</p>';
        }
        ?>
    </div>
    <?php
}

// Función para generar contraseñas seguras
function generar_contrasena($longitud, $numeros, $mayusculas, $minusculas, $especiales) {
    $caracteres = '';
    if ($numeros) {
        $caracteres .= '0123456789';
    }
    if ($mayusculas) {
        $caracteres .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    if ($minusculas) {
        $caracteres .= 'abcdefghijklmnopqrstuvwxyz';
    }
    if ($especiales) {
        $caracteres .= '!@#$%^&*';
    }
    $contrasena_generada = '';
    $caracteres_longitud = strlen($caracteres);
    for ($i = 0; $i < $longitud; $i++) {
        $indice = rand(0, $caracteres_longitud - 1);
        $contrasena_generada .= $caracteres[$indice];
    }
    return $contrasena_generada;
}

// Función para agregar la página de generador de contraseñas al menú de administración
function agregar_pagina_generador_contrasenas() {
    add_menu_page(
        'Generador de Contraseñas',
        'Generador de Contraseñas',
        'manage_options',
        'generador-contrasenas',
        'mostrar_pagina_generador_contrasenas'
    );
}

// Acción para agregar la página de generador de contraseñas al menú de administración
add_action('admin_menu', 'agregar_pagina_generador_contrasenas');

// Función para activar el plugin
function activar_plugin_generador_contrasenas() {
    // Código para activar el plugin
}
register_activation_hook(__FILE__, 'activar_plugin_generador_contrasenas');

// Función para desactivar el plugin
function desactivar_plugin_generador_contrasenas() {
    // Código para desactivar el plugin
}
register_deactivation_hook(__FILE__, 'desactivar_plugin_generador_contrasenas');

