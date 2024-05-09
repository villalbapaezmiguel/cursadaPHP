<?php
include("./clase02/Ejercicios/eje17.php");
class Garage
{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos = array();

    function __construct($_razonSocial, $_precioPorHora = 0.0, $_autos = null)
    {
        $this->_razonSocial = $_razonSocial;
        $this->_precioPorHora = $_precioPorHora;
        $this->_autos = $_autos;
    }

    public function MostrarGarage()
    {
        echo "Razón Social: " . $this->_razonSocial . "<br>";
        echo "Precio por Hora: $" . $this->_precioPorHora . "<br>";
        echo "Autos en el Garage:\n";
        foreach ($this->_autos as $auto) 
        {
            $auto->mostrarAuto();
        }
    
    }


    public function Equals( Garage $_garage , Auto $_auto)
    {
        $existe = false;

        foreach ($_garage->_autos as $valor) {
            
            if($valor->Equals($_auto))
            {
                $existe = true;
            }
        }
        return $existe;
    }
    



}
