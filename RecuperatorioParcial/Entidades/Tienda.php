<?php

class Tienda {
    private $archivo;
    private $productos;

    public function __construct($archivo) {
        $this->archivo = $archivo;
        $this->productos = $this->cargarProductos();
    }

    private function cargarProductos() {
        if (file_exists($this->archivo)) {
            $contenido = file_get_contents($this->archivo);
            return json_decode($contenido, true);
        }
        return [];
    }

    public function guardarProductos() {
        file_put_contents($this->archivo, json_encode($this->productos, JSON_PRETTY_PRINT));
    }

    public function agregarOActualizarProducto($nombre, $precio, $tipo, $marca, $stock, $imagen) {
        foreach ($this->productos as &$producto) {
            if ($producto['nombre'] == $nombre && $producto['tipo'] == $tipo) {
                $producto['precio'] = $precio;
                $producto['stock'] += $stock;
                $producto['imagen'] = $imagen;
                $this->guardarProductos();
                return;
            }
        }

        $nuevoProducto = [
            'id' => $this->IdAutoincremental(),
            'nombre' => $nombre,
            'precio' => $precio,
            'tipo' => $tipo,
            'marca' => $marca,
            'stock' => $stock,
            'imagen' => $imagen
        ];
        $this->productos[] = $nuevoProducto;
        $this->guardarProductos();
    }

    private function IdAutoincremental() {
        $maxId = 0;
        foreach ($this->productos as $producto) {
            if (isset($producto['id']) && $producto['id'] > $maxId) {
                $maxId = $producto['id'];
            }
        }
        return $maxId + 1;
    }
}




/*
class Tienda{

    private $_nombreArchivo;
    private $_productos = [];

    public function __construct($nombre)
    {
        $this->_nombreArchivo = $nombre;
        $this->_productos = $this->CargarProductos('tienda.json');
    }

    public function GetNombre()
    {
        return $this->_nombreArchivo;
    }

    public function GetProductos()
    {
        return $this->_productos;
    }

    public function SetNombre($nombre)
    {
        $this->_nombreArchivo = $nombre;
    }

    
    **
     * Lee y decodifica el archivo JSON para inicializar la colección de productos.
     *
    private function CargarProductos($archivo)
    {
        $productoExistentes = [];
        if(file_exists($archivo))
        {
            $contenido = file_get_contents($archivo);
            $productoExistentes = json_decode($contenido,true);
        }

        return $productoExistentes;
    }

    **
     * Codifica y guarda la colección de productos en el archivo JSON
     * 
     * retorna : 
     *  0 = todo OK
     *  -1 = error
     *
    private function GuardarProductos($archivo , $arrayProductos)
    {
        if(file_exists($archivo))
        {
            $contenido = file_get_contents($archivo);
            $jsonContenido = json_decode($contenido,true);
            $jsonContenido [] = $arrayProductos;

            if(file_put_contents($archivo,$jsonContenido))
            {
                return 0;
            }else{
                return -1;
            }
        }
        return -1;
    }

    private function UltimoId()
    {
        $arrayProductos = $this->CargarProductos('tienda.json');
        if($arrayProductos != null)
        {
            $utimoElemento = end($arrayProductos);
            return $utimoElemento->_GetId();
        }
        return 0;
    }

    public function GenerarIdAutoincremental()
    {
        $nuevoId = $this->UltimoId() + 1;
        return $nuevoId;
    }

    **
     * `: Agrega un nuevo producto o actualiza uno existente
     * 
     *
    public function AgregarOActulizarProductos($archivo , $nuevoProducto)
    {
        $exito = -1;
        if(file_exists($archivo))
        {
            $contenido = file_get_contents($archivo);
            $jsonContenido = json_decode($contenido,true);
            //$jsonContenido [] = $arrayProductos;
            $indice = -1;

            $indice = $this->ExisteProducto($nuevoProducto,$archivo);
            if($indice != -1)
            {
                //si existe el producto
                $jsonContenido[$indice]->ActualizarPrecio($nuevoProducto->GetPrecio(),$nuevoProducto->GetStock());
                if(file_put_contents($archivo,$jsonContenido))
                {
                    $exito = 0;
                }
            }else{
                //No existe , entonces se agrega
                $jsonContenido[] = $nuevoProducto;
                $arrayJSONActulizado = json_decode($jsonContenido,JSON_PRETTY_PRINT);
                if(file_put_contents($archivo,$arrayJSONActulizado))
                {
                    $exito = 0;
                }
            }
        }
        return $exito;
    }

    **
     * Verifica si el producto ya existe , si es asi devuelve el indice en donde se encuentra
     * retorna : 
     * -1 = NO existe
     *  0 > = retornando el indice
     *
    private function ExisteProducto($producto , $archivo)
    {
        $indice = 0;
        $contenido = file_get_contents($archivo);
        $jsonContenido = json_decode($contenido,true);

        foreach($jsonContenido as $producto)
        {
            if($producto->GetNombre() == $producto->GetNombre() &&
            $producto->GetTipo() == $producto->GetTipo())
            {
                return $indice;
            }
            $indice ++;
        }
        return -1;
    }

    **
     * Devuelve la colección de productos
     *
    public function ObtenerProductos()
    {
        $productoExistentes = [];
        $archivo = 'tienda.json';
        if(file_exists($archivo))
        {
            $contenido = file_get_contents($archivo);
            $productoExistentes = json_decode($contenido,true);
        }

        return $productoExistentes;
    }

}
*/

