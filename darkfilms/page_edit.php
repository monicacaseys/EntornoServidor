
<?php
include "funciones.php";
include "acciones_entradas.php";

$conexion_db = new conectar_DB();

agregarEntrada($conexion_db);
editarEntrada($conexion_db);
eliminarEntrada($conexion_db);
agregarCategoria($conexion_db);
editarCategoria($conexion_db);
eliminarCategoria($conexion_db);

$entradas = $conexion_db->consultar("SELECT * FROM entradas ORDER BY fecha_creacion DESC");
$categorias = $conexion_db->consultar("SELECT * FROM categorias");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Header con Imágenes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">

</head>
<body>
<header>
        <div class="left"> <img id="logo" src="OIP.JPEG" width="130" height="190" alt="Logo" onclick="location.href='index.php';"></div>
        <div class="center"><a href="https://es.cooltext.com"><img src="https://images.cooltext.com/5679021.png" width="238" height="83" alt="darkfilms"></a></div>
        <div class="right">
        <nav>
                <ul style="padding: 0; margin: 0; display: flex; align-items: center;">
                    <?php
                if (isset($_SESSION['admin_authenticated']) && $_SESSION['admin_authenticated']===true) {
                    // Si hay una sesión iniciada, muestra mensaje de bienvenida y botón de cerrar sesión
                    
                    echo '<li style="list-style-type: none;  margin-right: 10px;">¡Bienvenido administrador!</li>';
                    echo '<li style="list-style-type: none; "><a href="logout.php" style="color: white; background-color: #8B0000; text-decoration: none; padding: 8px 12px; border-radius: 4px;">Cerrar sesión</a></li>';
                } 
                ?>
                </ul>
            </nav>
           
        </div>
    </header>
<h2>Administrar entradas del blog </h2>
<div class="volverEdit">
        <a href="index.php">Página cliente</a>
    </div>
<div class="containerEdit">
    <div id="nuevaEntrada" class="config-entry">
        <!-- Añadir nueva entrada -->
        <div class="config-categories">
        <a href="config_categorias.php">Configuración de Categorías</a>
    </div>
        <h2>Agergar entrada </h2>
        <form method="post" enctype="multipart/form-data">
            <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" required>

            <label for="imagen">Imagen: </label>
            <input type="file" name="imagen" accept="image/*">

            <label for="descripcion">Descripcion: </label>
            <textarea name="descripcion" rows="4" cols="50"></textarea>

            <label for="categoria">Categoria: </label>
            <select name="categoria" required>
                <?php
                foreach ($categorias as $categoria){
                    echo '<option value="' . $categoria['id'] .'">' . $categoria['nombre'] . '</option>'; 
                }
                ?>
            </select>

            <button type="submit" name="agregar_entrada">Agregar entrada </button>
        </form>
       
    </div>

    
</div>

 <!-- Mostrar entradas -->
 <ul>
 <?php
foreach ($entradas as $entrada) {
    echo '<li>';
    echo '<h3>' . $entrada['titulo'] . '</h3>';
// Mostrar la imagen si existe
if (!empty($entrada['imagen'])) {
    $url_imagen = "." . $entrada['imagen'];
    echo '<img src="' . $url_imagen . '" alt="Imagen de la entrada">';
}
  // Agregar la siguiente línea para imprimir la URL en la consola del navegador
  echo '<script>console.log("URL de la imagen: ' . $url_imagen . '");</script>';

  echo '<p>' . $entrada['descripcion'] . '</p>';
  echo '<p>Categoría: ' . obtenerNombreCategoria($entrada['categoria_id'], $categorias) . '</p>';
  echo '<p>Fecha de Creación: ' . $entrada['fecha_creacion'] . '</p>';
  echo '<a class="editar" href="page_edit.php?editar_entrada=' . $entrada['id'] . '"><i class="bi bi-pencil"></i> Editar</a>';
  echo '<a class="borrar" href="page_edit.php?borrar_entrada=' . $entrada['id'] . '"><i class="bi bi-trash"></i> Borrar</a>';
  
       // Formulario de edición (mostrado solo si se está editando esta entrada)
       if (isset($_GET['editar_entrada']) && $_GET['editar_entrada'] == $entrada['id']) {
        echo '<form method="post" enctype="multipart/form-data">';
        
        echo '<label for="nuevo_titulo">Nuevo Título: </label>';
        echo '<input type="text" name="nuevo_titulo" value="' . $entrada['titulo'] . '" required>';

        echo '<label for="nueva_descripcion">Nueva Descripción: </label>';
        echo '<textarea name="nueva_descripcion" rows="4" cols="50">' . $entrada['descripcion'] . '</textarea>';

        echo '<label for="nueva_imagen">Nueva Imagen: </label>';
        echo '<input type="file" name="nueva_imagen" accept="image/*">';
        
        echo '<label for="nueva_categoria">Nueva Categoría: </label>';
        echo '<select name="nueva_categoria" required>';
        foreach ($categorias as $categoria) {
            $selected = ($categoria['id'] == $entrada['categoria_id']) ? 'selected' : '';
            echo '<option value="' . $categoria['id'] . '" ' . $selected . '>' . $categoria['nombre'] . '</option>';
        }
        echo '</select>';

        echo '<button type="submit" name="guardar_edicion">Guardar Edición</button>';
        echo '</form>';
    }
    
    echo '</li>';
}
?>
    </ul>
    
    <footer>
        <p>&copy; 2023 Blog de Películas</p>
    </footer>

</body>
</html>
<?php
$conexion_db->cerrar();
?>

