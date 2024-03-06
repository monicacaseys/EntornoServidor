<?php
/*
Plugin Name: Frases Inspiradoras
Description: Plugin que muestra frases inspiradoras aleatorias en el pie de página.
Version: 1.0
Author: Tu Nombre
*/
function obtener_frase_inspiradora() {
    $frases = array(
        "La vida es lo que pasa mientras estás ocupado haciendo otros planes. - John Lennon",
        "La única forma de hacer un gran trabajo es amar lo que haces. - Steve Jobs",
        "No temas al fracaso, teme a no intentarlo. - Roy T. Bennett",
        "La felicidad es una mariposa que, cuando se persigue, siempre está más allá de su alcance, pero que, si te sientas tranquilamente, puede posarse sobre ti. - Nathaniel Hawthorne"
    );
    return $frases[array_rand($frases)];
}
function insertar_frase_inspiradora() {
    echo '<div class="frase-inspiradora">' . obtener_frase_inspiradora() . '</div>';
}
add_action('wp_footer', 'insertar_frase_inspiradora');
function frases_inspiradoras_agregar_menu() {
    add_menu_page('Frases Inspiradoras', 'Frases Inspiradoras', 'manage_options', 'frases-inspiradoras-settings', 'frases_inspiradoras_pagina_configuracion');
}
add_action('admin_menu', 'frases_inspiradoras_agregar_menu');

function frases_inspiradoras_pagina_configuracion() {
    // Aquí puedes agregar contenido a la página de configuración del plugin
}
 ?>