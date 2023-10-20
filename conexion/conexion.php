<?php
//mysqli = clase conexion a una bbdd

//$conexion =new mysqli("host","usuario","clave","bbdd");
$conexion=new mysqli("localhost","root","","cenec"); //constructor para crear la conexion


if ($conexion -> connect_errno){
    echo "error de conexion";
}else{
    echo "la conexion se ha realizado con exito";
}
$conexion->close(); //destruye la conexion