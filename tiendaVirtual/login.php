<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
        <h2>USER LOGIN</h2><br>
        <form class="form-inline" action="" method="post">
            <div class="form-group">
                <label for="usuario">
                    <img src="usu.png" alt="Usuario" style="background-color: #d3d3d3; padding: 8px; border-radius: 50%; margin-right: 8px;">
                </label>
                <input type="text" name="usuario" id="usuario" placeholder="Usuario" required>
            </div>
            <div class="form-group">
                <label for="contrasena">
                    <img src="R.gif" alt="Contrasena" style="background-color: #d3d3d3; padding: 15px; border-radius: 33%; margin-right: 10px;">
                </label>
                <input type="password" name="contrasena" id="contrasena" placeholder="Contrasena" required>
            </div>
            <div class="form-group">
                <input class="submit-btn" type="submit" value="Iniciar sesión">
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
        echo "¡Inicio de sesion con exito!";
        $_SESSION['usuario']= $usuario;
        echo '¡Hola, ' . $nombre_usuario . '! ';
        header("Location: index.php");
    }else{
        echo "El usuario no existe. Registrate!";
    }


    //cerrar conexion

    $conexion_db -> cerrar();

}
?>
</body>
</html>