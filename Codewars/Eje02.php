<?php
/**En este kata crearás una función que toma una lista y devuelve una lista con el orden 
 * inverso. */
function reverseList(array $list): array 
{
    $arrayRevertido = array_reverse($list);

    return $arrayRevertido;
}
  
/**Escriba una función que convierta la cadena de entrada a mayúsculas. */
function makeUpperCase(string $input): string {
    return strtoupper($input);    
  }


/**En este sencillo ejercicio, creará un programa que tomará dos listas de números enteros, 
 * a y b. Cada lista constará de 3 números enteros positivos superiores a 0, 
 * que representan las dimensiones de los cuboides a y b. Debes encontrar la 
 * diferencia de volúmenes de los cuboides sin importar cuál sea mayor.

Por ejemplo, si los parámetros pasados ​​son ([2, 2, 3], [5, 4, 1]), 
el volumen de a es 12 y el volumen de b es 20. Por lo tanto, la función 
debería devolver 8.

Su función se probará con ejemplos prediseñados y aleatorios. */  

function findDifference($a, $b) 
{
    /*$acumuladorA = 0;
    $acumuladorB = 0;
    $resultado = 0;
    if(is_array($a) && is_array($b))
    {
        $acumuladorA = obtenerDimensionesCuboides($a);
        $acumuladorB = obtenerDimensionesCuboides($b);

        $resultado = $acumuladorA - $acumuladorB;
        if($resultado <= 0)
        {
            $resultado = $acumuladorB - $acumuladorA;
        }
    }*/
    $resultado = array_product($a) - array_product($b);
    if($resultado < 0)
    {
        $resultado = array_product($b) - array_product($a);
    }

    return $resultado; 
    
}

function obtenerDimensionesCuboides($lista) : int
{
    $acumulador = 0;
    if(count($lista) >= 3)
    {
        $acumulador = $lista[0]*$lista[1]*$lista[2];
    }

    return $acumulador;
}


/**Un isograma es una palabra que no tiene letras repetidas, consecutivas o no 
 * consecutivas. 
 * Implemente una función que determine si una cadena que contiene solo letras es un isograma. Suponga que la cadena vacía es un isograma. Ignorar mayúsculas y minúsculas. */
?>