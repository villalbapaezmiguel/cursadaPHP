<?php
//Villalba Paez Miguel Antonio
    include('eje17.php');

    $_auto1 = new Auto("Honda","Gris");
    $_auto2 = new Auto("Honda","Rojo");

    $_auto3 = new Auto("Bmw","Negro",17000);
    $_auto4 = new Auto("Bmw","Negro",25000);

    $_fecha = new DateTime();
    $_auto5 = new Auto("Lexus","Blanco",35000, $_fecha->format('d-m-y'));




    /*
        Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
        al atributo precio.
    */

    if($_auto3->AgregarImpuesto(1500) && 
    $_auto4->AgregarImpuesto(1500) &&
    $_auto5->AgregarImpuesto(1500))
    {
        echo "<br>". "Se agregadoron los impuetos correctamente.. ";
    }

    /*
        ● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
        resultado obtenido.
     */

    $importeSumado = Auto::Add($_auto1,$_auto2);
    echo "<br>"."El importe del primer auto más es segundo es : ".$importeSumado;

    /*
        Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
     */

    echo "<br>". "El primer auto es igual al segundo : ". $_auto1->Equals($_auto2);
    echo "<br>". "El primer auto es igual al quinto : ". $_auto1->Equals($_auto5);

    /**
     * Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)
     */

    Auto::MostrarAuto($_auto1);
    Auto::MostrarAuto($_auto3);
    Auto::MostrarAuto($_auto5);   





?>