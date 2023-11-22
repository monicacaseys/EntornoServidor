<?php
session_start();

if(isset($_GET['id'])){
    $producto_id=$_GET['id'];
    //verificar si hay carrito y si no lo inicio en esa sesion
    if(!isset($_SESSION['carrito'])){
        $_SESSION['carrito']=array();
    }
    //añadir producto al carrito
    $_SESSION['carrito'][]=$producto_id;
    header("Location: index.php");
    exit();
}
?>