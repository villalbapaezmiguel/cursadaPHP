<?php
//Villalba Paez Miguel Antonio
/*Aplicación Nº 10 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays */

$lapicera1 = [
    'color' => 'Negro',
    'marca' => 'Nahueles',
    'trazo' => 'fino',
    'precio' => 400
];

$lapicera2 = [
    'color' => 'Azul',
    'marca' => 'Tomatin',
    'trazo' => 'grueso',
    'precio' => 500
];
$lapicera3 = [
    'color' => 'Azul',
    'marca' => 'Cookis',
    'trazo' => 'Fino',
    'precio' => 1500
];


$arrayAsociativo  = [$lapicera1 , $lapicera2 , $lapicera3 ];

foreach($arrayAsociativo as $elemento)
{
    foreach($elemento as $valor)
    {
        echo $valor . "<br>";
    }
    echo "-------------------<br>";
}




?>