
<?php
include "funciones.php";

// Crear instancia clase conectar
$conexion_db = new conectar_db();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Verificar si el usuario exixtse
    $consulta= "SELECT id FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";

    if ($conexion_db -> contar_resultados($consulta)>0){
        // Usuario existe
        echo "¡Este usuario ya existe!";
    }else{
        // Usuario no existe, lo inserto
        $consulta = "INSERT INTO usuarios (usuario, contrasena) VALUES ('$usuario', '$contrasena')";
        if($conexion_db -> consultar($consulta)){
            echo "Nuevo usuario registrado";
            $_SESSION['usuario']= $usuario;
            header("Location: index.php");

        }else{
            echo "Error al registrar usuario";
        }
    }

    // Cerrar conexion

    $conexion_db -> cerrar();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>

<header>
<div class="left">
    <a href="index.php">
        <img id="logo" src="OIP.JPEG" width="130" height="190" alt="Logo">
    </a>
</div>
<div class="center">
        <a href="https://es.cooltext.com">
            <img src="https://images.cooltext.com/5679021.png" width="238" height="83" alt="darkfilms">
        </a>
    </div>
    <div class="right">
    </div>

   
</header>
<div class="containerRegistro d-flex justify-content-center align-items-center h-100">
        <div class="login-container text-white p-4 rounded shadow-lg">
            
            <h2>REGISTRO</h2>
            <form class="form-signin" action="" method="post">
                <div class="form-group mb-3">
                    <label for="usuario" class="sr-only">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" required>
                </div>
                <div class="form-group mb-3">
                    <label for="contrasena" class="sr-only">Contraseña</label>
                    <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Contraseña" required>
                </div>
                
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                        <a href="index.php" class="btn btn-info btn-block text-blue" style=" box-shadow: 0 0 10px rgba(255, 182, 193, 0.7); text-decoration: none; border-radius: 4px; ">Back</a>
                    </div>
                  
                
            </form>
        </div>
    </div>
<footer>
    <p>&copy; 2023 Blog de Películas</p>
</footer>
</body>
</html>