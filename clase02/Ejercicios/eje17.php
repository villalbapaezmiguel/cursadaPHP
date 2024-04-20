<?php
/** */
class Auto{

    private $color;
    private $precio;
    private $marca;
    private DateTime $fecha;

    public function __construct($marca , $color , $precio = 0 , $fecha = 0)
    {
        $this->marca = $marca;
        $this->color = $color;
        $this->precio = $precio;
        $this->fecha = $fecha;
    }

    public function GetPrecio() {
        
        return $this->precio;
    }

    public function SetPrecio($precio) {
        $this->precio = $precio;
    }


    public function AgregarImpuestos($impuesto)
    {
        $nuevoImpuesto = $this->GetPrecio() + $impuesto;  
    }






}



?>