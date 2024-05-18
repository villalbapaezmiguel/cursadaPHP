<?php

class Auto{

    private $_color ;
    private $_precio ;
    private $_marca ;
    private $_fecha ;

    function __construct($_marca ,$_color, $_precio = 0.0 , $_fecha = null)
    {
        $this->_marca = $_marca;
        $this->_color = $_color;
        $this->_precio = $_precio;

        if(is_string($_fecha))
        {
            $this->_fecha  = new DateTime($_fecha);
        }else{
            //instanceof : verificamos si el objeto de instancia es de una clase especifica (en este caso DateTime) o heredada 
            //si la variable $_fecha es de tipo DateTime se inicializara al atributo  $this->_fecha con ese valor 
            //caso contrario se le otorgara null
            $this->_fecha = $_fecha instanceof DateTime ? $_fecha : 'N/D';
        }            
    }

    public function GetMarca()
    {
        return $this->_marca;
    }

    public function GetColor()
    {
        return $this->_color;
    }

    public function GetPrecio()
    {
        return $this->_precio;
    }

    public function GetFecha()
    {
        return $this->_fecha;
    }


    public function MostrarAuto()
    {
        echo "Marca : ". $this->GetMarca() . " Color : ". $this->GetColor() . " Precio : " . $this->GetPrecio() . " Fecha : " . $this->GetFecha() . PHP_EOL; 
    }




}









