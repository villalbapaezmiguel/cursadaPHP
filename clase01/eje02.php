<?php
//Villalba Paez Miguel Antonio
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
    case 1:
    case 2:
    case 12:
        $estacion = 'Verano';
        break;
    case 3:
    case 4:
    case 5:
        $estacion = 'Otoño';
        break;
    case 6:
    case 7:
    case 8:
        $estacion = 'Invierno';
        break;
    case 9:
    case 10:
    case 11:
        $estacion = 'Primavera';
        break;
}

echo "Estacion $estacion";

