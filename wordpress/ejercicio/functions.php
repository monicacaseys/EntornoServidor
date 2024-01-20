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