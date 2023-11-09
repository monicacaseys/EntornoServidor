<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
<?php

include("./funciones.php");

$conexion = new conectar_db;
$sql ="SELECT * FROM tareas"; //consulta

$resultado = $conexion->consultar($sql);

?>
<h1 style="text-align:center">Gestor de tareas</h1>
<a href="addTarea.php" class="btn btn-primary">+ Añadir Tarea</a>
<!-- crear una tabla para los resultados -->
<table class="table table-striped">
    <tr>
        <td>ID</td>
        <td>Titulo</td>
        <td>Decripcion</td>
        <td>Categoria</td>
        <td>Acción</td>
</tr>
<?php
//leemos los resultados de la consulta
//crear fila nueva para cada fila de la base de datos
//fectch array recupera cada fila del array asociativo de la avriable resultado y la saca asi, esa funcion hace todo el trabajo
while($row = $resultado->fetch_array()){
    echo "<tr>
            <td>".$row["id"]."</td> 
            <td>".$row["titulo"]."</td>
            <td>".$row["descripcion"]."</td>
            <td>".$row["categoria"]."</td>
            <td>
            <a href='modificarTarea.php?id=".$row["id"]."'>
                <i class='bi bi-pencil-square'></i></a>
            <a href='borrarTarea.php?id=".$row["id"]."'>
                    <i class='bi bi-trash'></i></a>
            </td>
            </tr>";
}
?>
</table>

</body>
</html>
