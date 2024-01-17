<?php
function enqueue_parent_styles() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri().'/css/estilos.css' );
} 
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_child_styles() {
    wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri().'/css/estilos.css' );
   } 
   add_action( 'wp_enqueue_scripts', 'enqueue_child_styles' );