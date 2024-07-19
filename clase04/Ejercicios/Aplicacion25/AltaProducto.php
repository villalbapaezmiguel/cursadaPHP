<?php

include("../Aplicacion25/Producto.php");
 echo "Aplicacion 25 <br>";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['codigo']) && isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['stock']) && isset($_POST['precio']))
    {



    }else{
        echo json_encode(["ERROR" => "Falta rellenar informacion"]);
    }
}else{
    echo json_encode(["ERROR" => "Tiene que ser por el metodo POST"]);
}

/**Verifica si un producto existe
 * 
 */
function VerificarProducto(Producto $nuevoProducto)
{
    $arrayProductos = Producto::LeerJSON('listaProductos.json');

    if($arrayProductos != null)
    {
        foreach($arrayProductos as $producto)
        {
            if($producto['_nombre'] == $nuevoProducto->GetNombre() && $producto['_tipo'] == $nuevoProducto->GetTipo())
            {
                return true;
            }
        }

    }else{
        echo json_encode(["ERROR" => "No hay productos en la lista..."]);
    }
    return false;
}













