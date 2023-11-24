<!-- FALTA AÑADIR DESCRIPCION -->

<?php
include "funciones.php";

//instancia clase conectar
$conexion_db = new conectar_db();

//AÑADIR ENTRADA
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_entrada'])){
    $titulo = $_POST['titulo'];
    $fecha_creacion= date ('Y-m-d'); //FECHA ACTUAL
    $categoria_id = $_POST['categoria'];

    //validar no hay campos vacios
    if (!empty($titulo) && !empty($categoria_id)){
        $sql = "INSERT INTO entradas (titulo, fecha_creacion, categoria_id)
         VALUES ('$titulo', '$fecha_creacion', '$categoria_id')";

         $conexion_db-> consultar($sql);

         echo "Entada agregada con exito";
    } else{
        echo "completa todos los campos";
    }
}

//EDITAR ENTRADA
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_entrada'])){
    $entrada_id = $_POST ['entrada_id'];
    $titulo = $_POST['titulo'];
    $categoria_id = $_POST['categoria'];

    //validar no hay campos vacios
    if (!empty($titulo) && !empty($categoria_id)){
        $sql = "UPDATE entradas SET titulo = '$titulo',categoria_id = '$categoria_id' 
        WHERE id = '$entrada_id'";

         $conexion_db-> consultar($sql);

         echo "Entada editada con exito";
    } else{
        echo "completa todos los campos";
    }
}

//ELIMINAR ENTRADA
if (isset($GET['borrar_entrada'])){

    $entrada_id = $_GET['borrar_entrada'];
    $sql = "DELETE FROM entradas WHERE id='$entrada_id'";

    $conexion_db-> consultar($sql);

    echo "Entrada eliminada con exito";
}

//AÑADIR NUEVA CATEGORIA
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_categoria'])){

    $nombre_categoria = $_POST['nombre_categoria'];

    if(!empty($nombre_categoria)){
        $sql= "INSERT INTO categorias (nombre) VALUES ('$nombre_categoria')";

        $conexion_db-> consultar($sql);

        echo "Categoria añadida con exito";
    } else{
        echo "el campo esta vacio";
    }
}

//EDITAR CATEGORIA
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_categoria'])){

    $categoria_id = $_POST['categoria_id'];
    $nombre_categoria = $_POST['nombre_categoria'];

    if (!empty($nombre_categoria)){
        $sql = "UPDATE categorias SET nombre = '$nombre_categoria'
        WHERE id = '$categoria_id'";

        $conexion_db-> consulta($sql);

        echo "Categoria editada con exito";
    } else {
        echo "el campo esta vacio";
    }
}

//BORRAR CATEGORIA
if (isset($GET['borrar_categoria'])){

    $categoria_id = $_GET['borrar_categoria'];
    $sql = "DELETE FROM categorias WHERE id='$categoria_id'";

    $conexion_db-> consultar($sql);

    echo "Categoria eliminada con exito";
}

//obtener entradas y categorias de la bbdd
$entradas = $conexion_db->("SELECT * FROM entradas ORDER BY fecha_creacion DESC");
$categorias = $conexion_db->("SELECT * FROM categorias");

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
    <form method="post">
    <label for="titulo">Titulo: </label>
    <input type="text" name="titulo" required>

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


