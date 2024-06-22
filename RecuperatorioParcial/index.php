<?php


//verificamos que el parametro accion este definido
if(isset($_GET['accion']))
{
    $accion = $_GET['accion'];
    $metodo = $_SERVER["REQUEST_METHOD"];
    switch($metodo)
    {
        case "GET":            
            ManejarGET($accion);
        break;
        case "POST":
            ManejarPOST($accion);
        break;
        default : 
            http_response_code(400);
            echo json_encode(["Error"=>"Metodo NO permitido.."]);
        break;
    }
}else {
    http_response_code(400);
    echo json_encode(["Error"=>"Parametro de accion no definido.."]);
}


function ManejarGET($accion)
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


function ManejarPOST($accion)
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









