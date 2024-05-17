<?php
include('/xampp/htdocs/cursadaPHP/clase03/Ejercicios/PracticaCSV/Garage.php');

$_garage = new Garage("Anonimo",17000);

$_garage->Add(new Auto("Fita","Rojo",20000));
$_garage->Add(new Auto("Honda","Gris",330000));
$_garage->Add(new Auto("Ferrari","Rojo",75000));

$_garage->MostrarGarage();





