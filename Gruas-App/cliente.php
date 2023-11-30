<?php
session_start(); // Inicia la sesiÃ³n en la pÃ¡gina de bienvenida

error_reporting(0);
$varsesion = $_SESSION['usuario'] ?? ''; // Asigna un valor por defecto en caso de que 'usuario' no esté definido

if ($varsesion === '') {
    echo 'Usted no tiene autorización';
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maquetado Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand">Mi Sitio Web</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opciones
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="mapa.php">Explorar Mapa</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesion</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Sección de Héroe con Fondo de Imagen -->
    <div class="hero text-center bg-image p-5" style="background-image: url('https://th.bing.com/th/id/OIP._onvwjOu9447ZwMNvoG_jwHaDH?pid=ImgDet&rs=1');">
        <div class="container my-5">
            <h1 style="color: black;">Bienvenido, <?php echo $_SESSION['usuario']?>!</h1>
            <p class="lead" style="color: black;">Un lugar increíble para explorar y encontrar.</p>
            <a href="mapa.php" class="btn btn-primary">Explorar</a>
        </div>
    </div>

    <!-- Contenido Principal -->
    <div class="container mt-5 p-5">
        <h2>Proyecto de Asignación de Ubicación</h2>
        <p class="text-justify">En este proyecto, exploraremos cómo aprovechar la geolocalización de openmapstreet y automatizar el llenado de formularios a través de la información presentada en el mapa. Aquí te presentamos un resumen de las áreas clave que abordaremos:</p>
    </div>

    <!-- Línea Horizontal que ocupa el 75% y está centrada horizontalmente -->
    <div class="border w-75 mx-auto"></div>
    
    <div class="container mt-5 p-5">
        <div class="row">
            <div class="col-lg-6 order-lg-1" style="background-size: cover; background-position: center; background-image: url('https://th.bing.com/th/id/R.9f95d7fedfff0a11d4a78e8c389064d4?rik=cxr6FD2sYoHrHA&pid=ImgRaw&r=0');">
            </div>
            <div class="col-lg-6 order-lg-2 my-4 p-5">
                <div>
                    <h3>OpenMapStreet.</h3>
                    <p class="text-justify">"OpenMapStreet" no es un término común en la cartografía, pero parece referirse a la combinación de "OpenStreetMap" (OSM) y "Street View". OSM es un proyecto de mapeo colaborativo en línea que proporciona datos geográficos y mapas gratuitos, mientras que "Street View" se refiere a la función que ofrece vistas panorámicas de calles y carreteras a nivel del suelo, utilizada en servicios como Google Maps.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de Página -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; 2023 Mi Sitio Web</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>