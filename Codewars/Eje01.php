<?php

/**Dada una cadena de dígitos, debes reemplazar cualquier dígito inferior a 5 con '0' y 
 * cualquier dígito 5 o superior con '1'. Devuelve la cadena resultante.
 * 
 */
function fake_bin(string $s): string {
  // Write your code here
    $arrayNumerico = array();
    $indice = 0;
    $nuevaCadena = "";
   //simplificar y arreglar 

    while (strlen($s) >= $indice) {
        # code...
        $arrayNumerico[$indice] = intval($s[$indice]);
        $indice++;

    }

    for ($i=0; $i < count($arrayNumerico); $i++) { 
        # code...
       if($arrayNumerico[$i] > 5)
       {
        $arrayNumerico[$i] = 0;
       }else if($arrayNumerico[$i] < 5 )
       {
        $arrayNumerico[$i] = 1;
       }
    }

    for ($i=0; $i < count($arrayNumerico); $i++) { 
        # code...

        $nuevaCadena .= $arrayNumerico[$i] ."";
    }

    
    return $nuevaCadena;

}

//fake_bin("hola como estas??");



?>