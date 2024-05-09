<?php 
    class Auto{

        public $_color ;
        private $_precio;
        private $_marca;
        private $_fecha;

        function __construct($_marca , $_color , $_precio = 0.0 , $_fecha = null)
        {
            $this->_color = $_color;       
            $this->_precio = $_precio;
            $this->_marca = $_marca;
            if (is_string($_fecha)) {
                $this->_fecha = new DateTime($_fecha);
            } else {
                $this->_fecha = $_fecha instanceof DateTime ? $_fecha : null;
            }
        }

        public function AgregarImpuesto($_impuestoAgregado)
        {
            $exito = false;

            if(is_numeric($_impuestoAgregado))
            {
                $this->_precio += $_impuestoAgregado;
                $exito = true;                
            }

            return $exito;
        }

        public static function  MostrarAuto(Auto $auto)
        {
           echo "<br>";


           echo "Marca : ".$auto->_marca."<br>";
           echo "Color : ".$auto->_color."<br>";
           echo "Precio : ".$auto->_precio."<br>";
           echo "Fecha : ".($auto->_fecha ? $auto->_fecha->format('Y-m-d') : "N/A")."<br>";

        } 

        public function Equals(Auto $objeto2 )
        {
            $exito = "no..";

            if($this->_marca == $objeto2->_marca)
            {
                $exito = "si";
            } 

            return $exito;
        }

        public function Add(Auto $objeto2)
        {
            $_nuevoPrecio = 0.0;
            if($this->Equals($objeto2) && $this->_color == $objeto2->_color)
            {
                if($this->_precio >= 0.0 && $this->_precio >= 0.0)
                {
                    $_nuevoPrecio = $this->_precio + $objeto2->_precio;  
                    return $_nuevoPrecio;

                }else{
                    return $_nuevoPrecio;
                }
            }

            return "No se pueden sumar porque NO son de la misma marca y color...";
        }



    }


    $objeto1 = new Auto("Fiat","rojo",50000);
    $objeto2 = new Auto("Fiat","rojo",50000);

    
    Auto::MostrarAuto($objeto1);
    echo "son iguales : ". $objeto1->Equals($objeto2);










?>