<?php
include('Venta.php');
include('ProductoConsultar.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['mail']) && isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['marca']) && isset($_POST['stock']))
    {
        if(BuscarProducto($_POST['nombre'],$_POST['tipo'],$_POST['marca']) == 0)
        {
            $nuevaVenta = new Venta($_POST['mail'],$_POST['nombre'],$_POST['tipo'],$_POST['marca'],$_POST['stock']);
            $precio = BuscarPrecioProducto($_POST['nombre'],$_POST['tipo'],$_POST['marca']);

            if(guardarVentaJSON($nuevaVenta,'ventas.json', $precio))
            {
                /**falta descontar la cantidad vendida del stock. */
                echo "<br> Venta guardada existosamente..";
            }else{
                echo json_encode(["ERROR"=> "NO se pudo escribir en el archivo"]);
            }

        }else{
            echo json_encode(['Error'=>'El producto no existe']);
        }
    }else{
        echo json_encode(['Error'=>'Faltan rellenar datos']);
    }
}else{
    echo json_encode(['Error'=>'El metodo tiene que estar en POST']);
}


function guardarVentaJSON(Venta $nuevaVenta , $archivo , $precio)
{
    if($nuevaVenta != null)
    {
        if(file_exists($archivo))
        {
            $contenidoJSON = file_get_contents($archivo);
            $arrayVentas = json_decode($contenidoJSON , true); 

            $arrayVentas[] = $nuevaVenta;

            $nuevoId = count($arrayVentas) +1;

            $auxVenta = [
                'mail' => $nuevaVenta->GetMail(),
                'nombre' => $nuevaVenta->GetNombre(),
                'tipo' => $nuevaVenta->GetTipo(),
                'marca' => $nuevaVenta->GetMarca(),
                'stock' => $nuevaVenta->GetStock(),
                'fecha' => new DateTime('Y-m-d'),
                'numero_pedido' =>  uniqid('pedido_'),
                'id'=> $nuevoId,
                'precioTotal' => $precio
            ]; 
            $arrayVentas[] = $auxVenta;

            if(file_put_contents($archivo, json_encode($arrayVentas, JSON_PRETTY_PRINT)))
            {
                echo json_encode(["EXITO"=> "Nueva Venta guardada ". $archivo]);    

                return 0;            
            }else{
                echo json_encode(["ERROR"=> "NO se pudo escribir en el archivo"]);
            }
        }else{
            echo json_encode(["ERROR"=> "El archivo no existe"]);
        }
    }
    return -1;
}





