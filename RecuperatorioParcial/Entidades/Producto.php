<?php

class Producto {

    private $_nombre;
    private $_precio;
    private $_tipo;
    private $_marca;//(“Smartphone” o “Tablet”)
    private $_stock;//(unidades)
    private $_id;
    private $_imagen;

    public function __construct($nombre, $precio , $tipo , $marca , $stock , $imagen)
    {
        $this->_nombre = $nombre;
        $this->_precio = $precio;
        $this->_tipo = $tipo;
        $this->_marca = $marca;
        $this->_stock = $stock;
        $this->_imagen = $imagen;
    }
    //Getters
    public function GetNombre()
    {
        return $this->_nombre;
    }
    public function GetPrecio()
    {
        return $this->_precio;
    }
    public function GetTipo()
    {
        return $this->_tipo;
    }
    public function GetMarca()
    {
        return $this->_marca;
    }
    public function GetStock()
    {
        return $this->_stock;
    }
    public function GetId()
    {
        return $this->_id;
    }

    //Setters
    public function SetNombre($nombre)
    {
        $this->_nombre = $nombre;
    }
    public function SetPrecio($precio)
    {
        $this->_precio = $precio;
    }
    public function SetTipo($tipo)
    {
        $this->_tipo = $tipo;
    }
    public function SetMarca($marca)
    {
        $this->_marca = $marca;
    }
    public function SetStock($stock)
    {
        $this->_marca = $stock;
    }
    public function SetId($id)
    {
        $this->_id = $id;
    }


    /**objetivo : 
     * -actualiza el precio del prodocto 
     * -incrementa o disminulle las unidades del stock
     * 
     * retorna :
     * 0 = todo ok
     * -1 = error
     */
    public function ActualizarPrecio($nuevoPrecio , $nuevoStock)
    {
        $this->SetPrecio($nuevoPrecio);
        if($nuevoStock > 0)
        {
            $this->SetStock($this->GetStock()+$nuevoStock);
            return 0;
        }else{
            $this->SetStock($this->GetStock()-$nuevoStock);
            return 0;
        }
        return -1;
    }


}








