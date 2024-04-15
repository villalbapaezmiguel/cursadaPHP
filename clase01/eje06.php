<?php
//Villalba Paez Miguel Antonio
/*Aplicación Nº 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado. */

$arrayEnteros = [];
$acumulador = 0;
$promedio = 0;

for ($i=0; $i < 5; $i++) { 
    # code...
    $arrayEnteros[$i] = rand(1,10);
    $acumulador += $arrayEnteros[$i];
}

$promedio = $acumulador /5;

if($promedio > 6)
{
    echo "El promedio $promedio es Mayor a 6";
}else if( $promedio == 6)
{
    echo "El promedio $promedio es Igual a 6";
}else {
    echo "El promedio $promedio es Menor a 6";
}



?>