<?php
//Villalba Paez MIguel Antonio
/*Aplicación Nº 13 (Invertir palabra)
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán: 1 si la palabra
pertenece a algún elemento del listado.
0 en caso contrario. */



function validarCadena($palabra , $maximo)
{
    $arrayPalabras = ['Recuperatorio','Parcial','Programacion'];
    if(strlen($palabra) <= $maximo )
    {
        if(in_array($palabra, $arrayPalabras))
        {
            return 1;
        }else{
            return 0;
        }
    }
    return 0;
}

$palabra = "Programacion";

if(validarCadena($palabra,12))
{
    echo "la palabra pertenece a algun elemento";
}else{
    echo "NO pertenece a ningun elemento";
}










?>