
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
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333; /* Color de fondo del encabezado, puedes cambiarlo según tu diseño */
    padding: 10px; /* Añadir espaciado interno al encabezado */
    color: white; /* Color del texto, puedes cambiarlo según tu diseño */
}

.left, .center, .right {
    padding: 10px; /* Añadir espaciado interno a cada elemento del encabezado */
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

 <div>
    <h2>Administrar entradas del blog </h2>

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

 <!-- Mostrar entradas -->
 <ul>
 <?php
foreach ($entradas as $entrada) {
    echo '<li>';
    echo '<h3>' . $entrada['titulo'] . '</h3>';
    // Mostrar la imagen si existe
if (!empty($entrada['imagen'])) {
    $url_imagen =  $entrada['imagen'];
    echo '<img src="' . $url_imagen . '" alt="Imagen de la entrada">';
}
    echo '<p>' . $entrada['descripcion'] . '</p>';
    echo '<p>Categoría: ' . obtenerNombreCategoria($entrada['categoria_id'], $categorias) . '</p>';
    echo '<p>Fecha de Creación: ' . $entrada['fecha_creacion'] . '</p>';
    echo '<a href="admin.php?editar_entrada=' . $entrada['id'] . '"><i class="bi bi-pencil"></i> Editar</a>';
    echo '<a href="admin.php?borrar_entrada=' . $entrada['id'] . '"><i class="bi bi-trash"></i> Borrar</a>';
    echo '</li>';
}
?>

    </ul>

            </div>

    <footer>
        <p>&copy; 2023 Blog de Películas</p>
    </footer>

</body>
</html>
<?php
$conexion_db->cerrar();
?>

