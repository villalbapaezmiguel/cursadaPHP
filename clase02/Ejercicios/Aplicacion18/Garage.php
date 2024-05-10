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

    /*
    Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
    objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
    */
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
    


    /*
    Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
    (sólo si el auto no está en el garaje, de lo contrario informarlo).
    
        -1: no se pudo agregar
        0 : Se pudo agregar
    */

    public function Add(Auto $_auto)
    {
        $_bandera = -1;
        if($this->Equals($this, $_auto))
        {
            $this->_autos[count($this->_autos)] = $_auto;
            $_bandera = 0;
        }
        return $_bandera;
    }   

    /*
        Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
        “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). 
     */
    public function Remove(Auto $_auto)
    {
        $_bandera = -1;
        if($this->Equals($this, $_auto))
        {
            $_indice = array_search($_auto, $this->_autos);
            unset($this->_autos[$_indice]);
            $this->_autos = array_values($this->_autos);
            $_bandera = 0;
        }
        return $_bandera;
    }


}
