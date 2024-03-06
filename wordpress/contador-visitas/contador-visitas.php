<?php
/*
Plugin Name: Contador de Visitas
Description: Plugin que cuenta y muestra el número de visitas en cada página.
Version: 1.0
Author: Tu Nombre
*/

// Registrar página en el menú de administración
add_action('admin_menu', 'contador_visitas_agregar_menu');

function contador_visitas_agregar_menu() {
    add_menu_page('Contador de Visitas', 'Contador de Visitas', 'manage_options', 'contador-visitas-settings', 'contador_visitas_pagina_configuracion');
}

// Contenido de la página de configuración
function contador_visitas_pagina_configuracion() {
    // Aquí puedes añadir el contenido de la página de configuración si es necesario
}

// Activar el plugin
register_activation_hook(__FILE__, 'activar_contador_visitas');

function activar_contador_visitas() {
    // Aquí puedes incluir código que necesitas ejecutar cuando el plugin se active
}

// Desactivar el plugin (opcional)
register_deactivation_hook(__FILE__, 'desactivar_contador_visitas');

function desactivar_contador_visitas() {
    // Aquí puedes incluir código que necesitas ejecutar cuando el plugin se desactive
}

function contar_visita() {
    $pagina_actual = get_the_ID();
    $contador_visitas = get_post_meta($pagina_actual, 'contador_visitas', true);
    $contador_visitas++;
    update_post_meta($pagina_actual, 'contador_visitas', $contador_visitas);
}
add_action('wp', 'contar_visita');
function mostrar_contador_visitas() {
    $pagina_actual = get_the_ID();
    $contador_visitas = get_post_meta($pagina_actual, 'contador_visitas', true);
    echo '<div class="contador-visitas">Esta página ha sido visitada ' . $contador_visitas . ' veces.</div>';
}
add_action('wp_footer', 'mostrar_contador_visitas');


?>
