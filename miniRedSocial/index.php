<?php

include "funciones.php";

$conn = new conectar_db;

if ($_SERVER['REQUEST_METHOD']==='POST'){
    //agrgar comentario 
    if (isset($_POST['agregar_critica'])){
      $usuario = $_POST['usuario'];
      $libro = $_POST['libro'];
      $critica = $_POST['critica'];
    
      $sql = "INSERT INTO criticas (usuario,libro,critica) VALUES ('$usuario','$libro','$critica')";
      $result = $conn -> consultar($sql);

       if ($result){
        echo "critica agragada";
       } else {
        echo "no se ha podido agregar";
       }
       //añadir comeratios a los ocmetarios
    } elseif (isset($_POST['agregar_comentario'])){
        $id_critica = $_POST['id_critica'];
        $usuario_comentario = $_POST['usuario_comentario'];
        $comentario = $_POST['comentario'];

        $sql = "INSERT INTO comentarios (id_critica,usuario, comentario) VALUES ('$id_critica','$usuario_comentario','$comentario')";
        $result = $conn -> consultar ($sql);

        if($result){
            echo "comentario agregado";
        }else{
            echo "error al comentar" . $conn->error;
        }
    }
}

//cargar comentarios 
$sql = "SELECT * FROM criticas ORDER BY fecha DESC";
$result = $conn -> consultar($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red social</title>
</head>
<body>
    <h1> Red Social De Libros</h1>

    <h2> Añade tu comentario</h2>
    <form method="post" action="">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" required>

        <label for="libro">Titulo del libro</label>
        <input type="text" name="libro" required>

        <label for="critica">Critica</label>
        <textarea name="critica" rows="4" required></textarea>

        <button type="submit" name="agregar_critica">Agregar Crítica</button>
    </form>

    <h2>Criticas recientes</h2>
    <ul>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['usuario']} escribió una crítica sobre '{$row['libro']}':<br>{$row['critica']}<br>Fecha: {$row['fecha']}";

            // Formulario para agregar comentario
            echo "<form method='post' action=''>
                    <label for='usuario_comentario'>Usuario:</label>
                    <input type='text' name='usuario_comentario' required>

                    <label for='comentario'>Comentario:</label>
                    <textarea name='comentario' rows='2' required></textarea>

                    <input type='hidden' name='id_critica' value='{$row['id']}'>
                    <button type='submit' name='agregar_comentario'>Agregar Comentario</button>
                </form>";

            // Cargar comentarios de los comentarios
            $id_critica = $row['id'];
            $sqlComentarios = "SELECT * FROM comentarios WHERE id_critica = $id_critica ORDER BY fecha DESC";
            $resultCon = $conn->consultar($sqlComentarios);

            echo "<ul>";
            while ($rowComentario = $resultCon->fetch_assoc()) {
                echo "<li>{$rowComentario['usuario']} comentó: {$rowComentario['comentario']} ({$rowComentario['fecha']})</li>";
            }
            echo "</ul>";

            echo "</li>";
        }
        ?>
    </ul>
</body>
</html>
