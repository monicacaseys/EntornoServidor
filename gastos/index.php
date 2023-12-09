<?php

include 'funciones.php';

$conn= new conectar_db; 

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $categoria = $_POST['categoria'];
    $titulo = $_POST['titulo'];
    $cantidad = $_POST['cantidad'];
    $fecha = $_POST['fecha'];

    $sql = "INSERT INTO gastos (categoria , titulo , cantidad , fecha) VALUES ('$categoria','$titulo','$cantidad','$fecha')";
    $result = $conn->consultar($sql);

    if($result){
        echo "gasto agregado con exito";
        volver();
    } else {
        echo "error al añadir";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
<h2> Agregar gasto</h2>
    <label for="categoria">Categoria</label>
    <input type="text" name="categoria" required>

    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" required>
    
    <label for="cantidad">Cantidad</label>
    <input type="text" name="cantidad" required>

    <label for="fecha">Fecha</label>
    <input type="date" name="fecha" required>

    <input type='submit' value='Enviar'>
</form>

<div>
    <h2>Resumen por categoria</h2>
    <table border="1">
    <tr>
            <th>Categoría</th>
            <th>Total Mensual</th>
        </tr>

        <?php
        $sql = "SELECT categoria, SUM(cantidad) AS total FROM gastos GROUP BY categoria";
        $result = $conn-> consultar($sql);
                while($row = $result -> fetch_assoc()){
                    echo "<tr><td>{$row['categoria']}</td><td>{$row['total']}</td></tr>";
                }

        ?>

</table>
</div>

<div>
    <h2>Todos los gastos</h2>
    <table border="1">
    <tr>
            <th>ID</th>
            <th>Categoria</th>
            <th>Titulo</th>
            <th>Cantidad</th>
            <th>Fecha</th>
        </tr>
    <?php

    $sqlAll = "SELECT * FROM gastos";
    $resultAll = $conn->consultar($sqlAll);

    while($rowAll = $resultAll -> fetch_assoc()){
        echo " <tr>
                  <td>{$rowAll['id']}</td>
                  <td>{$rowAll['categoria']}</td>
                  <td>{$rowAll['titulo']}</td>
                  <td>{$rowAll['cantidad']}</td>
                  <td>{$rowAll['fecha']}</td>
        </tr>";
    }
    ?>
</table>
</div>

</body>
</html>
