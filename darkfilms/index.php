<?php
include "funciones.php";

include "acciones_entradas.php";
$conexion_db = new conectar_DB();


$entradas = $conexion_db->consultar("SELECT * FROM entradas ORDER BY fecha_creacion DESC");
$categorias = $conexion_db->consultar("SELECT * FROM categorias");


// Verificar si se ha seleccionado una categoría para el filtro
if (isset($_GET['categoria_filtro'])) {
    $categoria_filtro = $_GET['categoria_filtro'];
    $filtro_condicion = "WHERE categoria_id = $categoria_filtro";
} else {
    $categoria_filtro = null;
    $filtro_condicion = "";
}

// Obtener las entradas según el filtro
$entradas = $conexion_db->consultar("SELECT * FROM entradas $filtro_condicion ORDER BY fecha_creacion DESC");
?>


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

 <div>
       <!-- Mostrar menú desplegable para seleccionar la categoría -->
       <form method="get">
            <label for="categoria_filtro">Filtrar por categoría:</label>
            <select name="categoria_filtro" onchange="this.form.submit()">
                <option value="" <?php echo (!$categoria_filtro) ? 'selected' : ''; ?>>Todas las categorías</option>
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?php echo $categoria['id']; ?>" <?php echo ($categoria_filtro == $categoria['id']) ? 'selected' : ''; ?>>
                        <?php echo $categoria['nombre']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
    
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

    <script>
        function showSearchBox() {
            // Aquí puedes agregar la lógica para mostrar la caja de búsqueda
            alert("Implementa la lógica para la búsqueda aquí");
        }
    </script>
</body>
</html>


