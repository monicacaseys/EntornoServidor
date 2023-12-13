<?php
if (session_status() == PHP_SESSION_ACTIVE) {
    // Destruir la sesión actual
    session_destroy();
}

include "funciones.php";

// Crear instancia de la clase conectar
$conexion_db = new conectar_db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Verificar si el usuario existe
    $consulta = "SELECT id FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";

    if ($conexion_db->contar_resultados($consulta) > 0) {
        // Usuario existe
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
        exit(); // Agregar esta línea para asegurar que se detenga la ejecución después de la redirección
    } else {
       
        // Añadir botón de volver
        echo '<a href="registro.php" style="display: inline-block; padding: 10px; background-color:#3498db; text-decoration: none; color: #ffffff; border: 2px solid #2980b9"> El usuario no existe. Regístrate aquí</a>';
    }

    // Cerrar conexión
    $conexion_db->cerrar();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <nav>
            <ul style="padding: 0; margin: 0; display: flex; align-items: center;">
                <?php
                if (isset($_SESSION['usuario'])) {
                    $usuario = $_SESSION['usuario'];
                    echo '<li style="list-style-type: none;  margin-right: 10px;">¡Hola, ' . $usuario . '!</li>';
                    echo '<li style="list-style-type: none; "><a href="logout.php" style="color: white; background-color: #8B0000; text-decoration: none; padding: 8px 12px; border-radius: 4px;">Cerrar sesión</a></li>';
                } else {
                    echo '<li style="list-style-type: none; margin-right: 10px;"><a href="login.php" style="font-size: 24px; text-decoration: none;">👤​</a></li>';
                    
                }
                ?>
            </ul>
        </nav>
    </div>
</header>
<div class="containerLogin d-flex justify-content-center align-items-center h-100">
        <div class="login-container p-4 rounded shadow-lg text-white text-center">
        <div class="form-group mb-3">
                    <a href="admin.php" class="btn btn-danger btn-block text-white" style="box-shadow: 0 0 10px #ffcc00;; text-decoration: none; border-radius: 4px;">Soy admin</a>
                </div>
            <h2 class="mb-4">USER LOGIN</h2>
            <form class="form-signin" action="" method="post">
                <div class="form-group mb-3">
                    <label for="usuario" class="sr-only">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" required>
                </div>
                <div class="form-group mb-3">
                    <label for="contrasena" class="sr-only">Contraseña</label>
                    <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Contraseña" required>
                </div>
                <div class="d-flex justify-content-between">
                
                <div class="form-group mb-3">
                
                    <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                
                    <a href="registro.php" class="btn btn-info btn-block text-blue" style=" box-shadow: 0 0 10px rgba(255, 182, 193, 0.7); text-decoration: none; border-radius: 4px; ">Registrate aquí</a>
                </div>
            </div>
                
            </form>
           
        </div>
    </div>

<footer>
    <p>&copy; 2023 Blog de Películas</p>
</footer>
</body>
</html>

