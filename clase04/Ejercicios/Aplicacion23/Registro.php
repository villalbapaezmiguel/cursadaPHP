<?php

include('../Aplicacion23/Usuario.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $usuario = new Usuario($_POST['nombre'],$_POST['clave'],$_POST['mail']);

    

}else{
    echo "no es post";
}











