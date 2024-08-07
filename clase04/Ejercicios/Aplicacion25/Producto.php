<?php

class Producto implements JsonSerializable{

    private $_codigo;
    private $_nombre;
    private $_tipo;
    private $_stock;
    private $_precio;
    private $_id;

    public function __construct($codigo, $nombre, $tipo, $stock , $precio, $id = 0)
    {
        $this->_codigo = $codigo;
        $this->_nombre = $nombre;
        $this->_tipo = $tipo;
        $this->_stock = $stock;
        $this->_precio = $precio;
        $this->_id  = $this->GenerarId();
    }

    public static function GenerarId()
    {
        return random_int(1,10000);
    }

    public function GetCodigo()
    {
        return $this->_codigo;
    }
    public function GetNombre()
    {
        $aux = $this->_nombre;
        return $aux;
    }
    public function GetTipo()
    {
        $aux = $this->_tipo;
        return $aux;
    }
    public function GetStock()
    {
        $aux = $this->_stock;
        return $aux;
    }

    public function SetStock($nuevoStock)
    {
        $this->_stock = $nuevoStock;
    }

    public function GetPrecio()
    {
        $aux = $this->_precio;
        return $aux;
    }

    // Implementar el método jsonSerialize
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }


    public static function AgregarJSON(Producto $nuevoProducto)
    {
        $exito = -1;
        $archivo = "listaProducto.json";
        $productosExistentes = [];

        if(file_exists($archivo))
        {
            $contenidoArchivo = file_get_contents($archivo);
            $productosExistentes = json_decode($contenidoArchivo,true);

            if($productosExistentes === null)
            {
                $productosExistentes = [];
            }
        }

        //agregamos al usuario al array existente
        $productosExistentes [] = $nuevoProducto;

        //codificar el array completo a json
        $jsonActualizado = json_encode($productosExistentes,JSON_PRETTY_PRINT);

        //guardar el json actualizado en el archivo
        if(file_put_contents( $archivo,$jsonActualizado))
        {
            $exito = 0;
        }

        return $exito;
    }


    public static function LeerJSON($rutaJSON)
    {
        $arrayProductos = [];

        if(file_exists($rutaJSON))
        {
            $contenidoArchivo = file_get_contents($rutaJSON);
            $arrayProductosJSON = json_decode($contenidoArchivo,true);

            if($arrayProductosJSON != null)
            {
                foreach($arrayProductosJSON as $producto)
                {
                    $nuevoProducto = new Producto(
                        $producto['_codigo'],
                        $producto['_nombre'],
                        $producto['_tipo'],
                        $producto['_stock'],
                        $producto['_precio'],
                        $producto['_id']);

                        $arrayProductos[] = $nuevoProducto;
                }
            }


        }else{
            echo json_encode(["ERROR" => "Esta ruta no existe.."]);
        }
        return $arrayProductos;
    }

    public static function GuardarJSON($array , $rutaJSON)
    {
        $jsonActualizado = json_encode($array, JSON_PRETTY_PRINT);
        file_put_contents($rutaJSON, $jsonActualizado);
        return 0;
    }



    public static function ModificarStockProducto($ruta , $codigo , $nuevoStock)
    {
        $array = Producto::LeerJSON($ruta);

        foreach($array as $producto)
        {
            if($producto->GetCodigo() == $codigo)
            {
                $producto->SetStock($nuevoStock + $producto->GetStock());
                break;
            }
        }
        if(Producto::GuardarJSON($array , $ruta) == 0)
        {
            return 0;
        }
    
        return -1;
    }


}














