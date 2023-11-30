// Evento click en los controles
document.querySelector("#controls").addEventListener('click', function (e) {
    if (e.target.classList.contains('showRegion')) { // Si se hace clic en un botón de región
        var regionName = e.target.getAttribute('data-region');
        if (routingControl) map.removeControl(routingControl); // Se elimina el control de enrutamiento si existe
        addNodesInRegion(regionName); // Se agregan nodos en la región seleccionada
    } else if (e.target.id === 'myLocation') { // Si se hace clic en el botón de 'Mi ubicación'
        if (routingControl) map.removeControl(routingControl); // Se elimina el control de enrutamiento si existe
        clearNodesAndRoutes(); // Se limpian los nodos y las rutas
        map.locate({ setView: true, maxZoom: 13 }); // Se localiza la ubicación del usuario en el mapa

        // Una vez que la ubicación del usuario se haya localizado, se agrega un marcador en esa ubicación
        function onLocationFound(e) {
            var myLocation = e.latlng;
            addNode([myLocation.lat, myLocation.lng], "Mi ubicación actual", "MyLocation");
        }

        map.on('locationfound', onLocationFound);
    } else if (e.target.id === 'clearRoute') { // Si se hace clic en el botón de 'Quitar Ubicaciones'
        clearNodesAndRoutes(); // Se limpian los nodos y las rutas
    }
});
