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
<!-- Sección de Héroe con Fondo de Imagen -->
<div class="hero text-center bg-image p-5" style="background-image: url('https://th.bing.com/th/id/OIP._onvwjOu9447ZwMNvoG_jwHaDH?pid=ImgDet&rs=1');">
    <div class="container my-5">
        <h2 class="display-4 text-black">Corralones y OpenStreetMap</h2>
        <p class="lead text-black">Uso de OpenStreetMap para ubicar corralones y gestionar vehículos..
    </div>
</div>
<div class="container mt-3 p-5">
    <div class="row">
        <div class="col-md-12 col-lg-3">
            <div id="controls">
                <!-- Botones de control -->
                <div class="mb-3">
                    <div class="mb-3">
                    <!-- Botón para obtener la ubicación actual -->
                    <button id="myLocation" class="btn btn-success btn-block mb-3">
                        <i class="bi bi-geo"></i> Mi ubicación
                    </button>
                    <!-- Botones para mostrar ubicaciones de nodos -->
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0554, -98.3647">Corralon 01</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0671, -98.3631">Corralon 02</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0423, -98.3849">Corralon 03</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0597, -98.3772">Corralon 04</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0812, -98.3590">Corralon 05</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0746, -98.3951">Corralon 06</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0528, -98.4000">Corralon 07</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0809, -98.3759">Corralon 08</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0537, -98.3407">Corralon 09</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0872, -98.3790">Corralon 10</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0477, -98.3741">Corralon 11</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0688, -98.3438">Corralon 12</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0636, -98.3685">Corralon 13</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0704, -98.3584">Corralon 14</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0384, -98.3681">Corralon 15</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0648, -98.3915">Corralon 16</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0592, -98.3697">Corralon 17</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0723, -98.3869">Corralon 18</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0732, -98.3554">Corralon 19</button>
                    <button class="showNode btn btn-primary mb-2" data-coords="20.0491, -98.3937">Corralon 20</button>
                    <!-- Botón para quitar la ruta en el mapa -->
                    </div>
                        <button id="clearRoute" class="btn btn-danger btn-block disabled">Quitar Ruta</button>
                    </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-9">
            <div id="map" style="width: 100%; height: 550px;"></div> <!-- Contenedor del mapa -->
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

    var routingControl; // Variable para controlar las rutas en el mapa

    // Función para agregar nodos al mapa
    function addNode(coords, nodeName) {
        var marker = L.marker(coords);
        marker.bindPopup(nodeName).addTo(map);
    }

    // Función para borrar todos los nodos del mapa
    function clearNodes() {
        map.eachLayer(function (layer) {
            if (layer instanceof L.Marker) {
                map.removeLayer(layer);
            }
        });
    }

    // Función para desactivar los botones de nodo
    function disableNodeButtons() {
        var nodeButtons = document.querySelectorAll('.showNode');
        for (var i = 0; i < nodeButtons.length; i++) {
            nodeButtons[i].disabled = true;
            nodeButtons[i].classList.add('disabled');
        }
    }

    // Función para habilitar los botones de nodo
    function enableNodeButtons() {
        var nodeButtons = document.querySelectorAll('.showNode');
        for (var i = 0; i < nodeButtons.length; i++) {
            nodeButtons[i].disabled = false;
            nodeButtons[i].classList.remove('disabled');
        }
    }

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

    // Agrega un evento de escucha a los elementos del DOM con el id "controls"
    document.querySelector("#controls").addEventListener('click', function (e) {
        if (e.target.classList.contains('showNode')) { // Si se hace clic en un botón de nodo
            // Deshabilita el botón "Mi ubicación"
            var myLocationButton = document.getElementById('myLocation');
            myLocationButton.disabled = true;
            myLocationButton.classList.add('disabled');
            
            // Habilita el botón "Quitar Ruta"
            var clearRouteButton = document.getElementById('clearRoute');
            clearRouteButton.disabled = false;
            clearRouteButton.classList.remove('disabled');
    
            if (routingControl) map.removeControl(routingControl); // Quita el control de ruta anterior si existe
            clearNodes(); // Borra todos los nodos del mapa
            var coords = e.target.getAttribute('data-coords').split(',');
            var destination = L.latLng(coords);
            map.setView(destination, 13);
            navigator.geolocation.getCurrentPosition(function(position) {
                routingControl = L.Routing.control({
                    waypoints: [
                        L.latLng([position.coords.latitude, position.coords.longitude]),
                        destination
                    ]
                }).addTo(map);
            });
    
            // Desactiva los botones de nodo
            disableNodeButtons();
        } else if (e.target.id === 'myLocation') { // Si se hace clic en el botón "Mi ubicación"
            navigator.geolocation.getCurrentPosition(function(position) {
                map.setView([position.coords.latitude, position.coords.longitude], 13);
                if (routingControl) map.removeControl(routingControl);
                clearNodes();
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
                enableNodeButtons();
            });
        } else if (e.target.id === 'clearRoute') { // Si se hace clic en el botón "Quitar Ruta"
            if (routingControl) map.removeControl(routingControl);
            // Habilita los botones de nodo
            enableNodeButtons();
            // Deshabilita nuevamente el botón "Quitar Ruta"
            var clearRouteButton = document.getElementById('clearRoute');
            clearRouteButton.disabled = true;
            clearRouteButton.classList.add('disabled');
            
            // Habilita el botón "Mi ubicación"
            var myLocationButton = document.getElementById('myLocation');
            myLocationButton.disabled = false;
            myLocationButton.classList.remove('disabled');
        }
    });

    // Agrega Leaflet Draw para dibujar elementos en el mapa
    var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);
    var drawControl = new L.Control.Draw({
        edit: {
            featureGroup: drawnItems
        },
        draw: {
            marker: false, // Desactiva la herramienta de marcador
            polygon: false,
            circle: false,
            rectangle: false,
            polyline: {
                shapeOptions: {
                    color: 'blue'
                }
            }
        },
    });
    map.addControl(drawControl);

    // Evento que se activa cuando se crea un elemento dibujado en el mapa
    map.on('draw:created', function (e) {
        var type = e.layerType;
        var layer = e.layer;

        if (type === 'polyline') {
            if (routingControl) map.removeControl(routingControl);
            routingControl = L.Routing.control({
                waypoints: [
                    L.latLng(layer.getLatLngs()[0]),
                    L.latLng(layer.getLatLngs()[1])
                ]
            }).addTo(map);
        }

        drawnItems.addLayer(layer);
    });
</script>

<!-- Enlaces a bibliotecas de JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> <!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script> <!-- Popper.js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Bootstrap JavaScript -->
</body>
</html>
+