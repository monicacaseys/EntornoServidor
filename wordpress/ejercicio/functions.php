<?php

add_theme_support('post-thumbnails');
add_theme_support('widgets');
add_theme_support('menus');


function load_css(){
wp_enqueue_style("style", get_stylesheet_directory_uri()."/css/estilos.css");
}

add_action("wp_enqueue_scripts", "load_css");

function load_bootstrap(){
wp_enqueue_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");
}

add_action("wp_enqueue_scripts", "load_bootstrap");

function load_font(){
wp_enqueue_style("roboto_font", "https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swa");
}

add_action("wp_enqueue_scripts", "load_font");

function register_menus() {
register_nav_menu('main-menu',__('Menú Principal'));
}
add_action('init', 'register_menus');

function register_footer_menu() {
register_nav_menu('footer-menu',__('Menú del Footer'));
}
add_action('init', 'register_footer_menu');

function my_excerpt($length){
return 12;
}

add_filter("excerpt_length","my_excerpt");

// Registrar la barra lateral
function registrar_sidebar() {
register_sidebar(
array(
'name' => __('Barra lateral', 'textodominio'),
'id' => 'barra-lateral',
'description' => __('Esta es la barra lateral principal.', 'textodominio'),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h2 class="widget-title">',
'after_title' => '</h2>',
)
);
}
// Enganchar la función al hook 'widgets_init'
add_action('widgets_init', 'registrar_sidebar');


// Creación de un custom Post Type
function wpdocs_codex_book_init() {
$labels = array(
'name' => _x( 'Books', 'Post type general name', 'textdomain' ),
'singular_name' => _x( 'Book', 'Post type singular name', 'textdomain' ),
'menu_name' => _x( 'Books', 'Admin Menu text', 'textdomain' ),
'name_admin_bar' => _x( 'Book', 'Add New on Toolbar', 'textdomain' ),
'add_new' => __( 'Add New', 'textdomain' ),
'add_new_item' => __( 'Add New Book', 'textdomain' ),
'new_item' => __( 'New Book', 'textdomain' ),
'edit_item' => __( 'Edit Book', 'textdomain' ),
'view_item' => __( 'View Book', 'textdomain' ),
'all_items' => __( 'All Books', 'textdomain' ),
'search_items' => __( 'Search Books', 'textdomain' ),
'parent_item_colon' => __( 'Parent Books:', 'textdomain' ),
'not_found' => __( 'No books found.', 'textdomain' ),
'not_found_in_trash' => __( 'No books found in Trash.', 'textdomain' ),
'featured_image' => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
'set_featured_image' => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
'use_featured_image' => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
'archives' => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
'insert_into_item' => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in
4.4', 'textdomain' ),
'filter_items_list' => _x( 'Filter books list', 'Screen reader text for the filter links
heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4',
'textdomain' ),
'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the
pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list
navigation”. Added in 4.4', 'textdomain' ),
'items_list' => _x( 'Books list', 'Screen reader text for the items list heading on
the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
);
$args = array(
'labels' => $labels,
'public' => true,
'publicly_queryable' => true,
'show_ui' => true,
'show_in_menu' => true,
'query_var' => true,
'rewrite' => array( 'slug' => 'book' ),
'capability_type' => 'post',
'has_archive' => true,
'hierarchical' => false,
'menu_position' => null,
'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
);
register_post_type( 'book', $args );
}
add_action( 'init', 'wpdocs_codex_book_init' );

//Creación de una Taxonomía
function registrar_taxonomia_personalizada() {
$args = array(
'hierarchical' => true, // true para una taxonomía jerárquica, false para no jerárquica
'labels' => array(
'name' => 'Géneros',
'singular_name' => 'Género',
),
'show_ui' => true,
'show_admin_column' => true,
'query_var' => true,
'rewrite' => array('slug' => 'genero'),
);
register_taxonomy('genero', array('book'), $args);
}
add_action('init', 'registrar_taxonomia_personalizada');

// Función para añadir un metabox a las entradas
function agregar_metabox_personalizado() {
add_meta_box(
'id_metabox_personalizado',
'Información Adicional',
'mostrar_contenido_metabox',
'post', // Tipo de contenido al que se aplicará (en este caso, 'post' para las entradas)
'normal', // Contexto donde se mostrará (puede ser 'normal', 'advanced', o 'side')
'high' // Prioridad en la que se mostrará ('high', 'core', 'default' o 'low')
);
}
add_action('add_meta_boxes', 'agregar_metabox_personalizado');


// Función para mostrar el contenido del metabox
function mostrar_contenido_metabox($post) {
// Recupera el valor almacenado (si existe)
$valor_metabox = get_post_meta($post->ID, '_clave_metabox', true);
// Campo de entrada para recoger la información
echo '<label for="campo_metabox">Información Adicional:</label>';
echo '<input type="text" id="campo_metabox" name="campo_metabox" value="' .
esc_attr($valor_metabox) . '" size="25">';
}


// Función para guardar el valor del metabox cuando se guarda la entrada
function guardar_valor_metabox($post_id) {
if (isset($_POST['campo_metabox'])) {
update_post_meta ( $post_id , '_clave_metabox' ,
sanitize_text_field($_POST['campo_metabox']));
}
}
add_action('save_post', 'guardar_valor_metabox');


// Metaboxes para el CPT Book

function libro_metabox() {
add_meta_box(
'informacion-libro', // id
'Datos adicionales del libro', // etiqueta
'libro_meta_box_content', // callback
'book', // CPT
'normal', // posicion
'high' // prioridad
);
}
add_action( 'add_meta_boxes', 'libro_metabox' );

// Metabox ISBN
function libro_meta_box_content( $post ) {
$values = get_post_meta ( $post->ID );
$isbn = isset( $values['info_libro_isbn'] ) ? esc_attr( $values['info_libro_isbn'][0] ) : '';
$encuadernacion = isset( $values[ 'info_libro_encuadernacion' ] ) ? esc_attr( $values['info_libro_encuadernacion'][0] ) : '';
$tapa = isset( $values['info_libro_tapa'] ) ? esc_attr( $values['info_libro_tapa'][0] ) : '';
$check = isset( $values['info_libro_stock'] ) ? esc_attr( $values['info_libro_stock'][0] ) :'';
$mi_opinion = isset( $values['mi_opinion'] ) ? esc_attr( $values['mi_opinion'][0]) : '';


?>
<p>
<label for="info_libro_isbn">ISBN</label>
<input type="text" name="info_libro_isbn" id="info_libro_isbn" value="<?php echo
esc_html( $isbn ); ?>" />
</p>
<p>
<label for="info_libro_encuadernacion">Tipo de encuadernación</label>
<select name="info_libro_encuadernacion" id="info_libro_encuadernacion">
<option value="rustica" <?php selected( $encuadernacion, 'rustica' ); ?>>Rústica</option>
<option value="pegada" <?php selected( $encuadernacion, 'pegada' ); ?>>Pegada</option>
<option value="cosida" <?php selected( $encuadernacion, 'cosida' ); ?>>Cosida</option>
</select>
</p>
<p>
<label for="info_libro_tapa">Tipo de Tapa</label>
<select name="info_libro_tapa" id="info_libro_tapa">
<option value="dura" <?php selected( $tapa, 'dura' ); ?>>Dura</option>
<option value="blanda" <?php selected( $tapa, 'blanda' ); ?>>Blanda</option>
</select>
</p>
<p>
<input type="checkbox" id="info_libro_stock" name="info_libro_stock" <?php
checked( $check, 'on' ); ?> />
<label for="info_libro_stock">Libro disponible en Stock</label>
</p>
<P>
<label for="mi_opinion">Mi opinión particular</label>
<textarea name="mi_opinion" id="mi_opinion"><?php echo $mi_opinion;?></textarea>
<?php
}

// Función que guarda los valores de los metaboxes
function libro_metabox_save( $post_id ) {

// Si el usuario actual no puede editar entradas no debería estar aquí.
/* if ( ! current_user_can( 'edit_post' ) ) {
return;
}*/
// AHORA es cuando podemos guardar la información.
// Nos aseguramos de que hay información que guardar.
if ( isset( $_POST['info_libro_isbn'] ) ) {
update_post_meta( $post_id, 'info_libro_isbn', wp_kses( $_POST['info_libro_isbn'], $allowed )
);
}
if ( isset( $_POST['info_libro_encuadernacion'] ) ) {
update_post_meta ( $post_id , 'info_libro_encuadernacion' , esc_attr( $_POST['info_libro_encuadernacion'] ) );
}
if ( isset( $_POST['info_libro_tapa'] ) ) {
update_post_meta( $post_id, 'info_libro_tapa', esc_attr( $_POST['info_libro_tapa'] ) );
}

$check = isset( $_POST['info_libro_stock'] ) && $_POST['info_libro_stock'] ? 'on' : 'off';
update_post_meta( $post_id, 'info_libro_stock', $check );

$mi_opinion = isset( $_POST['mi_opinion'] ) ? $_POST['mi_opinion'] : '';
update_post_meta( $post_id, 'mi_opinion', $mi_opinion );
}
add_action( 'save_post', 'libro_metabox_save' );
