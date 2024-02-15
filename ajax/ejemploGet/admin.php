<?php //falla la configuracion de mensaje
// Comprobar si los datos son correctos
$username = $_GET['nombre'];
$password = $_GET['pswd'];

// Verificar si el usuario y la contraseña son "admin" y "admin"
if($username == 'admin' && $password == 'admin'){
    $respuesta='estas dentro';
} else {
    $respuesta='NO estas dentro';
    
}
echo $respuesta;
die();
?>