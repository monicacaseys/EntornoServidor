<?php

$libros =array(
    array(
        "titulo"=>"Manifiesto Contrasexual",
        "autor"=>"Paul B.Preciado",
        "genero"=>"Educativo"

    ),
    array(
        "titulo"=>"La Fundación",
        "autor"=> "Antonio Buero Vallejo",
        "genero"=>"Drama"
    ),
    array(
        "titulo"=>"Plenilunio",
        "autor"=>"Antonio Muñoz Molina",
        "genero"=>"Drama"
    )
    );

//MOSTRAR TODOS
function mostrar_libros($libros){
    foreach ($libros as $libro) {
        echo "Título: " . $libro['titulo'] . "<br>
              Autor: " . $libro['autor'] . "<br>
              Género: " . $libro['genero'] . "";
    }
}

//BUSCAR LIBRO
function buscar_libro($libros, $titulo){
    foreach ($libros as $libro) {
        if ($libro['titulo'] == $titulo) {
            return $libro;
        }
    }
    return "Libro no encontrado";
}

//AGREGAR LIBRO
function agregar_libro($libros, $nuevoLibro){
    $libros[] = $nuevoLibro;
    return $libros;
}

$nuevoLibro = array(
    "titulo" => "Nuevo",
    "autor" => "Autor",
    "genero" => "Genero"
);

$libros = agregar_libro($libros, $nuevoLibro); 

mostrar_libros($libros); //comprobar que se añade al array
/* ejemplo de como añadir un libro:

$nuevoLibro = array(
    "titulo" => "Nuevo",
    "autor" => "Autor",
    "genero" => "Genero"
);

agregar_libro($libros, $nuevoLibro); */
?>

