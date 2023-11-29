<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "funciones.php";

    if(isset($_GET['id'])){

        $id=$_GET['id'];

        $conexion = new conectar_db;
        $sql ="SELECT * FROM contactos WHERE id = $id"; //consulta

        $resultado = $conexion->consultar($sql);
        $tarea = $resultado->fetch_array();

        if(isset($_POST['guardar'])){
            $nombre=$_POST['nombre'];
            $direccion=$_POST['direccion'];
            $email=$_POST['mail'];
            $tlf=$_POST['tlf'];

        $sql_actualizar = "UPDATE contactos SET nombre='$nombre', direccion='$direccion', telefono='$tlf', email='$email' WHERE id=$id";
        $conexion->consultar($sql_actualizar);
        volver();
    }
    ?>
    <form action="" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $tarea['nombre']; ?>"></input>
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" value="<?php echo $tarea['direccion']; ?>">
            <label for="tlf">Tlf:</label>
            <input type="number" name="tlf" value="<?php echo $tarea['telefono']; ?>">
            <label for="mail">Email:</label>
            <input type="text" name="mail" value="<?php echo $tarea['email']; ?>">
    
            <input type="submit" name="guardar" value="Guardar">
    </form>

    <?php
} else {
    echo "No se ha proporcionado un ID válido.";
}
?>
   
</body>
</html>
