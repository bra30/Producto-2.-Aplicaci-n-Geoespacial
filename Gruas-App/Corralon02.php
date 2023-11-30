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
                        <i class="bi bi-geo"></i> Mi ubicación En Tehuacán
                    </button>
                    <!-- Botones para mostrar ubicaciones de nodos -->
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4474,-97.3915">Corralon 01</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4575,-97.3861">Corralon 02</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4617,-97.3936">Corralon 03</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4652,-97.3916">Corralon 04</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4579,-97.3951">Corralon 05</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4563,-97.3985">Corralon 06</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4501,-97.3963">Corralon 07</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4509,-97.4011">Corralon 08</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4634,-97.3865">Corralon 09</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4637,-97.3814">Corralon 10</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4698,-97.3897">Corralon 11</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4712,-97.3839">Corralon 12</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4736,-97.3831">Corralon 13</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4779,-97.3890">Corralon 14</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4805,-97.3826">Corralon 15</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4863,-97.3867">Corralon 16</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4897,-97.3789">Corralon 17</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4931,-97.3845">Corralon 18</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.4972,-97.3802">Corralon 19</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="18.5013,-97.3766">Corralon 20</button>
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
    addNode([18.4474, -97.3915], "Corralon 1");
    addNode([18.4575, -97.3861], "Corralon 2");
    addNode([18.4617, -97.3936], "Corralon 3");
    addNode([18.4652, -97.3916], "Corralon 4");
    addNode([18.4579, -97.3951], "Corralon 5");
    addNode([18.4563, -97.3985], "Corralon 6");
    addNode([18.4501, -97.3963], "Corralon 7");
    addNode([18.4509, -97.4011], "Corralon 8");
    addNode([18.4634, -97.3865], "Corralon 9");
    addNode([18.4637, -97.3814], "Corralon 10");
    addNode([18.4698, -97.3897], "Corralon 11");
    addNode([18.4712, -97.3839], "Corralon 12");
    addNode([18.4736, -97.3831], "Corralon 13");
    addNode([18.4779, -97.3890], "Corralon 14");
    addNode([18.4805, -97.3826], "Corralon 15");
    addNode([18.4863, -97.3867], "Corralon 16");
    addNode([18.4897, -97.3789], "Corralon 17");
    addNode([18.4931, -97.3845], "Corralon 18");
    addNode([18.4972, -97.3802], "Corralon 19");
    addNode([18.5013, -97.3766], "Corralon 20");

    // Agrega un evento de escucha a los elementos del DOM con el id "controls"
    document.querySelector("#controls").addEventListener('click', function (e) {
        if (e.target.classList.contains('showNode')) { // Si se hace clic en un botón de nodo
            var coords = e.target.getAttribute('data-coords').split(',');
            showNode(coords);
        } else if (e.target.id === 'myLocation') { // Si se hace clic en el botón "Mi ubicación"
            navigator.geolocation.getCurrentPosition(function(position) {
                map.setView([position.coords.latitude, position.coords.longitude], 13);
                clearNodes(); // Borra todos los nodos existentes
                // Agrega nodos del Corralon 01 y 02
                addNode([18.4474, -97.3915], "Corralon 1");
                addNode([18.4575, -97.3861], "Corralon 2");
                addNode([18.4617, -97.3936], "Corralon 3");
                addNode([18.4652, -97.3916], "Corralon 4");
                addNode([18.4579, -97.3951], "Corralon 5");
                addNode([18.4563, -97.3985], "Corralon 6");
                addNode([18.4501, -97.3963], "Corralon 7");
                addNode([18.4509, -97.4011], "Corralon 8");
                addNode([18.4634, -97.3865], "Corralon 9");
                addNode([18.4637, -97.3814], "Corralon 10");
                addNode([18.4698, -97.3897], "Corralon 11");
                addNode([18.4712, -97.3839], "Corralon 12");
                addNode([18.4736, -97.3831], "Corralon 13");
                addNode([18.4779, -97.3890], "Corralon 14");
                addNode([18.4805, -97.3826], "Corralon 15");
                addNode([18.4863, -97.3867], "Corralon 16");
                addNode([18.4897, -97.3789], "Corralon 17");
                addNode([18.4931, -97.3845], "Corralon 18");
                addNode([18.4972, -97.3802], "Corralon 19");
                addNode([18.5013, -97.3766], "Corralon 20");

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
