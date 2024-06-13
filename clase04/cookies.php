<?php

if(isset($_COOKIE["nombre"]))
{
    echo "<p>La cookie esta creada y el valor es : ". $_COOKIE["nombre"] . "<p/>";
}else {
    echo "<p>La cookie NO esta creada , la creamos <p/>";
    //crea una cookie con un tiempo de vida de 2 minutos
    setcookie("nombre","Migue",time()+(60*2));

}








