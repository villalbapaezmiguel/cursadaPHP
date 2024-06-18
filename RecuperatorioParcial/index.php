<?php


//verificamos que el parametro accion este definido
if(isset($_GET['accion']))
{
    switch($_SERVER["REQUEST_METHOD"])
    {
        case "GET":
            switch($_GET["accion"])
            {
                case "TiendaAlta":
                    include('./Entidades/TiendaAlta.php');
                    break;
                    case "ProductoConsulta":
                        include('./Entidades/ProductoConsultar.php');
                        break;
                default :
                    echo "<br>Parametro de accion no definido..";
                    break;
            }
        break;
        case "POST":
            switch($_GET["accion"])
            {
                default :
                    echo "<br> Parametro accion no permitido..";
                break;
            }
        break;
    
    
    }
}












