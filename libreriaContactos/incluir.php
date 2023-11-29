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

    if(isset($_POST['guardar'])){

        $nombre=$_POST['nombre'];
        $direccion=$_POST['direccion'];
        $email=$_POST['mail'];
        $tlf=$_POST['tlf'];

        $conexion = new conectar_db;
        $sql_insertar_contacto = "INSERT INTO contactos (nombre, direccion, telefono, email) VALUES ('$nombre', '$direccion', '$tlf', '$email')";
        $conexion->consultar($sql_insertar_contacto);
        volver();
    }
   
    ?>
<form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" ></input>
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" >
        <label for="tlf">Tlf:</label>
        <input type="text" name="tlf">
        <label for="mail">Email:</label>
        <input type="text" name="mail">

        <input type="submit" name="guardar" value="Guardar">
</form>
</body>
</html>
