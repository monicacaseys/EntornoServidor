<?php
include "funciones.php";
include "acciones_entradas.php";
$conexion_db = new conectar_DB();

// Consultar todas las categorías
$categorias = $conexion_db->consultar("SELECT * FROM categorias");

// Obtener la categoría seleccionada, si está definida
$categoria_filtro = isset($_GET['categoria_filtro']) ? $_GET['categoria_filtro'] : null;

// Construir la condición WHERE para la consulta SQL
$filtro_condicion = ($categoria_filtro !== null && $categoria_filtro !== '') ? "WHERE categoria_id = $categoria_filtro" : "";

// Consultar las entradas con la condición de filtro
$consulta_entradas = "SELECT * FROM entradas $filtro_condicion ORDER BY fecha_creacion DESC";
$entradas = $conexion_db->consultar($consulta_entradas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página inicio</title>
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
        border: 2px solid #4CAF50; /* Borde verde */
        border-radius: 10px;
        box-shadow: 0 0 10px #4CAF50; /* Sombras en verde */
        text-align: left; /* Centrar el texto */
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
        font-size: 18px; /* Tamaño de letra más grande */
    }

    select {
        font-size: 16px; /* Tamaño de letra más grande */
    }

    h3{
        color: white;
        font-size: 40px; /* Tamaño de letra más grande */
        margin-bottom: 10px;  
        text-align: center;
    }
    p {
        color: white;
        font-size: 20px; /* Tamaño de letra más grande */
        margin-bottom: 10px; /* Espacio inferior para separar los elementos */
        
    }

    img {
        text-align: center;
        max-width: 100%; /* Ajustar la imagen al ancho del contenedor */
        height: auto; /* Mantener la proporción de la imagen */
        margin: 0 auto; /* Centrar la imagen */
        display: block; /* Asegurar que la imagen se centre correctamente */
    }
</style>


</head>
<body>
<header>
    <div class="left">
        <img id="logo" src="OIP.JPEG" width="130" height="190" alt="Logo" onclick="location.href='index.php';">
    </div>
    <div class="center">
        <a href="https://es.cooltext.com">
            <img src="https://images.cooltext.com/5679021.png" width="238" height="83" alt="darkfilms">
        </a>
    </div>
    <div class="right">
        <nav>
            <ul style="padding: 0; margin: 0; display: flex; align-items: center;">
                <?php
                if (isset($_SESSION['usuario'])) {
                    $usuario = $_SESSION['usuario'];
                    echo '<li style="list-style-type: none;  margin-right: 10px;">¡Hola, ' . $usuario . '!</li>';
                    echo '<li style="list-style-type: none; "><a href="logout.php" style="color: white; background-color: #8B0000; text-decoration: none; padding: 8px 12px; border-radius: 4px;">Cerrar sesión</a></li>';
                } else {
                    echo '<li style="list-style-type: none; margin-right: 10px;"><a href="login.php" style="font-size: 24px; text-decoration: none;">👤​</a></li>';
                    echo '<li style="list-style-type: none; margin-right: 10px;"><a href="#" onclick="showSearchBox()" style="font-size: 24px; text-decoration: none;">🔍​</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
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
        <?php foreach ($entradas as $entrada) : ?>
            <li>
                <h3><?php echo $entrada['titulo']; ?></h3>
                <?php if (!empty($entrada['imagen'])) : ?>
                    <?php $url_imagen = "http://localhost:8080/EntornoServidor/darkfilms" . $entrada['imagen']; ?>
                    <img src="<?php echo $url_imagen; ?>" alt="Imagen de la entrada">
                    <script>console.log("URL de la imagen: <?php echo $url_imagen; ?>");</script>
                <?php endif; ?>

                <p><?php echo $entrada['descripcion']; ?></p>
                <p>Categoría: <?php echo obtenerNombreCategoria($entrada['categoria_id'], $categorias); ?></p>
                <p>Fecha de Creación: <?php echo $entrada['fecha_creacion']; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<footer>
    <p>&copy; 2023 Blog de Películas</p>
</footer>

<script>
    function showSearchBox() {
        alert("Implementa la lógica para la búsqueda aquí");
    }
</script>
</body>
</html>


