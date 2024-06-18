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
    public function GetNombre()
    {
        return $this->_nombre;
    }
    public function GetTipo()
    {
        return $this->_tipo;
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
    /**
     * return : 
     * 0 : Si lo encontro y devuelve su indice
     * -1 : No encontrado
     */
    public function EncontrarPorNombreYTipo($nombre , $tipo)
    {
        $arrayProductos = $this->ObtenerProductosExistentes('tienda.json');
        $indice = 0;
        if($arrayProductos != null)
        {
            foreach ($arrayProductos as $producto) {
                
                //validar el nombre y el tipo
                if($producto->GetNombre() == $nombre && $producto->GetTipo() == $tipo)
                {
                    return $indice;
                }
                $indice++;  
            }
        }
        return -1;
    }



    public static function AgregarJSON(Producto $nuevoProducto)
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
            }else
            {
                // Si el nombre y tipo ya existen, se actualiza el precio y se suma al stock existente.
                
                /*
                if($this->EncontrarPorNombreYTipo($nuevoProducto->GetNombre() , $nuevoProducto->GetTipo()) != -1)
                {

                }*/
            }
            
        }

        //agregamos al usuario al array existente
        $productoExistentes [] = $nuevoProducto;

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








