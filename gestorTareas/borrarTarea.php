<?php

include ("./funciones.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $conexion = new conectar_db;
    $sql = "DELETE FROM tareas WHERE id = $id";

$conexion->consultar($sql);
volver();
}
?>