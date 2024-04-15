<?php
//Villalba Paez Miguel Antonio
/*Aplicación Nº 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números
utilizando las estructuras while y foreach */

$arrayImpares = [];
$aux = 0;
$indice = 0;

while(count($arrayImpares) <= 10)
{
    $aux = rand(1,100);
    if($aux % 2 != 0)
    {
        $arrayImpares[$indice] = $aux;
        $indice ++;
    }
}
echo "Impresion con For <br>" ;
for ($i=0; $i < 10; $i++) { 
    # code...

    echo "Impar : ". $arrayImpares[$i] . "<br>";
}
echo "Impresion con while <br>" ;
$indice = 0;
while(true)
{
    echo "Impar : ". $arrayImpares[$indice] . "<br>";
    $indice++;
    if($indice == 10)
    {
        break;
    }
}
echo "Impresion con foreach <br>" ;

foreach($arrayImpares as $valor)
{
    echo "Impar : ". $valor . "<br>";
}





?>