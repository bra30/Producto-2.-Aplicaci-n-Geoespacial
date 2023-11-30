// Lógica para deshabilitar botones de región según el día de la semana
var diaSemana = new Date().getDay();
var buttons = document.querySelectorAll('.showRegion');
buttons.forEach(function (button) {
    button.disabled = true; // Se deshabilitan todos los botones de región inicialmente
});
switch (diaSemana) { // Se habilita el botón correspondiente al día de la semana actual
    case 1:
    case 1:
        document.querySelector('[data-region="Puebla Capital"]').disabled = false;
        break;
    case 2:
        document.querySelector('[data-region="Tehuacán"]').disabled = false;
        break;
    case 3:
        document.querySelector('[data-region="Atlixco"]').disabled = false;
        break;
    case 4:
        document.querySelector('[data-region="San Pedro Cholula"]').disabled = false;
        break;
    case 5:
        document.querySelector('[data-region="Zacatlán"]').disabled = false;
        break;
    default:
        break;
}
var routingControl;