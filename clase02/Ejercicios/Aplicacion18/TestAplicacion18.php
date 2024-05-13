<?php
    //echo "hola";
    include('Garage.php');

    $_auto1 = new Auto('Fiat','Rojo',17000);
    $_auto2 = new Auto('Fiat','Rojo',17000);
    $_auto3 = new Auto('Honda','Blanco',50000);
    $_auto4 = new Auto('Bmw','Gris',17000);

    $_garaje = new Garage('Estacionamiento',5000);

    $_garaje->MostrarGarage();
    echo "<br>------------------------------------";


    if($_garaje->Add($_auto1) == 0)
    {
        echo "<br> Se agrego un auto 1 ";
    }else{
       echo "<br> No se pudo agregar."; 
    }
    $_garaje->MostrarGarage();


    if($_garaje->Add($_auto2) == 0)
    {
        echo "<br> Se agrego un auto 2";
    }else{
       echo "<br> No se pudo agregar.."; 
    }
    $_garaje->MostrarGarage();


    if($_garaje->Add($_auto3) == 0)
    {
        echo "<br> Se agrego un auto 3";
    }else{
       echo "<br> No se pudo agregar.."; 
    }

    $_garaje->MostrarGarage();

    if($_garaje->Add($_auto4) == 0)
    {
        echo "<br> Se agrego un auto 4";
    }else{
       echo "<br> No se pudo agregar.."; 
    }

    $_garaje->MostrarGarage();


    echo "<br>---------------------Elimiliar elementos---------------------";

    if($_garaje->Remove($_auto3) == 0)
    {
        echo "<br> Se elimino con exito..  <br>";
        $_garaje->MostrarGarage();
    }else{
        echo "<br> Ocurrio un error al eliminar";
    }




?>









