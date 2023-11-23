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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
        <h2 style="padding: 15px; margin-right: 10px;">USER ADMIN</h2><br>
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
                <input class="submit-btn" type="submit" value="Iniciar Sesión">
            </div>
          
</form> 
</div>
</body>
</html>