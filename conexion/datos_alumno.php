<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <?php
    include("./funciones.php");

    $conexion = new conectar_db();
    //necesitamos crear una conexion, la haremos general porque es mejor pero de momento no
    //$conexion=new mysqli("localhost","root","","gestion_practicas");
     //crear variable para guardar la variable del alumno
    $id_alumno= $_GET["id_alumno"];
    $sql_alumno="SELECT * FROM alumnos WHERE id_alumno = ".$id_alumno;
    $alumno = $conexion->consultar($sql_alumno);

    ?>
    <form method="POST" action="actualizar_alumno.php"> 
        <input type="hidden" name="id_alumno" value="<?php echo $id_alumno;?>">
    <?php
    while ($row = $alumno -> fetch_array()){
        echo "<h1>Datos alumno</h1>
        <label class='form-label'>Nombre</label>
        <input class='form-control'type='text' name='nombre' value='".$row["nombre"]."'>
        <label class='form-label'>Apellidos</label>
        <input class='form-control' type='text' name='apellidos' value='".$row["apellidos"]."'>
        <label class='form-label'>DNI</label>
        <input class='form-control' type='text' name='dni' value='".$row["dni"]."'>
        <label class='form-label'>Telefono</label>
        <input class='form-control' type='text' name='telefono' value='".$row["telefono"]."'>";

        echo "<input type='submit' value='Editar'>";
    }
    ?>
    </form>
</body>
</html>