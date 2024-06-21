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
    
    
    }
}


function ManejarGet($accion)
{
    switch($accion)
    {
        case 'TiendaAlta':
            include('./Entidades/TiendaAlta.php');
            break;
        case "ProductoConsulta":
            include('./Entidades/ProductoConsultar.php');
        break;
        default :
            http_response_code(400);
            echo json_encode(["Error"=>"Esta accion no esta definida para GET"]);
        break;
    }

}









