<?php

function agregarEntrada($conexion_db) {
    // AÑADIR ENTRADA
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_entrada'])) {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $fecha_creacion = date('Y-m-d'); // FECHA ACTUAL
        $categoria_id = $_POST['categoria'];

        // Validar no hay campos vacíos
        if (!empty($titulo) && !empty($categoria_id)) {
            // Verificar si se cargó una imagen
            if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
                // Subir la imagen
                $imagen_dir = __DIR__ . "/images/"; // Ruta completa al directorio donde se guardarán las imágenes
                $imagen_path = $imagen_dir . basename($_FILES["imagen"]["name"]);
                $imagen_extension = strtolower(pathinfo($imagen_path, PATHINFO_EXTENSION));

                // Crear el directorio si no existe
                if (!file_exists($imagen_dir)) {
                    mkdir($imagen_dir, 0777, true);
                }

                if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagen_path)) {
                    // Guardar la entrada en la base de datos con la ruta de la imagen
                    $imagen_path_rel = "/images/" . basename($_FILES["imagen"]["name"]);

                    $sql = "INSERT INTO entradas (titulo, descripcion, fecha_creacion, categoria_id, imagen)
                            VALUES ('$titulo', '$descripcion', '$fecha_creacion', '$categoria_id', '$imagen_path_rel')";
                    
                    if ($conexion_db->consultar($sql)) {
                        echo "Entrada agregada con éxito";
                        
                        // Redirigir a la página de administración después de agregar la entrada
                        header("Location: admin.php");
                        exit(); // Importante para detener la ejecución del script después de la redirección
                    } else {
                        echo "Error al agregar la entrada a la base de datos";
                    }
                } else {
                    echo "Error al subir la imagen";
                }
            } else {
                echo "No se seleccionó ninguna imagen";
            }
        } else {
            echo "Completa todos los campos";
        }
    }
}

function editarEntrada($conexion_db) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_entrada'])) {
        $entrada_id = $_POST['entrada_id'];
        $titulo = $_POST['titulo'];
        $categoria_id = $_POST['categoria'];

        if (!empty($titulo) && !empty($categoria_id)) {
            $sql = "UPDATE entradas SET titulo = '$titulo', categoria_id = '$categoria_id'
                    WHERE id = '$entrada_id'";
            $conexion_db->consultar($sql);
            echo "Entrada editada con éxito";
        } else {
            echo "Completa todos los campos";
        }
    }
}

function eliminarEntrada($conexion_db) {
    if (isset($_GET['borrar_entrada'])) {
        $entrada_id = $_GET['borrar_entrada'];
        $sql = "DELETE FROM entradas WHERE id='$entrada_id'";
        $conexion_db->consultar($sql);
        echo "Entrada eliminada con éxito";
    }
}

function agregarCategoria($conexion_db) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_categoria'])) {
        $nombre_categoria = $_POST['nombre_categoria'];

        if (!empty($nombre_categoria)) {
            $sql = "INSERT INTO categorias (nombre) VALUES ('$nombre_categoria')";
            $conexion_db->consultar($sql);
            echo "Categoría añadida con éxito";
        } else {
            echo "El campo está vacío";
        }
    }
}

function editarCategoria($conexion_db) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_categoria'])) {
        $categoria_id = $_POST['categoria_id'];
        $nombre_categoria = $_POST['nombre_categoria'];

        if (!empty($nombre_categoria)) {
            $sql = "UPDATE categorias SET nombre = '$nombre_categoria' WHERE id = '$categoria_id'";
            $conexion_db->consultar($sql);
            echo "Categoría editada con éxito";
        } else {
            echo "El campo está vacío";
        }
    }
}

function eliminarCategoria($conexion_db) {
    if (isset($_GET['borrar_categoria'])) {
        $categoria_id = $_GET['borrar_categoria'];
        $sql = "DELETE FROM categorias WHERE id='$categoria_id'";
        $conexion_db->consultar($sql);
        echo "Categoría eliminada con éxito";
    }
}

?>
