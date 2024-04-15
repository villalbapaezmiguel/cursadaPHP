<?php
//Villalba Paez MIguel Antonio
/*Aplicación Nº 9 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras. */

$lapiceras = array (
    $lapicera1 = [
        'color' => 'Negro',
        'marca' => 'Miguelito',
        'trazo' => 'fino',
        'precio' => 1500
    ],
    $lapicera2 = [
        'color' => 'Azul',
        'marca' => 'Cokis',
        'trazo' => 'Grueso',
        'precio' => 400
    ],
    $lapicera3 = [
        'color' => 'Azul',
        'marca' => 'Congo',
        'trazo' => 'fino',
        'precio' => 1000
    ],
);

foreach ($lapiceras as $elemento) {
    # code...
    foreach($elemento as $valor)
    {
        echo $valor . "<br>";
    }
    echo "----------------<br>";

}










?>