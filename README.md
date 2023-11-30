# Aplicación de Seguimiento de Ruta a Corralón en Puebla


Este repositorio contiene una aplicación web desarrollada con HTML, JavaScript, CSS, Bootstrap, PHP y utiliza la base de datos MySQL a través de PhpMyAdmin. La aplicación tiene como objetivo mostrar la ruta hacia un corralón en el estado de Puebla utilizando OpenStreetMap y LeafletMap

## Características.
- Diseño Responsivo: La aplicación está diseñada para adaptarse a diferentes dispositivos y tamaños de pantalla.
- Base de Datos: Utiliza MySQL a través de PhpMyAdmin para almacenar información sobre las ubicaciones y nodos en Puebla.
- Sesiones: Implementadas para dos roles: Admin y Cliente.
- Librerías y Frameworks: Utiliza Bootstrap para el diseño y LeafletMap para la visualización del mapa

## Funcionalidades


#### Rol Cliente
Antes de utilizar esta aplicación, asegúrate de tener los siguientes requisitos:
- Muestra la región en el día de la semana.
- Acceso restringido para consultar la ruta hacia un corralón.

#### Rol Admin
- Muestra la región en el día de la semana.
- Permite buscar el corralón o nodo específico en el mapa.
- Genera y muestra la ruta desde la ubicación actual.
- Ofrece un formulario autollenado para enviar al cliente con la ruta.



## Uso de la Aplicación


#### Requisitos Previos

- Asegúrate de tener acceso a un navegador web actualizado.
- La aplicación necesita acceso a PhpMyAdmin y una base de datos preconfigurada.


#### Configuración Inicial

1. Clona o descarga el repositorio en tu sistema local.
2. Configura la base de datos y asegúrate de que los datos de conexión estén correctamente  establecidos en los archivos PHP correspondientes.
3. Inicia el servidor web para PHP y la base de datos.


#### Acceso a la Aplicación

1. Accede a la aplicación a través de tu navegador web.
2. Para el rol de Cliente, inicia sesión con las credenciales correspondientes.
3.  Para el rol de Admin, utiliza las credenciales de administrador para acceder a las funcionalidades adicionales.


# Uso

Clona este repositorio en tu máquina local:
```
   git clone https://github.com/edmundogood/Producto-2.Geocalicacion.git
```

Abre el archivo index.html en tu navegador web. Puedes hacerlo simplemente haciendo doble clic en el archivo.
- Cliente: Puede visualizar la región actual y solicitar la ruta al corralón.
- Admin: Visualiza la región actual, busca y traza la ruta al corralón desde la ubicación actual, y genera un formulario autollenado para el cliente.


# Autor


 - Brayan Edmundo Perez Sanchez
 - Brandon Martin Romero Garcia
 - Erick Vazquez Vazquez 

# Contribuciones


¡Agradecemos las contribuciones y mejoras! Siéntete libre de bifurcar este repositorio y proponer cambios a través de solicitudes pull.

# Tecnologías utilizadas.
- HTML
- PHP
- JavaScrip.
- Leaflet: Biblioteca de mapas interactivos.
- Leaflet Routing Machine: Plugin para calcular rutas.
- Leaflet Draw: Plugin para dibujar elementos en el mapa.
- Bootstrap: Framework de diseño web.

# Créditos

Este proyecto utiliza varias bibliotecas de código abierto que hacen posible su funcionalidad. Agradecemos a los desarrolladores de estas bibliotecas y sus respectivas comunidades.
# Licencia

Este proyecto se encuentra bajo la licencia MIT - para obtener más detalles, consulta el archivo LICENSE.
