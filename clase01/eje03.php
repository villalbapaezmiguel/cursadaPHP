<?php 
//Villalba Paez Miguel Antonio

/**Aplicación Nº 3 (Obtener el valor del medio)
Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido. Ejemplo 1: $a
= 6; $b = 9; $c = 8; => se muestra 8.
Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”
 */

$a = 2;
$b = 3;
$c = 3;

$array = array($a , $b, $c);
sort($array);

if($array[0] != $array[1] && $array[1] != $array[2])
{
    echo "A = $a; B = $b; C=$c; => "."El numero del Medio es ". $array[1];
}else{
    echo "A = $a; B = $b; C=$c; =>  NO existe el numero del medio";
}

?>