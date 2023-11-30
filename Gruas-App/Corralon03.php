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
    <title>Mapa con Nodos y Botones</title>

    <!-- Enlaces a hojas de estilo -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" /> <!-- Hoja de estilo de Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" /> <!-- Hoja de estilo de Leaflet Routing Machine -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Hoja de estilo de Bootstrap -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.css" /> <!-- Hoja de estilo de Leaflet Draw -->

    <!-- Enlaces a scripts JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> <!-- Biblioteca Leaflet -->
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script> <!-- Plugin Leaflet Routing Machine -->
    <script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script> <!-- Plugin Leaflet Draw -->

    <style>
        .leaflet-popup-content-wrapper {
            background-color: rgba(255, 255, 255, 1); /* Fondo de la ventana emergente */
            color: #000; /* Color del texto */
        }
        .leaflet-popup-tip-container {
            display: none; /* Oculta la punta de la ventana emergente */
        }
        .disabled {
            opacity: 0.5; /* Estilo para botones desactivados */
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
                    <a href="admin.php" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opciones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="Mapa01.php">Explorar Mapa</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesion</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-3 p-5">
    <div class="row">
        <div class="col-md-12 col-lg-3">
            <div id="controls">
                <!-- Botones de control -->
                <div class="mb-3">
                    <!-- Botón para obtener la ubicación actual -->
                    <button id="myLocation" class="btn btn-success btn-block mb-3">
                        <i class="bi bi-geo"></i> Mi ubicación En Atlixco
                    </button>
                    <!-- Botones para mostrar ubicaciones de nodos -->
                    <button class="showNode btn btn-primary mb-2" data-coords="18.9036,-98.4376">Atlixco 1</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.8944,-98.4464">Atlixco 2</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.8998,-98.4372">Atlixco 3</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.8957,-98.4240">Atlixco 4</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.9013,-98.4237">Atlixco 5</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.8887,-98.4162">Atlixco 6</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.8781,-98.4518">Atlixco 7</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.8827,-98.4345">Atlixco 8</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.8956,-98.4505">Atlixco 9</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.9105,-98.4421">Atlixco 10</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.9136,-98.4258">Atlixco 11</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.8990,-98.4119">Atlixco 12</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.8871,-98.4314">Atlixco 13</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.8924,-98.4063">Atlixco 14</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.8718,-98.4237">Atlixco 15</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.8910,-98.4444">Atlixco 16</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.9029,-98.4326">Atlixco 17</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.8813,-98.4198">Atlixco 18</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.9054,-98.4383">Atlixco 19</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.8936,-98.4196">Atlixco 20</button>
                    <div class="mt-3">
                        <a href="4.html" class="btn btn-outline-warning btn-block">Trazar alguna ruta</a>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-12 col-lg-9">
                <div id="map" style="width: 100%; height: 590px;"></div> <!-- Contenedor del mapa -->
            </div>
    </div>
</div>
<footer class="bg-dark text-light text-center py-2">
    <p>&copy; 2023 OpenStreetMap</p>
</footer>
<script>
    var map = L.map('map').setView([19.0413, -98.2062], 13); // Crea un objeto de mapa y lo configura con una vista inicial
    var tileLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map); // Agrega una capa de mosaico de OpenStreetMap al mapa

    // Arreglo para almacenar los nodos mostrados previamente
    var shownNodes = [];

    // Función para agregar nodos al mapa
    function addNode(coords, nodeName) {
        var marker = L.marker(coords);
        marker.bindPopup(nodeName).addTo(map);
        shownNodes.push(marker); // Agrega el nodo al arreglo de nodos mostrados
    }

    // Función para borrar todos los nodos del mapa
    function clearNodes() {
        shownNodes.forEach(function (marker) {
            map.removeLayer(marker);
        });
        shownNodes = []; // Limpia el arreglo de nodos mostrados
    }

    // Función para mostrar un nodo en el mapa
    function showNode(coords) {
        clearNodes(); // Borra todos los nodos existentes
        var destination = L.latLng(coords);
        map.setView(destination, 13);
        addNode(coords, "Corralon");

        // Desactiva los otros botones de nodo
        var nodeButtons = document.querySelectorAll('.showNode');
        for (var i = 0; i < nodeButtons.length; i++) {
            if (nodeButtons[i] !== e.target) {
                nodeButtons[i].disabled = true;
                nodeButtons[i].classList.add('disabled');
            }
        }
    }

    // Agrega todos los nodos al cargar el mapa
    addNode([18.9036, -98.4376], "Corralon 1");
    addNode([18.8944, -98.4464], "Corralon 2");
    addNode([18.8998, -98.4372], "Corralon 3");
    addNode([18.8957, -98.4240], "Corralon 4");
    addNode([18.9013, -98.4237], "Corralon 5");
    addNode([18.8887, -98.4162], "Corralon 6");
    addNode([18.8781, -98.4518], "Corralon 7");
    addNode([18.8827, -98.4345], "Corralon 8");
    addNode([18.8956, -98.4505], "Corralon 9");
    addNode([18.9105, -98.4421], "Corralon 10");
    addNode([18.9136, -98.4258], "Corralon 11");
    addNode([18.8990, -98.4119], "Corralon 12");
    addNode([18.8871, -98.4314], "Corralon 13");
    addNode([18.8924, -98.4063], "Corralon 14");
    addNode([18.8718, -98.4237], "Corralon 15");
    addNode([18.8910, -98.4444], "Corralon 16");
    addNode([18.9029, -98.4326], "Corralon 17");
    addNode([18.8813, -98.4198], "Corralon 18");
    addNode([18.9054, -98.4383], "Corralon 19");
    addNode([18.8936, -98.4196], "Corralon 20");

    // Agrega un evento de escucha a los elementos del DOM con el id "controls"
    document.querySelector("#controls").addEventListener('click', function (e) {
        if (e.target.classList.contains('showNode')) { // Si se hace clic en un botón de nodo
            var coords = e.target.getAttribute('data-coords').split(',');
            showNode(coords);
        } else if (e.target.id === 'myLocation') { // Si se hace clic en el botón "Mi ubicación"
            navigator.geolocation.getCurrentPosition(function(position) {
                map.setView([position.coords.latitude, position.coords.longitude], 13);
                clearNodes(); // Borra todos los nodos existentes
                // Agrega todos los nodos al cargar el mapa
                addNode([20.0554, -98.3647], "Corralon 1");
                addNode([20.0671, -98.3631], "Corralon 2");
                addNode([20.0423, -98.3849], "Corralon 3");
                addNode([20.0597, -98.3772], "Corralon 4");
                addNode([20.0812, -98.3590], "Corralon 5");
                addNode([20.0746, -98.3951], "Corralon 6");
                addNode([20.0528, -98.4000], "Corralon 7");
                addNode([20.0809, -98.3759], "Corralon 8");
                addNode([20.0537, -98.3407], "Corralon 9");
                addNode([20.0872, -98.3790], "Corralon 10");
                addNode([20.0477, -98.3741], "Corralon 11");
                addNode([20.0688, -98.3438], "Corralon 12");
                addNode([20.0636, -98.3685], "Corralon 13");
                addNode([20.0704, -98.3584], "Corralon 14");
                addNode([20.0384, -98.3681], "Corralon 15");
                addNode([20.0648, -98.3915], "Corralon 16");
                addNode([20.0592, -98.3697], "Corralon 17");
                addNode([20.0723, -98.3869], "Corralon 18");
                addNode([20.0732, -98.3554], "Corralon 19");
                addNode([20.0491, -98.3937], "Corralon 20");

                // Habilita los botones de nodo
                var nodeButtons = document.querySelectorAll('.showNode');
                for (var i = 0; i < nodeButtons.length; i++) {
                    nodeButtons[i].disabled = false;
                    nodeButtons[i].classList.remove('disabled');
                }
            });
        }
    });
</script>

<!-- Enlaces a bibliotecas de JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> <!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script> <!-- Popper.js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Bootstrap JavaScript -->
</body>
</html>
