<?php

include("./funciones.php");
?>
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
    <?php
if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
    echo "<h2>Carrito de Compras</h2>";
    echo '<a href="index.php" style="display: inline-block; margin: 10px; padding: 10px; background-color:#3498db; color: #ffffff; border: 2px solid #2980b9"> Volver</a>';
    echo "<ul>";
    echo "<table class='table table-striped'>
             <tr>
                 <th>ID</th>
                 <th>Nombre</th>
                 <th>Descripción</th>
                 <th>Precio</th>
             </tr>";
 
     // Conectarse a la base de datos
     $conexion = new conectar_db;
 
     foreach ($_SESSION['carrito'] as $producto_id) {
         // Consulta para obtener los detalles del producto
         $detalle_query = "SELECT id, nombre, descripcion, precio FROM productos WHERE id = $producto_id";
         $detalle_result = $conexion->consultar($detalle_query);
         $detalle_row = $detalle_result->fetch_array();
 
         // Muestra los detalles del producto en el carrito
         echo "<tr>
                 <td>".$detalle_row["id"]."</td>
                 <td>".$detalle_row["nombre"]."</td>
                 <td>".$detalle_row["descripcion"]."</td>
                 <td>".$detalle_row["precio"]."</td>
               </tr>";
 
         // Libera los resultados de la consulta de detalles del producto
         mysqli_free_result($detalle_result);
     }
 
     echo "</table>";
 } else {
     echo "<p>El carrito está vacío</p>";
     echo '<a href="index.php" style="display: inline-block; margin: 10px; padding: 10px; background-color:#3498db; color: #ffffff; border: 2px solid #2980b9"> Volver</a>';
 }
 
    
?>

</body>
</html>