<?php
/*
Plugin Name: Lista de Tareas
Description: Plugin que permite a los usuarios gestionar listas de tareas desde el panel de administración de WordPress.
Version: 1.0
Author: Tu Nombre
*/

// Crear tabla personalizada para las tareas al activar el plugin
function crear_tabla_tareas() {
    global $wpdb;
    $tabla_tareas = $wpdb->prefix . 'tareas';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $tabla_tareas (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        tarea text NOT NULL,
        completada tinyint(1) NOT NULL DEFAULT '0',
        PRIMARY KEY (id)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
register_activation_hook( __FILE__, 'crear_tabla_tareas' );

// Función para mostrar la página de gestión de tareas
function mostrar_pagina_gestion_tareas() {
    ?>
    <div class="wrap">
        <h1>Lista de Tareas</h1>
        <h2>Agregar Nueva Tarea</h2>
        <form method="post" action="">
            <input type="text" name="tarea" placeholder="Ingrese una nueva tarea" required>
            <input type="submit" name="agregar_tarea" value="Agregar Tarea" class="button button-primary">
        </form>
        <br>
        <h2>Tareas Pendientes</h2>
        <ul>
            <?php mostrar_tareas_pendientes(); ?>
        </ul>
        <h2>Tareas Completadas</h2>
        <ul>
            <?php mostrar_tareas_completadas(); ?>
        </ul>
    </div>
    <?php
}

// Función para mostrar las tareas pendientes
function mostrar_tareas_pendientes() {
    global $wpdb;
    $tabla_tareas = $wpdb->prefix . 'tareas';
    $tareas_pendientes = $wpdb->get_results("SELECT * FROM $tabla_tareas WHERE completada = 0");
    foreach ($tareas_pendientes as $tarea) {
        echo '<li>' . esc_html($tarea->tarea) . ' <a href="?editar_tarea=' . $tarea->id . '">Editar</a> | <a href="?eliminar_tarea=' . $tarea->id . '">Eliminar</a></li>';
    }
}

// Función para mostrar las tareas completadas
function mostrar_tareas_completadas() {
    global $wpdb;
    $tabla_tareas = $wpdb->prefix . 'tareas';
    $tareas_completadas = $wpdb->get_results("SELECT * FROM $tabla_tareas WHERE completada = 1");
    foreach ($tareas_completadas as $tarea) {
        echo '<li><s>' . esc_html($tarea->tarea) . '</s> <a href="?eliminar_tarea=' . $tarea->id . '">Eliminar</a></li>';
    }
}

// Función para agregar una nueva tarea
function agregar_tarea() {
    if (isset($_POST['agregar_tarea'])) {
        global $wpdb;
        $tabla_tareas = $wpdb->prefix . 'tareas';
        $tarea = sanitize_text_field($_POST['tarea']);
        $wpdb->insert($tabla_tareas, array('tarea' => $tarea));
    }
}

// Función para marcar una tarea como completada
function marcar_tarea_completada($id_tarea) {
    global $wpdb;
    $tabla_tareas = $wpdb->prefix . 'tareas';
    $wpdb->update($tabla_tareas, array('completada' => 1), array('id' => $id_tarea));
}

// Función para eliminar una tarea
function eliminar_tarea($id_tarea) {
    global $wpdb;
    $tabla_tareas = $wpdb->prefix . 'tareas';
    $wpdb->delete($tabla_tareas, array('id' => $id_tarea));
}

// Acción para procesar la solicitud de agregar tarea
add_action('admin_init', 'agregar_tarea');

// Acción para procesar la solicitud de marcar tarea como completada
if (isset($_GET['completar_tarea'])) {
    marcar_tarea_completada($_GET['completar_tarea']);
}

// Acción para procesar la solicitud de eliminar tarea
if (isset($_GET['eliminar_tarea'])) {
    eliminar_tarea($_GET['eliminar_tarea']);
}

// Función para registrar la página de gestión de tareas en el menú de administración
function registrar_pagina_gestion_tareas() {
    add_menu_page(
        'Lista de Tareas',
        'Tareas',
        'manage_options',
        'gestion-tareas',
        'mostrar_pagina_gestion_tareas'
    );
}
add_action('admin_menu', 'registrar_pagina_gestion_tareas');
