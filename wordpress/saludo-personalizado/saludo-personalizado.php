<?php
/*
Plugin Name: Saludo Personalizado
Description: Plugin que muestra un saludo personalizado en cada página.
Version: 1.0
Author: Tu Nombre
*/


// Registrar página en el menú de administración
add_action('admin_menu', 'saludo_personalizado_agregar_menu');

function saludo_personalizado_agregar_menu() {
    add_menu_page('Saludo Personalizado', 'Saludo Personalizado', 'manage_options', 'saludo-personalizado-settings', 'saludo_personalizado_pagina_configuracion');
}

// Contenido de la página de configuración
function saludo_personalizado_pagina_configuracion() {
    // Aquí puedes añadir el contenido de la página de configuración si es necesario
}

// Activar el plugin
register_activation_hook(__FILE__, 'activar_saludo_personalizado');

function activar_saludo_personalizado() {
    // Aquí puedes incluir código que necesitas ejecutar cuando el plugin se active
}

// Desactivar el plugin (opcional)
register_deactivation_hook(__FILE__, 'desactivar_saludo_personalizado');

function desactivar_saludo_personalizado() {
    // Aquí puedes incluir código que necesitas ejecutar cuando el plugin se desactive
}
function obtener_nombre_usuario() {
    $usuario_actual = wp_get_current_user();
    $nombre_usuario = $usuario_actual->display_name;
    return $nombre_usuario;
}
function generar_saludo_personalizado() {
    $nombre_usuario = obtener_nombre_usuario();
    $saludo = "¡Hola $nombre_usuario! Bienvenido de nuevo.";
    return $saludo;
}
function insertar_saludo_personalizado() {
    echo '<div class="saludo-personalizado">' . generar_saludo_personalizado() . '</div>';
}
add_action('wp_head', 'insertar_saludo_personalizado');


?>
