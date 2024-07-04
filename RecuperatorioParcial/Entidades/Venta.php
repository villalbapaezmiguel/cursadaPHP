<?php 

class Venta{

    private $_mail;
    private $_nombre;
    private $_tipo;
    private $_marca;
    private $_stock;

    public function __construct($mail , $nombre , $tipo , $marca , $stock)
    {
        $this->_mail = $mail;
        $this->_nombre = $nombre;
        $this->_tipo = $tipo;
        $this->_marca = $marca;
        $this->_stock = $stock;            
    }

    public function GetMail()
    {
        return $this->_mail;   
    }
    public function GetNombre()
    {
        return $this->_nombre;   
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
    

}




