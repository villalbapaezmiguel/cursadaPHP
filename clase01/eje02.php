<?php

/**Aplicación Nº 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple. */


date_default_timezone_set('America/Argentina/Buenos_Aires');
$fechaActual = new DateTime();

echo "Fecha y hora actual " . $fechaActual->format('Y-m-d H:i:s') . "<br>";
echo "Fecha y hora actual " . $fechaActual->format('Y-m-d') . "<br>";
echo "Hora Actual " . $fechaActual->format('H:i:s') . "<br>";
echo "Mes " . $fechaActual->format('m');

$mes = intval($fechaActual->format('m'));

switch ($mes) {
    case 1: //enero
    case 2: //febrero
    case 3: //marzo
        echo "Estamos en la en Verano";
        break;
    case 4: //abril
    case 5: //mayo
    case 6: //junio
        echo "Estamos en la en Otoño";
        break;
    case 7: //julio 
        break;
    case 8: //agosto
        break;
    case 9: //septiembre
        break;
    case 10: //octubre
        break;
    case 11: //noviembre
        break;
    case 12: //diciembre
        break;
}
