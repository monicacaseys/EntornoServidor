<?php
session_start();

//credenciales admin
$adminUser= 'monik666';
$contrasenaAdmin='monik666';


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

   //verificar si es correcto
   if($usuario===$adminUser && $contrasena===$contrasenaAdmin){

    $_SESSION['admin_authenticated']=true; //guardo los valores de inico de sesion

    header ("Location: page_edit.php");
    exit();
   } else {
    echo('Las credenciales son incorrectas. No eres admin');
   }

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
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #333;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px;
            color: white;
        }

        .left, .center, .right {
            padding: 10px;
        }
        .container{
            max-width: 800px; /* Ancho máximo del div de las entradas */
    margin: 0 auto; /* Para centrar el div horizontalmente */
    padding: 20px;
        }
        /* Agrega este bloque de estilos en tu sección de estilos CSS o en tu archivo de estilos externo */


  .container ul {
    list-style: none; /* Quita los estilos de la lista, como los puntos de lista */
    padding: 0; /* Elimina el espacio interno de la lista */
}

.container li {
    margin-bottom: 20px; /* Márgenes inferiores entre cada entrada */
}

    </style>
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
<div class="container d-flex justify-content-center align-items-center h-100">
        <div class="login-container text-white p-4 rounded shadow-lg">
            
            <h2>USER ADMIN</h2>
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
                        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        <a href="login.php" class="btn btn-info btn-block text-blue" style=" box-shadow: 0 0 10px rgba(255, 182, 193, 0.7); text-decoration: none; border-radius: 4px; ">Back</a>
                    </div>
                  
                
            </form>
        </div>
    </div>
<footer>
    <p>&copy; 2023 Blog de Películas</p>
</footer>
</body>
</html>