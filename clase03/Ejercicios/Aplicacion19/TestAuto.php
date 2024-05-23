<?php
/**Ejercicio 19 */
    include('Auto.php');

    $_auto1 = new Auto("Fiat","Rojo",50000);
    $_auto2 = new Auto("Fiat","Gris",250000);
    $_auto3 = new Auto("Honda","Negro",80000);
    $_auto4 = new Auto("Honda","Negro",250000);
    $_auto5 = new Auto("Honda","Negro",250000);
    Auto::LeerAutos('C:\xampp\htdocs\cursadaPHP\clase03\Ejercicios\Aplicacion19\ListaAutos.csv');
/*        
    Auto::MostrarAuto($_auto1);

    Auto::GuardarAuto($_auto1);
*/
    // Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al atributo precio.

    if($_auto3->AgregarImpuesto(1500) == 0)
    {
        echo "<br> El impuesto fue agregado..";
    }

    if($_auto4->AgregarImpuesto(1500) == 0)
    {
        echo "<br> El impuesto fue agregado..";
    }

    if($_auto5->AgregarImpuesto(1500) == 0)
    {
        echo "<br> El impuesto fue agregado..";
    }


    // Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado obtenido.

    $importeTotal = Auto::Add($_auto1,$_auto2);

    echo "<br>". "El importe total del auto1 : ". $_auto1->GetPrecio() . " + " . "auto2 : ". $_auto2->GetPrecio() . " = ". $importeTotal;


    // Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o n

    echo "<br>" . "El auto1 es igual al auto2 : " . $_auto1->Equals($_auto2);
    echo "<br>" . "El auto1 es igual al auto5 : " . $_auto1->Equals($_auto5);


    // Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)

    Auto::MostrarAuto($_auto1);
    Auto::MostrarAuto($_auto3);
    Auto::MostrarAuto($_auto5);





















?>