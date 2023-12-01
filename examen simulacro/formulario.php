<?php
$userErr = $emailErr = $contrasenaErr = ""; //declarar variables vacias

if($_SERVER["REQUEST_METHOD"]=="POST"){

    // Validar nombre
    if (empty($_POST["usuario"])) {

        $userErr = "El username es obligatorio";
        echo  $userErr;

    } else {

        $usuario = $_POST["usuario"]; //guardo la variable del formulario
    }

    // Validar correo
    if (empty($_POST["email"]) ) {

        $emailErr = "El email es obligatorio";
        echo $emailErr;

       } else if (!strpos($email, "@")) {  // validar formato. 
        
            $emailErr = "Formato de email invalido"; //sobreescribo la variable
            echo $emailErr; 

        } else{

            $email = $_POST["email"];
        }

    // Validar contraseña
    if (empty($_POST["contrasena"])) {

        $contrasenaErr = "La contraseña es obligatoria";
        echo $contrasenaErr;

    } else if (strlen($contrasena) < 8) {

            $contrasenaErr = "La contraseña debe tener al menos 8 caracteres";
            echo $contrasenaErr;

        }else{

            $contrasena = $_POST["contrasena"];
        }
    

    // Sin errores= MENSAJE DE EXITO
    if (empty($nombreErr) && empty($correoErr) && empty($contrasenaErr)) {

        echo "¡Registro exitoso! <br>
             Username: ".$usuario." <br>
             Email: ".$email."<br>
             Contraseña: ".$contrasena."";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
</head>
<body>
<h2>REGISTRO</h2><br>
  <form action="" method="post">
    <label for="usuario"></label>
    <input type="text" name="usuario" id="usuario" placeholder="Usuario" required>

    <label for="email"></label>
    <input type="text" name="email" id="email" placeholder="Email" required>
            
    <label for="contrasena"></label>
    <input type="password" name="contrasena" id="contrasena" placeholder="Password" required>
        
    <input class="submit-btn" type="submit" value="Registrarse">
          
</form> 
</body>
</html>
