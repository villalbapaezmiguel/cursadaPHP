<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    include 'funciones.php';

    $ruta = $_POST['ruta'];
    switch ($ruta) 
    {
        case 'alta_producto':
            include 'TiendaAlta.php';
            break;
        case 'consultar_producto':
            include 'ProductoConsultar.php';
            break;
        case 'alta_venta':
            include 'AltaVenta.php';
            break;
        default:
            http_response_code(404);
            echo "Ruta no encontrada";
            break;
    }
} else {
    http_response_code(405);
    echo "Método no permitido";
}
?>
