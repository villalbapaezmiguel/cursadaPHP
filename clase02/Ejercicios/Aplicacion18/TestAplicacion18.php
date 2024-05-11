<?php
    //echo "hola";
    include('Garage.php');
    echo "hola";

    $_auto1 = new Auto('Fiat','Rojo',17000);
    $_auto2 = new Auto('Fiat','Rojo',17000);
    $_auto3 = new Auto('Honda','Blanco',50000);
    $_auto4 = new Auto('Bmw','Gris',17000);

    $_garaje = new Garage('Estacionamiento',5000);

    $_garaje->MostrarGarage();


    if($_garaje->Add($_auto1) == 0)
    {
        echo "Se agrego un auto";
    }else{
       echo "No se pudo agregar.."; 
    }








?>









