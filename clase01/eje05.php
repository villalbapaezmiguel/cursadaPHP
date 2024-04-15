<?php
//Villalba Paez Miguel Antonio
/*Aplicación Nº 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres” */


$num = 33;
$cadena = strval($num);
$enteroString = "";

switch (intval($cadena[0])) {
    case 2:
        $enteroString = "Veinte y ";
        break;
    case 3:
        $enteroString = "Treinta y ";
        break;
    case 4:
        $enteroString = "Cuarenta y ";
        break;
    case 5:
        $enteroString = "Cincuenta y ";
        break;
    case 6:
        $enteroString = "Sesenta y ";
        break;
}

switch (intval($cadena[1])) {
    case 1:
        $enteroString .= "Uno";
        break;
    case 2:
        $enteroString .= "Dos";
        break;
    case 3:
        $enteroString .= "Tres";
        break;
    case 4:
        $enteroString .= "Cuatro";
        break;
    case 5:
        $enteroString .= "Cinco";
        break;
    case 6:
        $enteroString .= "Seis";
        break;
    case 6:
        $enteroString .= "Siete";
        break;
    case 6:
        $enteroString .= "Ocho";
        break;
    case 6:
        $enteroString .= "Nueve";
        break;
    case 6:
        $enteroString .= "Diez";
        break;
}

echo "num : $num = $enteroString". "<br>";

//Otra solucion que pense , pero no se si es mejor que la anterior

$entero = 43;
$cadenaEntero = strval($entero);
$arrayDecenas = array('Veinte', 'Treinta', 'Cuarenta', 'Cincuenta', 'Sesenta');
$arrayUnidad = array('Uno', 'Dos', 'Tres', 'Cuatro', 'Cinco', 'Seis', 'Siete', 'Ocho', 'Nueve', 'Diez',);
$cadenaFormatoString = "";

for ($i = 0; $i <= 1; $i++) {

    //Decenas
    if ($i == 0) {
        switch ($cadenaEntero[$i]) {
            case 2:
                $cadenaFormatoString .= $arrayDecenas[0]. " y ";
                break;
            case 3:
                $cadenaFormatoString .= $arrayDecenas[1]. " y ";
                break;
            case 4:
                $cadenaFormatoString .= $arrayDecenas[2]. " y ";
                break;
            case 5:
                $cadenaFormatoString .= $arrayDecenas[3]. " y ";
                break;
            case 6:
                $cadenaFormatoString .= $arrayDecenas[4]. " y ";
                break;
        }
    } else if ($i == 1) {//Unidad
        switch ($cadenaEntero[$i]) {
            case 1:
                $cadenaFormatoString .= $arrayUnidad[0];
                break;
            case 2:
                $cadenaFormatoString .= $arrayUnidad[1];
                break;
            case 3:
                $cadenaFormatoString .= $arrayUnidad[2];
                break;
            case 4:
                $cadenaFormatoString .= $arrayUnidad[3];
                break;
            case 5:
                $cadenaFormatoString .= $arrayUnidad[4];
                break;
            case 6:
                $cadenaFormatoString .= $arrayUnidad[5];
                break;
            case 7:
                $cadenaFormatoString .= $arrayUnidad[6];
                break;
            case 8:
                $cadenaFormatoString .= $arrayUnidad[7];
                break;
            case 9:
                $cadenaFormatoString .= $arrayUnidad[8];
                break;
        }
    }    
}
echo "entero : $entero = ". $cadenaFormatoString;
