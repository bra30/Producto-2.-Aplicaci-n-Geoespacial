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
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa con Nodos y Botones por Región</title>

    <!-- Enlaces a hojas de estilo -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" /> <!-- Hoja de estilo de Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" /> <!-- Hoja de estilo de Leaflet Routing Machine -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Hoja de estilo de Bootstrap -->

    <!-- Enlaces a scripts JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> <!-- Biblioteca Leaflet -->
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script> <!-- Plugin Leaflet Routing Machine -->
    <style>
        .leaflet-popup-content-wrapper {
            background-color: rgba(255, 255, 255, 1); /* Fondo de la ventana emergente */
            color: #000; /* Color del texto */
        }
        .leaflet-popup-tip-container {
            display: none; /* Oculta la punta de la ventana emergente */
        }
    </style>
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
                    <a href="cliente.php" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opciones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item">Explorar Mapa</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Sección de Héroe con Fondo de Imagen -->
<div class="hero text-center bg-image p-5" style="background-image: url('https://th.bing.com/th/id/OIP._onvwjOu9447ZwMNvoG_jwHaDH?pid=ImgDet&rs=1');">
    <div class="container my-5">
        <h2 class="display-4 text-black">Ubicar Corralón por Región.</h2>
        <p class="lead text-black">Las ubicaciones de los almacenes por día.</p>
    </div>
</div>

<div class="container mt-3 p-5">
    <div class="row">
        <div class="col-md-4">
            <div id="controls">
                <!-- Botones de control -->
                <div class="mb-3">
                    <button id="myLocation" class="btn btn-success btn-block"><i class="bi bi-geo"></i> Mi ubicación</button> <!-- Botón para obtener la ubicación actual -->
                </div>
                <!-- Botones para mostrar ubicaciones en diferentes regiones -->
                <div class="mb-3">
                    <button class="showRegion btn btn-primary btn-block" data-region="Puebla Capital">Puebla Capital</button>
                </div>
                <div class="mb-3">
                    <button class="showRegion btn btn-primary btn-block" data-region="Tehuacán">Tehuacán</button>
                </div>
                <div class="mb-3">
                    <button class="showRegion btn btn-primary btn-block" data-region="Atlixco">Atlixco</button>
                </div>
                <div class="mb-3">
                    <button class="showRegion btn btn-primary btn-block" data-region="San Pedro Cholula">San Pedro Cholula</button>
                </div>
                <div class="mb-3">
                    <button class="showRegion btn btn-primary btn-block" data-region="Zacatlán">Zacatlán</button>
                </div>
                <div>
                    <button id="clearRoute" class="btn btn-danger btn-block">Quitar Ubicaciones</button> <!-- Botón para quitar la ruta en el mapa -->
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div id="map" style="width: 100%; height: 365px;"></div> <!-- Contenedor del mapa -->
        </div>
    </div>
</div>
<footer class="bg-dark text-light text-center py-2">
    <p>&copy; 2023 OpenStreetMap</p>
</footer>

<!-- Include Leaflet and Map Initialization -->
<script src="./JS/leafletMap.js"></script>

<!-- Include Regions and Markers -->
<script src="./JS/regionsMarkers.js"></script>

<!-- Include Day-Based Button Enablement Logic -->
<script src="./JS/buttonEnablement.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
