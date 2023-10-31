<?php
include("./funciones.php");

$conexion = new conectar_db();

$id_alumno = $_GET["id_alumno"];

$sql = "DELETE FROM alumnos WHERE id_alumno = $id_alumno";

$conexion->consultar($sql);

volver();


?>