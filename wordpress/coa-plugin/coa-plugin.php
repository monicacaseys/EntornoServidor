<?php
/*
Plugin Name: Certificados de Análisis (COA) Plugin
Description: Muestra los Certificados de Análisis de los productos de CBD. 
Cambia el color del head y footer a rosa.
Version: 1.0
Author: Monica Seys Oltra
*/

$names_base = array('CBD Flor', 'CBC Resina', 'CBD Aceite');
// Acción al activar el plugin
register_activation_hook(__FILE__, 'coa_plugin_activate');

function coa_plugin_activate() {
    // Crear la tabla en la base de datos al activar el plugin
    global $wpdb;
    $table_name = $wpdb->prefix . 'coa_plugin_data';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        text longtext NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Función para guardar los datos en la nueva tabla
function save_data_to_database($name, $text) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'coa_plugin_data';

    $wpdb->insert(
        $table_name,
        array(
            'name' => $name,
            'text' => $text,
        )
    );
}

// Modificar el código para usar la nueva función
function coa_plugin_admin_page() {
    if (isset($_POST['submit_form'])) {
        $selected_name = sanitize_text_field($_POST['selected_name']);
        $text = sanitize_text_field($_POST['text']);

        // Guardar los datos en la nueva tabla
        save_data_to_database($selected_name, $text);
    }
    // Obtener los datos guardados
    $stored_data = get_option('coa_plugin_data', array());

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
        <h2>Nombres Guardados</h2>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Shortcode</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stored_data as $name => $text) : ?>
                    <tr>
                        <td><?php echo esc_html($name); ?></td>
                        <td>[coa_plugin_view_text name="<?php echo esc_attr($name); ?>"]</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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

// Función para mostrar nombres en el frontend
function display_names_on_frontend() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'coa_plugin_data';

    $results = $wpdb->get_results("SELECT name FROM $table_name");

    if (empty($results)) {
        return '<p>No hay nombres disponibles.</p>';
    }

    $output = '<ul>';
    foreach ($results as $result) {
        $url = esc_url(add_query_arg('name', $result->name, home_url('/ver-texto')));
        $output .= "<li><a href='{$url}'>" . esc_html($result->name) . '</a></li>';
    }
    $output .= '</ul>';

    return $output;
}
add_shortcode('coa_plugin_names', 'display_names_on_frontend');

// Función para mostrar texto en el frontend
function display_text_on_frontend($atts) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'coa_plugin_data';

    $atts = shortcode_atts(array(
        'name' => '', // Parametro para obtener el nombre de la URL
    ), $atts);

    $selected_name = sanitize_text_field($atts['name']);

    $result = $wpdb->get_row($wpdb->prepare("SELECT text FROM $table_name WHERE name = %s", $selected_name));

    if ($result) {
        $output = '<h2>' . esc_html($selected_name) . '</h2>';
        $output .= '<p>' . esc_html($result->text) . '</p>';
    } else {
        $output = '<p>Nombre no encontrado.</p>';
    }

    return $output;
}
add_shortcode('coa_plugin_view_text', 'display_text_on_frontend');


function pink_page_styles() {
    echo '<style>
        body {
            background-color: #ffcccc; 
            color: #000000; 
        }
    </style>';
}

add_action('wp_head', 'pink_page_styles'); 