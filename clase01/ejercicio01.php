<?php
/*Villalba Paez Miguel Antonio

*Aplicación Nº 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron. */

$acumulador = 1;
$contador = 0;

while(true)
{
    $acumulador = $acumulador + $contador;
    $contador++;
    echo "$acumulador <br>";
    if($acumulador >= 1000)
    {
        break;
    }
}

    echo "La cantidad de numeros sumados son : $contador";





?>