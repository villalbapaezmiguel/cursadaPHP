<?php

class Producto {

    //Nombre, Precio, Tipo (“Smartphone” o “Tablet”), Marca, Stock (unidades).
    private $_nombre;
    private $_precio;
    private $_tipo;
    private $_marca;//(“Smartphone” o “Tablet”)
    private $_stock;//(unidades)
    private $_id;
    private static $contado_id = 0; 

    public function __construct($nombre, $precio , $tipo , $marca , $_stock = 0)
    {
        self::$contado_id++;

        $this->_nombre = $nombre;
        $this->_precio = $precio;
        $this->_tipo = $tipo;
        $this->_marca = $marca;
        $this->_id = self::$contado_id;
        $this->_stock = $_stock;
    }

    public function GetId()
    {
        return $this->_id;
    }

    private function ObtenerProductosExistentes($archivo)
    {
        $productoExistentes = [];
        if(file_exists($archivo))
        {
            $contenido = file_get_contents($archivo);
            $productoExistentes = json_decode($contenido,true);
        }

        return $productoExistentes;
    }

    /**
     * retorna : 
     * 0 = si encontro coincidencia
     * 1 = el array de productos esta vacio
     * 2 = el producto pasado como parametro es null
     */
    public function VerificarProducto(Producto $producto)
    {
        $exite = -1;
        $arrayProductos = $this->ObtenerProductosExistentes('tienda.json');
        if($producto != null)
        {
            if($arrayProductos != null)
            {
                foreach($arrayProductos as $auxProducto)
                {
                    if($auxProducto->GetId() == $producto->GetId())
                    {
                        $exite = 0;
                        break;
                    }
                }
            }else{
                $exite = 1;
            }
        }else{
            $exite = 2;
        }

        return $exite ;
    }
    

    public static function AgregarJSON(Producto $nuevoUsuario)
    {
        $exito = -1;
        $archivo = "tienda.json";
        $productoExistentes = [];

        if(file_exists($archivo))
        {
            $contenidoArchivo = file_get_contents($archivo);
            $productoExistentes = json_decode($contenidoArchivo,true);

            if($productoExistentes == null)
            {
                $productoExistentes = [];
            }
        }

        //agregamos al usuario al array existente
        $productoExistentes [] = $nuevoUsuario;

        //codificar el array completo a json
        $jsonActualizado = json_encode($productoExistentes,JSON_PRETTY_PRINT);

        //guardar el json actualizado en el archivo
        if(file_put_contents( $archivo,$jsonActualizado))
        {
            $exito = 0;
        }
        return $exito;
    }


}








