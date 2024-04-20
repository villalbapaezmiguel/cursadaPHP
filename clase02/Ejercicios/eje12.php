<?php
//Villalba Paez Miguel Antonio
/*Aplicación No 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”. */


function invertirCadena($cadena)
{
    return array_reverse($cadena);
}

$arrayCaracteres = ["M","I","G","U","E","L"];

$arrayInvertido = invertirCadena($arrayCaracteres);

foreach($arrayInvertido as $valor)
{
    echo $valor . "<br>";
}









?>