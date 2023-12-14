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
$consulta_entradas = "SELECT entradas.*, AVG(notas1.puntuacion) AS nota_media 
                      FROM entradas 
                      LEFT JOIN notas1 ON entradas.id = notas1.entrada_id
                      $filtro_condicion 
                      GROUP BY entradas.id 
                      ORDER BY fecha_creacion DESC";
$entradas = $conexion_db->consultar($consulta_entradas);

// Verificar si se ha enviado un formulario mediante POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "ha entrado";
    echo $_POST["nota"];
    echo "<br>";
    echo $_POST["entrada_id"];
    echo "<br>";
    echo obtenerIdUsuarioActual();
    $usuario_id = obtenerIdUsuarioActual();


    // Verificar la existencia de los datos necesarios en el formulario
    if (isset($_POST['nota'], $_POST['entrada_id'])) {
        // Obtener los datos del formulario
        $nota = intval($_POST['nota']);
        $entrada_id = intval($_POST['entrada_id']);
         
echo "INSERT INTO notas1 (entrada_id, usuario_id, puntuacion) 
VALUES ($entrada_id, $usuario_id, $nota)";
        // Realiza la inserción de la nota en la base de datos
        $conexion_db->insertar("INSERT INTO notas1 (entrada_id, usuario_id, puntuacion) 
                                VALUES ($entrada_id, $usuario_id, $nota)");

        // Redirige a la página actual después de guardar la nota
        header("Location: index.php");
        exit();
    } else {
        echo "error";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página inicio</title>
    <link rel="stylesheet" href="styles.css">


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
                }
                ?>
            </ul>
        </nav>
    </div>
</header>

<div class="containerInicio">
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
                    <?php $url_imagen = ".". $entrada['imagen']; ?>
                    <img src="<?php echo $url_imagen; ?>" alt="Imagen de la entrada">
                    <script>console.log("URL de la imagen: <?php echo $url_imagen; ?>");</script>
                <?php endif; ?>

                <p><?php echo $entrada['descripcion']; ?></p>
                <p>Categoría: <?php echo obtenerNombreCategoria($entrada['categoria_id'], $categorias); ?></p>
                <p>Fecha de Creación: <?php echo $entrada['fecha_creacion']; ?></p>
                <p>Nota Media: <?php echo ($entrada['nota_media'] !== null) ? number_format($entrada['nota_media'], 1) : 'Sin notas'; ?></p>

        <?php if (isset($_SESSION['usuario'])) : ?>
            <form method="post" action="">
                <label for="nota">Añadir Nota:</label>
                <input type="number" name="nota" min="1" max="5" required>
                <input type="hidden" name="entrada_id" value="<?php echo $entrada['id']; ?>">
                <input type="submit" value="Guardar Nota">
            </form>
        <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<footer>
    <p>&copy; 2023 Blog de Películas</p>
</footer>
</body>
</html>


