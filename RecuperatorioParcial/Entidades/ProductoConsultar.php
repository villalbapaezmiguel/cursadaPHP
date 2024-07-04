<?php
include('Producto.php');

if(isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['marca']))
{
    $existe = BuscarProducto($_POST['nombre'],$_POST['tipo'],$_POST['marca']);

    if($existe == 0)
    {
        echo "<br> Existe ese producto";
    }else if($existe == -2)
    {
        echo "<br> El tipo NO existe";
    }else if($existe == -3)
    {
        echo "<br> El Nombre NO existe";
    }
}else{

    echo json_encode(["Error" => "faltan rellenar datos para la busqueda"]);

}

function BuscarPrecioProducto($nombre , $tipo , $marca)
{
    $precio = -1;
    $contenido = file_get_contents('tienda.json');
    $arrayProductos = json_decode($contenido,true);

    foreach($arrayProductos as $producto)
    {
        if($producto['nombre'] == $nombre && $producto['tipo'] == $tipo && $producto['marca'] == $marca)
        {
            $precio = $producto->GetPrecio();
            break;
        }    
    }

    return $precio;
}

/**
 * retorna : 
 * -1: No encotro nungun parecido a los parametros pasados
 * 0: el producto existe
 * -2: El tipo NO existe
 * -3: El nombre NO existe
 */
function BuscarProducto($nombre , $tipo , $marca)
{
    $exite = -1;
    if(file_exists('tienda.json'))
    {
        $contenido = file_get_contents('tienda.json');
        $array = json_decode($contenido,true);

        if(BuscarPorTipo($tipo) != 0)
        {
            return -2;
        }else if(BuscarPorNombre($nombre) != 0)
        {
            return -3;
        }

        foreach($array as $producto)
        {
            if($producto['nombre'] == $nombre && $producto['tipo'] == $tipo && $producto['marca'] == $marca)
            {
                $exite = 0;
                break;
            }
        }
    }

    return $exite;
}


function BuscarPorNombre($nombre)
{
    if(file_exists('tienda.json'))
    {
        $contenido = file_get_contents('tienda.json');
        $array = json_decode($contenido,true);

        foreach($array as $producto)
        {
            if($producto['nombre'] == $nombre)
            {
                return 0;
            }
        }
    }
    return -1;
}

function BuscarPorTipo($tipo)
{
    if(file_exists('tienda.json'))
    {
        $contenido = file_get_contents('tienda.json');
        $array = json_decode($contenido,true);

        foreach($array as $producto)
        {
            if($producto['tipo'] == $tipo)
            {
                return 0;
            }
        }
    }
    return -1;
}



