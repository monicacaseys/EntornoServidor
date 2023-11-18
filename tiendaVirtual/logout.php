<?php
// logout.php

// Iniciar la sesión si no está iniciada
session_start();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página principal (u otra página)
header("Location: index.php");
exit();
?>
