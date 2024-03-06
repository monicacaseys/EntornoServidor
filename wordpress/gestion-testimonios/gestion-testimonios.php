<?php
/*
Plugin Name: Gestión de Testimonios
Description: Plugin que permite añadir, editar y eliminar testimonios de clientes desde el panel de administración y mostrarlos en el front-end mediante un shortcode.
Version: 1.0
Author: Tu Nombre
*/

// Crear tabla de testimonios en la activación del plugin
function crear_tabla_testimonios() {
    global $wpdb;
    $tabla = $wpdb->prefix . 'testimonios';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $tabla (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        titulo varchar(50) NOT NULL,
        autor varchar(100) NOT NULL,
        contenido text NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
register_activation_hook( __FILE__, 'crear_tabla_testimonios' );

// Agregar página de gestión de testimonios en el menú de administración
function gestion_testimonios_pagina() {
    // Código HTML y PHP para la página de gestión de testimonios
    echo '<div class="wrap"><h1>Gestión de Testimonios</h1><p>Aquí puedes gestionar tus testimonios.</p></div>';
    if (isset($_POST['agregar_testimonio'])) {
        // Si se ha enviado el formulario para agregar un testimonio
        $titulo = sanitize_text_field($_POST['titulo']);
        $autor = sanitize_text_field($_POST['autor']);
        $contenido = sanitize_textarea_field($_POST['contenido']);
        if (!empty($titulo) && !empty($autor) && !empty($contenido)) {
            agregar_testimonio($titulo, $autor, $contenido);
            echo '<div class="notice notice-success"><p>Testimonio añadido correctamente.</p></div>';
        } else {
            echo '<div class="notice notice-error"><p>Por favor, completa todos los campos.</p></div>';
        }
    }
    // Mostrar formulario para agregar testimonios
    ?>
    <div class="wrap">
        <h1>Gestión de Testimonios</h1>
        <form method="post" action="">
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo" required><br><br>
            <label for="autor">Autor:</label><br>
            <input type="text" id="autor" name="autor" required><br><br>
            <label for="contenido">Contenido:</label><br>
            <textarea id="contenido" name="contenido" rows="4" required></textarea><br><br>
            <input type="submit" name="agregar_testimonio" value="Añadir Testimonio" class="button button-primary">
        </form>
    </div>
    <?php
}
function agregar_pagina_gestion_testimonios() {
    add_menu_page(
        'Gestión de Testimonios',
        'Testimonios',
        'manage_options',
        'gestion-testimonios',
        'gestion_testimonios_pagina',
        'dashicons-format-quote'
    );
}
add_action('admin_menu', 'agregar_pagina_gestion_testimonios');

// Funciones para añadir, editar y eliminar testimonios
function agregar_testimonio($titulo, $autor, $contenido) {
    global $wpdb;
    $tabla = $wpdb->prefix . 'testimonios';
    $wpdb->insert(
        $tabla,
        array(
            'titulo' => $titulo,
            'autor' => $autor,
            'contenido' => $contenido
        )
    );
}

function editar_testimonio($id, $titulo, $autor, $contenido) {
    global $wpdb;
    $tabla = $wpdb->prefix . 'testimonios';
    $wpdb->update(
        $tabla,
        array(
            'titulo' => $titulo,
            'autor' => $autor,
            'contenido' => $contenido
        ),
        array('id' => $id)
    );
}

function eliminar_testimonio($id) {
    global $wpdb;
    $tabla = $wpdb->prefix . 'testimonios';
    $wpdb->delete($tabla, array('id' => $id));
}

// Shortcode para mostrar testimonios en el front-end
function mostrar_testimonios_shortcode($atts) {
    global $wpdb;
    $tabla = $wpdb->prefix . 'testimonios';
    $testimonios = $wpdb->get_results("SELECT * FROM $tabla");
    $output = '<div class="testimonios">';
    foreach ($testimonios as $testimonio) {
        $output .= '<div class="testimonio">';
        $output .= '<h3>' . esc_html($testimonio->titulo) . '</h3>';
        $output .= '<p>' . esc_html($testimonio->contenido) . '</p>';
        $output .= '<span class="autor">' . esc_html($testimonio->autor) . '</span>';
        $output .= '</div>';
    }
    $output .= '</div>';
    return $output;
}
add_shortcode('mostrar_testimonios', 'mostrar_testimonios_shortcode');
