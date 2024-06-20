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


/*
Escriba una función que acepte una matriz de 10 números enteros (entre 0 y 9), 
que devuelva una cadena de esos números en forma de número de teléfono.

El formato devuelto debe ser correcto para poder completar este desafío.

¡No olvides el espacio después del paréntesis de cierre!
 */

 function createPhoneNumber($numbersArray) {
    // your code here

    if(count($numbersArray) <= 10)
    {
        if(validarEnteros($numbersArray))
        {
            
        }
    }
  }

  function validarEnteros($arrayEnteros) : int
  {
        /*
    for ($i=0; $i < count($numbersArray); $i++) { 
        # code...
    
        if(($numbersArray[$i] >= 0 && $numbersArray[$i] <= 9)!)
        {
            break;
            return -1;
        }          
    }
*/  
    return 0;
  }


/**Hubo un examen en tu clase y lo pasaste. ¡Felicidades!
Pero eres una persona ambiciosa. Quieres saber si eres mejor que el estudiante promedio
 de tu clase.

Recibirá una matriz con los puntajes de las pruebas de sus compañeros. 
¡Ahora calcula el promedio y compara tu puntuación!

Devuelve Verdadero si eres mejor; de lo contrario, ¡falso! */

function betterThanAverage($classPoints, $yourPoints) {
    // Your code here
    
  }












?>