var map = L.map('map').setView([19.0413, -98.2062], 13);
var tileLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
}).addTo(map);

var regions = {
    "Puebla Capital": [
        [19.0413, -98.2062], // Coordenadas de Puebla Capital
        [19.0453, -98.1997], // Coordenadas de otra ubicación en Puebla Capital
        [19.0413, -98.2062],
        [19.0453, -98.1997],
        [19.0472, -98.2068],
        [19.0336, -98.2065],
        [19.0465, -98.1915],
        [19.0318, -98.2022],
        [19.0441, -98.1950],
        [19.0273, -98.2179],
        [19.0557, -98.1925],
        [19.0367, -98.2083],
        [19.0478, -98.1854],
        [19.0522, -98.2110],
        [19.0321, -98.1856],
        [19.0402, -98.2207],
        [19.0254, -98.1989],
        [19.0487, -98.2032],
        [19.0389, -98.1995],
        [19.0433, -98.2141],
        [19.0347, -98.1936],
        [19.0504, -98.2076]
        // Puedes agregar más ubicaciones para Puebla Capital aquí
    ],
    "Tehuacán": [
        [18.4474, -97.3915], // Coordenadas de Tehuacán
        [18.4575, -97.3861], // Coordenadas de otra ubicación en Tehuacán
        // Puedes agregar más ubicaciones para Tehuacán aquí
        [18.4617, -97.3936],
        [18.4652, -97.3916],
        [18.4579, -97.3951],
        [18.4563, -97.3985],
        [18.4501, -97.3963],
        [18.4509, -97.4011],
        [18.4634, -97.3865],
        [18.4637, -97.3814],
        [18.4698, -97.3897],
        [18.4712, -97.3839],
        [18.4736, -97.3831],
        [18.4779, -97.3890],
        [18.4805, -97.3826],
        [18.4863, -97.3867],
        [18.4897, -97.3789],
        [18.4931, -97.3845],
        [18.4972, -97.3802],
        [18.5013, -97.3766]
    ],
    "Atlixco": [
        [18.9036, -98.4376], // Coordenadas de Atlixco
        [18.8944, -98.4464], // Coordenadas de otra ubicación en Atlixco
        // Puedes agregar más ubicaciones para Atlixco aquí
        [18.8998, -98.4372],
        [18.8957, -98.4240],
        [18.9013, -98.4237],
        [18.8887, -98.4162],
        [18.8781, -98.4518],
        [18.8827, -98.4345],
        [18.8956, -98.4505],
        [18.9105, -98.4421],
        [18.9136, -98.4258],
        [18.8990, -98.4119],
        [18.8871, -98.4314],
        [18.8924, -98.4063],
        [18.8718, -98.4237],
        [18.8910, -98.4444],
        [18.9029, -98.4326],
        [18.8813, -98.4198],
        [18.9054, -98.4383],
        [18.8936, -98.4196]
    ],
    "San Pedro Cholula": [
        [19.0646, -98.3089], // Coordenadas de San Pedro Cholula
        [19.0550, -98.3097], // Coordenadas de otra ubicación en San Pedro Cholula
        // Puedes agregar más ubicaciones para San Pedro Cholula aquí
        [19.0620, -98.3088],
        [19.0683, -98.3102],
        [19.0551, -98.3014],
        [19.0597, -98.2999],
        [19.0654, -98.3147],
        [19.0612, -98.3156],
        [19.0723, -98.3061],
        [19.0485, -98.2946],
        [19.0751, -98.3044],
        [19.0497, -98.3175],
        [19.0692, -98.2917],
        [19.0663, -98.2979],
        [19.0785, -98.3114],
        [19.0736, -98.2991],
        [19.0605, -98.2911],
        [19.0569, -98.3070],
        [19.0678, -98.3184],
        [19.0707, -98.2883]
    ],
    "Zacatlán": [
        [20.0554, -98.3647], // Coordenadas de Zacatlán
        [20.0671, -98.3631], // Coordenadas de otra ubicación en Zacatlán
        // Puedes agregar más ubicaciones para Zacatlán aquí
        [20.0423, -98.3849],
        [20.0597, -98.3772],
        [20.0812, -98.3590],
        [20.0746, -98.3951],
        [20.0528, -98.4000],
        [20.0809, -98.3759],
        [20.0537, -98.3407],
        [20.0872, -98.3790],
        [20.0477, -98.3741],
        [20.0688, -98.3438],
        [20.0636, -98.3685],
        [20.0704, -98.3584],
        [20.0384, -98.3681],
        [20.0648, -98.3915],
        [20.0592, -98.3697],
        [20.0723, -98.3869],
        [20.0732, -98.3554],
        [20.0491, -98.3937]
    ]
};
var routingControl; // Variable para el control de enrutamiento   
// Función para agregar un nodo al mapa con un marcador y una forma poligonal
function addNode(coords, nodeName, regionName) {
    var marker = L.marker(coords);
    marker.bindPopup(nodeName).addTo(map); // Se agrega un marcador al mapa
    // Opciones para la forma poligonal basadas en la región
    var polygonOptions = {
        color: '',
        fillColor: '',
        fillOpacity: 0.4
    };
    // Configuración de colores de la forma poligonal según la región
    switch (regionName) {
        case 'Puebla Capital':
            polygonOptions.color = 'blue';
            polygonOptions.fillColor = 'yellow';
            break;
        case 'Tehuacán':
            polygonOptions.color = 'green';
            polygonOptions.fillColor = 'orange';
            break;
        case 'Atlixco':
            polygonOptions.color = 'red';
            polygonOptions.fillColor = 'purple';
            break;
        case 'San Pedro Cholula':
            polygonOptions.color = 'black';
            polygonOptions.fillColor = 'cyan';
            break;
        case 'Zacatlán':
            polygonOptions.color = 'brown';
            polygonOptions.fillColor = 'pink';
            break;
        default:
            polygonOptions.color = 'gray';
            polygonOptions.fillColor = 'white';
            break;
    }

    // Se crea una forma poligonal con las opciones configuradas y se agrega al mapa
    var polygon = L.polygon(regions[regionName], polygonOptions).addTo(map);
}

// Función para limpiar nodos y rutas del mapa
function clearNodesAndRoutes() {
    map.eachLayer(function (layer) {
        if (layer instanceof L.Marker || (layer instanceof L.Polyline && layer !== tileLayer)) {
            map.removeLayer(layer); // Se eliminan los marcadores y las rutas
        }
    });
}

// Función para agregar nodos en una región específica
function addNodesInRegion(regionName) {
    var region = regions[regionName];
    if (region) {
        clearNodesAndRoutes(); // Se limpian los nodos y las rutas existentes
        region.forEach(function (coords, index) {
            addNode(coords, regionName + " - Ubicación " + (index + 1), regionName); // Se agregan nodos en la región
        });
        map.setView(region[0], 13); // Se establece la vista del mapa en la región
    }
}
