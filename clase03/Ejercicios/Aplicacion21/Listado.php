<?php 

include('./Usuario.php');

if(isset($_GET['nombre']) && isset($_GET['cleve']) && isset($_GET['mail']))
{
    $_nombre = $_GET['nombre'];
    $_clave = $_GET['cleve'];
    $_mail = $_GET['mail'];
    

}else{
    echo "<br> las key son incorrectas o no existen...";
}








