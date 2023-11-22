<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
        <h2 style="padding: 15px; margin-right: 10px;">Registrarse</h2><br>
        <form class="form-inline" action="" method="post">
            <div class="form-group" style="padding: 15px; margin-right: 10px;">
                <label for="usuario"></label>
                <input type="text" name="usuario" id="usuario" placeholder="Usuario" required>
            </div>
            <div class="form-group" style="padding: 15px; margin-right: 10px;">
                <label for="contrasena"></label>
                <input type="password" name="contrasena" id="contrasena" placeholder="Contrasena" required>
            </div>
            <div class="form-group" style="padding: 15px; margin-right: 10px;">
                <input class="submit-btn" type="submit" value="Registrarse">
            </div>
</form> 
</div>
<?php
include "funciones.php";

//crear instancia clase conectar
$conexion_db = new conectar_db();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    //verificar si el usuario exixtse
    $consulta= "SELECT id FROM usuarios WHERE nombre = '$usuario' AND contrasena = '$contrasena'";

    if ($conexion_db -> contar_resultados($consulta)>0){
        //usuario existe
        echo "¡Este usuario ya existe!";
    }else{
        //usuario no existe, lo inserto
        $consulta = "INSERT INTO usuarios (nombre, contrasena) VALUES ('$usuario', '$contrasena')";
        if($conexion_db -> consultar($consulta)){
            echo "Nuevo usuario registrado";
            $_SESSION['usuario']= $usuario;
            header("Location: index.php");

        }else{
            echo "Error al registrar usuario";
        }
    }

    //cerrar conexion

    $conexion_db -> cerrar();

}

?>
</body>
</html>