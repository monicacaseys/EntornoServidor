<?php

include "funciones.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $conn=new conectar_db;

    $sql="DELETE FROM contactos WHERE id=$id";

    $conn -> consultar($sql);
    volver();

}
?>