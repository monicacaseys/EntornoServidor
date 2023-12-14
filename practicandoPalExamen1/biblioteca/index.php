<?php
//session_star();
include "funciones.php";
$conn = new conexion_db();

//verificar sesion
if (!isset($_SESSION['usuario'])){
   header ("Location: login.php");
   exit(); 
}

//verificar envio formulario
if ($_SERVER['REQUEST_METHOD']==='POST'){
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];

    //validacion simple
    if(empty($titulo) || empty($autor)){
        $error = "todos los campos llenos";
    } else {
        $conn ->registarLibro ($titulo,$autor);
    }
}

//obtener todo los libros
$libros = $conn -> obtenerLibros();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2>Registro de Libros</h2>

<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required><br>

    <label for="autor">Autor:</label>
    <input type="text" name="autor" required><br>

    <input type="submit" value="Registrar Libro">
</form>
<h3>Listado de libros </h3>
<?php if (empty($libros)):?>
    <p> No hay libros</p>
    <?php else: ?>
        <ul>
          <?php foreach($libros as $libro): ?>
            <li><?php echo $libro['titulo'];?>-<?php echo $libro['autor'];?> </li>
            <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>