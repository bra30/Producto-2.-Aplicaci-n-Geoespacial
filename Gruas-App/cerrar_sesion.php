<?php
session_start(); // Inicia la sesión

error_reporting(0);
$varsesion = $_SESSION['usuario'] ?? ''; // Asigna un valor por defecto en caso de que 'usuario' no esté definido

if ($varsesion === '') {
    echo 'Usted no tiene autorización';
    die();
}

// Cerrar la sesión (borra todas las variables de sesión)
session_unset();
session_destroy();

// Redirigir a una página de cierre de sesión o a donde desees después de cerrar la sesión
header("Location: index.html");
exit;
?>
