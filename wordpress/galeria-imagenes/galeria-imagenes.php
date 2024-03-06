<?php
/*
Plugin Name: Galería de Imágenes
Description: Plugin que permite mostrar una galería de imágenes en el front-end utilizando un shortcode.
Version: 1.0
Author: Tu Nombre
*/

// Crear interfaz de usuario en el panel de administración
function galeria_imagenes_admin_page() {
    ?>
    <div class="wrap">
        <h1>Galería de Imágenes</h1>
        <!-- Formulario para subir imágenes -->
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="imagen" id="imagen">
            <input type="submit" name="subir_imagen" value="Subir Imagen">
        </form>
        <h2>Imágenes Subidas</h2>
        <div class="imagenes-subidas">
        <?php // Mostrar imágenes subidas
function mostrar_imagenes_subidas() {
    $args = array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="gallery">';
        while ($query->have_posts()) {
            $query->the_post();
            $imagen = wp_get_attachment_image_src(get_the_ID(), 'thumbnail');
            echo '<div class="imagen-galeria">';
            echo '<img src="' . esc_url($imagen[0]) . '" alt="' . esc_attr(get_the_title()) . '">';
            echo '</div>';
        }
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo 'No se han encontrado imágenes.';
    }
}
mostrar_imagenes_subidas();
?>

        </div>
    </div>
    <?php
}

// Función para manejar la subida de imágenes
function subir_imagen() {
    if (isset($_POST['subir_imagen'])) {
        $imagen = $_FILES['imagen'];
        $imagen_nombre = $imagen['name'];
        $imagen_temporal = $imagen['tmp_name'];
        $imagen_tipo = $imagen['type'];

        // Verificar si es una imagen
        $permitidos = array('image/jpeg', 'image/png', 'image/gif');
        if (in_array($imagen_tipo, $permitidos)) {
            $subida = wp_upload_bits($imagen_nombre, null, file_get_contents($imagen_temporal));
            if ($subida['error'] == false) {
                // Imagen subida correctamente
                echo '<div class="notice notice-success"><p>Imagen subida correctamente.</p></div>';
            } else {
                echo '<div class="notice notice-error"><p>Error al subir la imagen.</p></div>';
            }
        } else {
            echo '<div class="notice notice-error"><p>Formato de imagen no válido.</p></div>';
        }
    }
}

// Agregar página de galería de imágenes en el menú de administración
function agregar_pagina_galeria_imagenes() {
    add_menu_page(
        'Galería de Imágenes',
        'Galería de Imágenes',
        'manage_options',
        'galeria-imagenes',
        'galeria_imagenes_admin_page',
        'dashicons-format-image',
        20
    );
}
add_action('admin_menu', 'agregar_pagina_galeria_imagenes');

// Shortcode para mostrar la galería de imágenes
function mostrar_galeria_imagenes_shortcode($atts) {
    // Código para mostrar la galería de imágenes
}
add_shortcode('galeria_imagenes', 'mostrar_galeria_imagenes_shortcode');

// Función de activación del plugin
function activar_galeria_imagenes() {
    // Código de activación (opcional)
}
register_activation_hook(__FILE__, 'activar_galeria_imagenes');

// Función de desactivación del plugin
function desactivar_galeria_imagenes() {
    // Código de desactivación (opcional)
}
register_deactivation_hook(__FILE__, 'desactivar_galeria_imagenes');

// Función de desinstalación del plugin
function desinstalar_galeria_imagenes() {
    // Código de desinstalación (opcional)
}
register_uninstall_hook(__FILE__, 'desinstalar_galeria_imagenes');
