<?php
include "funciones.php";

//crear instancia clase conectar
$conexion_db = new conectar_db();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    //verificar si el usuario exixtse
    $consulta= "SELECT id FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contraseña'";

    if ($conexion_db -> contar_resultados($consulta)>0){
        //usuario existe
        echo "¡Inicio de sesion con exito!";
    }else{
        //usuario no existe, lo inserto
        $consulta = "INSERT INTO usuarios (usuario, contraseña) VALUES ('$usuario', '$contraseña')";
        if($conexion_db -> consultar($consulta)){
            echo "Nuevo usuario registrado";

        }else{
            echo "Error al registrar usuario";
        }
    }

    //cerrar conexion

    $conexion_db -> cerrar();

}

?>