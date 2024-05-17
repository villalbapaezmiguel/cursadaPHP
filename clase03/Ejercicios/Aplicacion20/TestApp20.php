<?php 
/*
include('/xampp/htdocs/clase03/Ejercicios/Aplicacion19/Auto.php');
include('Garage.php');*/

include('/xampp/htdocs/cursadaPHP/clase03/Ejercicios/Aplicacion20/Garage.php');


echo "hola Sos un muy buen programador";

$_auto1 = new Auto('Fiat','Rojo',500000);
$_auto2 = new Auto('Honda','Gris',17000);
$_auto3 = new Auto('BMW','Negro',150000);
$_auto4 = new Auto('Ferrari','Rojo',1000000);

$_garage = new Garage('anonimo',17000);

$_garage->Add($_auto1);
$_garage->Add($_auto2);
$_garage->Add($_auto3);
$_garage->Add($_auto4);

//Garage::GuardarGarge($_garage);

echo "<br>-----------------------";
$_arrayGarage = Garage::LeerGaragesCSV('ListaGarage.csv');

foreach($_arrayGarage as $_valor)
{
    echo "<br>" . $_valor->MostrarGarage();

}

/**PODER DESARROLLAR LA FUNCION GuardarGarageCsv y La funcion LeerGarageCsv 
 * tenemos que entender que hacer el codigo que nos tira chatGTP para poder reahacerlo nosotros 
 * las funciones en si ya estan hechas pero sino lo podemos entender no tiene caso , igual tenemos
 * algunos error por este motivo
 * 
 * dale que vos podes genio ;)
 */
































