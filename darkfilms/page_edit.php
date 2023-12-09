
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
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #333;
        color: white;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #333;
        padding: 10px;
        color: white;
    }

    .left, .center, .right {
        padding: 10px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 2px solid #4CAF50;
        border-radius: 10px;
        box-shadow: 0 0 10px #4CAF50;
        text-align: left;
    }

    .container ul {
        list-style: none;
        padding: 0;
    }

    .container li {
        margin-bottom: 20px;
    }

    label {
        color: white;
        font-size: 18px;
    }

    select {
        font-size: 16px;
    }

    h2, h3, img {
        text-align: center;
        margin-bottom: 10px;
    }

    p {
        margin: 0;
    }

    .config-categories, .volver {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .config-categories a, .volver a {
        text-decoration: none;
        color: #3498db;
        border: 2px solid #3498db;
        padding: 8px 12px;
        border-radius: 4px;
        display: inline-block;
    }

    .config-categories a:hover, .volver a:hover {
        background-color: #3498db;
        color: white;
    }

    form {
        margin-top: 20px;
    }

    form label, form textarea, form select, form button {
        margin-bottom: 10px;
        display: block;
    }

    form button {
        padding: 8px 12px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    form button:hover {
        background-color: #2980b9;
    }

    ul {
        padding: 0;
        margin: 0;
    }

    ul li {
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 20px;
    }

    ul li a {
        text-decoration: none;
        color: #8B0000;
        margin-right: 10px;
    }

    ul li a:hover {
        color: #8B4513;
    }

    footer {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #ddd;
        color: white;
        text-align: center;
    }
</style>

</head>
<body>
<header>
        <div class="left"> <img id="logo" src="OIP.JPEG" width="80" height="120" alt="Logo" onclick="location.href='index.php';"></div>
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
<div class="config-categories">
    <a href="config_categorias.php">Configuración de Categorías</a>
</div>
<div class="volver">
    <a href="index.php">Página cliente</a>
</div>
 <div id="nuevaEntrada">
    
    <!-- Añadir nueva entrada -->
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
 <!-- Mostrar entradas -->
 <ul>
 <?php
foreach ($entradas as $entrada) {
    echo '<li>';
    echo '<h3>' . $entrada['titulo'] . '</h3>';
// Mostrar la imagen si existe
if (!empty($entrada['imagen'])) {
    $url_imagen = "http://localhost:8080/EntornoServidor/darkfilms" . $entrada['imagen'];
    echo '<img src="' . $url_imagen . '" alt="Imagen de la entrada">';
}
  // Agregar la siguiente línea para imprimir la URL en la consola del navegador
  echo '<script>console.log("URL de la imagen: ' . $url_imagen . '");</script>';

    echo '<p>' . $entrada['descripcion'] . '</p>';
    echo '<p>Categoría: ' . obtenerNombreCategoria($entrada['categoria_id'], $categorias) . '</p>';
    echo '<p>Fecha de Creación: ' . $entrada['fecha_creacion'] . '</p>';
    echo '<a href="page_edit.php?editar_entrada=' . $entrada['id'] . '"><i class="bi bi-pencil"></i> Editar</a>';
    echo '<a href="page_edit.php?borrar_entrada=' . $entrada['id'] . '"><i class="bi bi-trash"></i> Borrar</a>';

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

