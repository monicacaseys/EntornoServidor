
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <?php
    include "funciones.php";

   $conn= new conectar_db; 

   $sql= "SELECT * FROM contactos"; 

   $resultado = $conn-> consultar($sql);
    ?>
    <h1 style="text-align:center; margin:20px">Libreria de contactos</h1>
    <a href="incluir.php" class="btn btn-primary" >+ Añadir</a>
    <table class="table table-dark table-hover" style="margin:20px">
<tr>
<td>ID</td>
    <td>Nombre</td>
    <td>Dirección</td>
    <td>Telf</td>
    <td>Email</td>
    <td>Acción</td>
</tr>
    <?php
    while($row=$resultado->fetch_array()){
        echo "<tr>
                <td>".$row["id"]." </td>
                <td>".$row["nombre"]." </td>
                <td>".$row["direccion"]."</td>
                <td>".$row["telefono"]."</td>
                <td>".$row["email"]."</td>
                <td>
                <a href='editar.php?id=".$row["id"]."'>
                    <i class='bi bi-pencil-square'></i></a>
                <a href='eliminar.php?id=".$row["id"]."'>
                        <i class='bi bi-trash'></i></a>
                </td>
        </tr>";
    }
    ?>

</table>
    
</body>
</html>