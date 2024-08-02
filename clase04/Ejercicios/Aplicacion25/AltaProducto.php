<?php

include("../Aplicacion25/Producto.php");
 echo "Aplicacion 25 <br>";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['codigo']) && isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['stock']) && isset($_POST['precio']))
    {
        $aux = new Producto($_POST['codigo'],$_POST['nombre'],$_POST['tipo'],$_POST['stock'],$_POST['precio']);

        if(VerificarProducto($aux))
        {
            echo json_encode(["Actualizado" => "Se actualizo su STOCK"]);
            Producto::ModificarStockProducto('listaProducto.json',$aux->GetCodigo(),$aux->GetStock());

        }else{

            if(Producto::AgregarJSON($aux) == 0)
            {
                echo json_encode(["Ingresado" => "Nuevo producto ingresado"]);
            }else{
                echo json_encode(["ERROR" => "no se pudo hacer"]);
            }
        }
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
    $arrayProductos = Producto::LeerJSON('listaProducto.json');

    if($arrayProductos != null)
    {
        foreach($arrayProductos as $producto)
        {
            if($producto->GetNombre() == $nuevoProducto->GetNombre() && $producto->GetCodigo() == $nuevoProducto->GetCodigo())
            {
                return true;
            }
        }
        
    }else{
        echo json_encode(["ERROR" => "No hay productos en la lista..."]);
    }
    return false;
}













