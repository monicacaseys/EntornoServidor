<?php
/*
Plugin Name: Certificados de Análisis (COA) Plugin
Description: Muestra los Certificados de Análisis de los productos de CBD.
Version: 1.0
Author: Monica Seys Oltra
*/

$names_base = array('CBD Flor', 'CBC Resina', 'CBD Aceite');

function coa_plugin_admin_page() {
    if (isset($_POST['submit_form'])) {
        $selected_name = sanitize_text_field($_POST['selected_name']);
        $text = sanitize_text_field($_POST['text']);

        $data_to_save = get_option('coa_plugin_data', array());

        // Validar y sanitizar los datos antes de guardarlos en la base de datos
        $data_to_save[$selected_name] = $text;

        // Guardar los datos en la base de datos usando update_option
        update_option('coa_plugin_data', $data_to_save);
    }

    ?>
    <div class="wrap">
        <h2>COA Plugin - Administrar Nombres</h2>
        <form method="post" action="">
            <?php wp_nonce_field('coa_plugin_nonce', 'coa_plugin_nonce'); ?>
            <label for="selected_name">Selecciona un nombre:</label>
            <select name="selected_name">
                <?php
                global $names_base;
                foreach ($names_base as $name) {
                    echo '<option value="' . esc_attr($name) . '">' . esc_html($name) . '</option>';
                }
                ?>
            </select>
            <label for="text">Texto asociado:</label>
            <input type="text" name="text" value="" required>
            <input type="submit" name="submit_form" value="Guardar">
        </form>
    </div>
    <?php
}

function coa_plugin_menu() {
    add_menu_page(
        'COA Plugin',       // Título de la página
        'COA Plugin',       // Nombre en el menú
        'manage_options',   // Capacidad requerida para acceder
        'coa-plugin-admin', // Slug de la página
        'coa_plugin_admin_page' // Función que mostrará la página
    );
}
add_action('admin_menu', 'coa_plugin_menu');

function display_names_on_frontend() {
    $stored_data = get_option('coa_plugin_data', array());

    echo '<ul>';

    foreach ($stored_data as $name => $text) {
        $url = esc_url(add_query_arg('name', $name, home_url('/ver-texto')));
        echo "<li><a href='{$url}'>" . esc_html($name) . '</a></li>';
    }

    echo '</ul>';
}
add_shortcode('coa_plugin_names', 'display_names_on_frontend');

function display_text_on_frontend() {
    $selected_name = isset($_GET['name']) ? sanitize_text_field($_GET['name']) : '';
    $stored_data = get_option('coa_plugin_data', array());

    if (isset($stored_data[$selected_name])) {
        echo '<h2>' . esc_html($selected_name) . '</h2>';
        echo '<p>' . esc_html($stored_data[$selected_name]) . '</p>';
    } else {
        echo '<p>Nombre no encontrado.</p>';
    }
}
add_shortcode('coa_plugin_view_text', 'display_text_on_frontend');

/*  Fondo rosa?
function pink_page_styles() {
    echo '<style>
        body {
            background-color: #ffcccc; 
            color: #000000; 
        }
    </style>';
}

add_action('wp_head', 'pink_page_styles'); */