<?php

add_theme_support('post-thumbnails');
add_theme_support('widgets');
add_theme_support('menus');


function load_default_css(){
wp_enqueue_style("external", get_stylesheet_directory_uri()."/css/default.css");
}

add_action("wp_enqueue_scripts", "load_default_css");

function load_fonts_css(){
    wp_enqueue_style("external1", get_stylesheet_directory_uri()."/css/fonts.css");
    }
    
    add_action("wp_enqueue_scripts", "load_fonts_css");

function load_layout_css(){
    wp_enqueue_style("style2", get_stylesheet_directory_uri()."/css/layout.css");
    }
        
    add_action("wp_enqueue_scripts", "load_layout_css");

function load_magnificpopup_css(){
    wp_enqueue_style("style3", get_stylesheet_directory_uri()."/css/magnific-popup.css");
    }
            
    add_action("wp_enqueue_scripts", "load_magnificpopup_css");

function load_mediaqueries_css(){
    wp_enqueue_style("style4", get_stylesheet_directory_uri()."/css/media-queries.css");
    }
                
    add_action("wp_enqueue_scripts", "load_mediaqueries_css");

    //js
function load_init_js(){
    wp_register_script("javascript", get_stylesheet_directory_uri()."/js/init.js");
    }
                    
    add_action("wp_enqueue_scripts", "load_init_js");

function load_jquerymin_js(){
    wp_register_script("javascript1", get_stylesheet_directory_uri()."/js/jquery-1.10.2.min.js");
    } 
                        
    add_action("wp_enqueue_scripts", "load_jquerymin_js"); 

function load_jquerymigrate_js(){
    wp_register_script("javascript2", get_stylesheet_directory_uri()."/js/jquery-migrate-1.2.1.min.js");
    } 
                            
    add_action("wp_enqueue_scripts", "load_jquerymigrate_js"); 

function load_jqueryfittext_js(){
    wp_register_script("javascript3", get_stylesheet_directory_uri()."/js/jquery.fittext.js");
    } 
                                
    add_action("wp_enqueue_scripts", "load_jqueryfittext_js"); 

function load_jqueryflexslider_js(){
    wp_register_script("javascript4", get_stylesheet_directory_uri()."/js/jquery.flexslider.js");
    } 
                                    
    add_action("wp_enqueue_scripts", "load_jqueryflexslider_js"); 
    
function load_magnificpopup_js(){
    wp_register_script("javascript5", get_stylesheet_directory_uri()."/js/magnific-popup.js");
    } 
                                        
    add_action("wp_enqueue_scripts", "load_magnificpopup_js"); 

function load_modernizr_js(){
    wp_register_script("javascript6", get_stylesheet_directory_uri()."/js/modernizr.js");
    } 
                                            
    add_action("wp_enqueue_scripts", "load_modernizr_js"); 

function load_waypoints_js(){
    wp_register_script("javascript7", get_stylesheet_directory_uri()."/js/waypoints.js");
    } 
                                                
    add_action("wp_enqueue_scripts", "load_waypoints_js"); 
                  
        
// menu header
function register_menus() {
    register_nav_menu('main-menu',__('Menú Principal'));
    }
    add_action('init', 'register_menus');
        