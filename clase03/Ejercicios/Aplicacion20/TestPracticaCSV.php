<?php
include('/xampp/htdocs/cursadaPHP/clase03/Ejercicios/Aplicacion20/Garage.php');
//Ejercicio 20
/*
$_garage = new Garage("Anonimo",17000);

$_garage->Add(new Auto("Fita","Rojo",20000));
$_garage->Add(new Auto("Honda","Gris",330000));
$_garage->Add(new Auto("Ferrari","Rojo",75000));

$_garage->MostrarGarage();
*/
//$miGarage = new Garage("Mi Garage", 50);
//$miGarage->Add(new Auto("Toyota", "Corolla", "Rojo"));
//$miGarage->Add(new Auto("Ford", "Focus", "Azul"));

// Guardar el garage en un archivo CSV
//Garage::AltaGarageCSV($miGarage, 'garages.csv');

// Leer garages desde el archivo CSV
$garages = Garage::LeerGarageCSV('garages.csv');
foreach ($garages as $garage) {
    $garage->MostrarGarage();
}

echo "Migue sos maquinaa!!!";

