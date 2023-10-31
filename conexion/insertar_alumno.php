<?php
include("./funciones.php");
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$dni = $_POST["dni"];
$telefono = $_POST["telefono"];

conectar();

$sql = "INSERT INTO alumnos (nombre, apellidos, dni, telefono) 
        VALUES ('$nombre', '$apellidos', '$dni', $telefono)";

$resultado = $conexion->query($sql);


volver();



?>