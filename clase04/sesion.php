<?php

//Comienzo de la sesion
session_start();

if(isset($_SESSION["usuario"]))
{
    echo $_SESSION["usuario"];
}else {

    //guardar datos de sesion
    $_SESSION["usuario"] = "Migue";
    echo "No estaba setado , ahora ya si..";


}






