<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div>
            <h1 id="logo">𝔓ℜℑ𝔐𝔒 </h1>
        </div>
        <div>
            <nav>
                <ul>
                    <li style="list-style-type: none;"> <a href="registrar.php">Registro</a></li>
                    <li style="list-style-type: none;"> <a href="login.php">Login</a></li>
                    <li style="list-style-type: none;"> <a href="carrito.php"><i class="bi bi-cart"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></i></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <?php

include("./funciones.php");

$conexion = new conectar_db;
$sql ="SELECT * FROM productos"; //consulta

$resultado = $conexion->consultar($sql);

?>
<!-- crear una tabla para los resultados -->
<table class="table table-striped">
    <tr>
        <td>ID</td>
        <td>Nombre</td>
        <td>Decripcion</td>
        <td>Precio</td>
        <td>Categoriaaa</td>
        
</tr>
<?php

while($row = $resultado->fetch_array()){
    $categoria_query = "SELECT nombre FROM categorias WHERE id_categoria = " . $row["categoria"];
    $categoria_result = $conexion->consultar($categoria_query);
    $categoria_row = $categoria_result->fetch_array();
    $nombre_categoria = $categoria_row["nombre"];
    echo "<tr>
            <td>".$row["id"]."</td> 
            <td>".$row["nombre"]."</td>
            <td>".$row["descripcion"]."</td>
            <td>".$row["precio"]."</td>
            <td>".$nombre_categoria."</td>
            <td>
            <a href='añadirCarro.php?id=".$row["id"]."'>
            <i class='bi bi-cart'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart' viewBox='0 0 16 16'>
            <path d='M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/></a>
            
            </td>
            </tr>";
                  // Libera los resultados de la consulta de la categoría
        mysqli_free_result($categoria_result);
}
?>
</table>

</body>
</html>