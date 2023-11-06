<?php
include("./funciones.php");

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$dni = $_POST["dni"];
$telefono = $_POST["telefono"];
$id_alumno = $_POST["id_alumno"];

$conexion = new conectar_db();

$sql = "UPDATE alumnos SET nombre = '$nombre',apellidos ='$apellidos', dni ='$dni',telefono= '$telefono' WHERE id_alumno = $id_alumno";

$resultado = $conexion->consultar($sql);

volver();


//var_dump($_POST);   //MUESTRA LOS VALORES TAL CUAL EN EL ARRY
?>