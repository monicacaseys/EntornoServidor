<?php //falla la configuracion de mensaje
// Comprobar si los datos son correctos
$username = $_POST['nombre'];
$password = $_POST['pswd'];

// Verificar si el usuario y la contraseña son "admin" y "admin"
if($username === 'admin' && $password === 'admin'){
    echo 'success';
} else {
    echo 'error';
}