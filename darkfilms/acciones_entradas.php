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
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['guardar_edicion'])) {
        $entrada_id = $_GET['editar_entrada'];
        $nuevo_titulo = $_POST['nuevo_titulo'];
        $nueva_descripcion = $_POST['nueva_descripcion'];
        $nueva_categoria = $_POST['nueva_categoria'];

        // Procesamiento de la nueva imagen (si se proporciona)
        if (isset($_FILES["nueva_imagen"]) && $_FILES["nueva_imagen"]["error"] == 0) {
            $imagen_dir = __DIR__ . "/images/";
            $imagen_path = $imagen_dir . basename($_FILES["nueva_imagen"]["name"]);
            
            if (!file_exists($imagen_dir)) {
                mkdir($imagen_dir, 0777, true);
            }

            if (move_uploaded_file($_FILES["nueva_imagen"]["tmp_name"], $imagen_path)) {
                $imagen_path_rel = "images/" . basename($_FILES["nueva_imagen"]["name"]);
            } else {
                echo "Error al subir la nueva imagen";
                return;
            }
        } else {
            // Si no se proporciona una nueva imagen, conserva la imagen existente
            $imagen_path_rel = $conexion_db->consultarValor("SELECT imagen FROM entradas WHERE id = '$entrada_id'");
        }

        if (!empty($nuevo_titulo) && !empty($nueva_descripcion) && !empty($nueva_categoria)) {
            $sql = "UPDATE entradas SET titulo = '$nuevo_titulo', descripcion = '$nueva_descripcion', categoria_id = '$nueva_categoria', imagen = '$imagen_path_rel' WHERE id = '$entrada_id'";
            $conexion_db->consultar($sql);
            echo "Entrada editada con éxito";
        } else {
            echo "Uno o más campos están vacíos";
        }
         // Redirigir después de la edición
         header("Location: page_edit.php");
         exit();
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

            header("Location: page_edit.php");
            exit();
    
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
            header("Location: page_edit.php");
            exit();
    
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
        header("Location: page_edit.php");
        exit();

    }
}

?>
