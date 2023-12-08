<?php
include "funciones.php";
include "acciones_entradas.php";

$conexion_db = new conectar_DB();

// Lógica para agregar, editar y eliminar categorías
agregarCategoria($conexion_db);
editarCategoria($conexion_db);
eliminarCategoria($conexion_db);

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
                if (isset($_SESSION['usuario'])) {
                    // Si hay una sesión iniciada, muestra mensaje de bienvenida y botón de cerrar sesión
                    $usuario = $_SESSION['usuario'];
                    echo '<li style="list-style-type: none;  margin-right: 10px;">¡Hola, ' . $usuario . '!</li>';
                    echo '<li style="list-style-type: none; "><a href="logout.php" style="color: white; background-color: #8B0000; text-decoration: none; padding: 8px 12px; border-radius: 4px;">Cerrar sesión</a></li>';
                } else {
                    // Si no hay sesión iniciada, muestra botones de login y registro
                    echo '<li style="list-style-type: none; margin-right: 10px;"><a href="login.php" style="font-size: 24px;">👤​</a></li>';
                echo '<li style="list-style-type: none; margin-right: 10px;"><a href="#" onclick="showSearchBox()" style="font-size: 24px;">🔍​</a></li>';
                }
                ?>
                </ul>
            </nav>
           
        </div>
    </header>

    <h2>Configuración de Categorías</h2>

<!-- Formulario para agregar nueva categoría -->
<form method="post">
    <label for="nombre_categoria">Nombre de la categoría:</label>
    <input type="text" name="nombre_categoria" required>
    <button type="submit" name="agregar_categoria">Agregar Categoría</button>
</form>

<!-- Lista de categorías existentes -->
<ul>
    <?php foreach ($categorias as $categoria) : ?>
        <li>
            <?php echo $categoria['nombre']; ?>
            <a href="?editar_categoria=<?php echo $categoria['id']; ?>">Editar</a>
            <a href="?borrar_categoria=<?php echo $categoria['id']; ?>">Eliminar</a>
        </li>
    <?php endforeach; ?>
</ul>

<?php
// Lógica para editar categoría seleccionada
if (isset($_GET['editar_categoria'])) {
    $categoria_id = $_GET['editar_categoria'];
    $categoria_actual = obtenerCategoriaPorId($categoria_id, $categorias);
    if ($categoria_actual) {
        ?>
        <!-- Formulario para editar categoría seleccionada -->
        <form method="post">
            <input type="hidden" name="categoria_id" value="<?php echo $categoria_actual['id']; ?>">
            <label for="nombre_categoria">Nuevo nombre de la categoría:</label>
            <input type="text" name="nombre_categoria" value="<?php echo $categoria_actual['nombre']; ?>" required>
            <button type="submit" name="editar_categoria">Guardar Cambios</button>
        </form>
    <?php } else {
        echo 'Categoría no encontrada';
    }
} ?>


    <footer>
        <p>&copy; 2023 Blog de Películas</p>
    </footer>

  
</body>
</html>
<?php $conexion_db->cerrar(); ?>
