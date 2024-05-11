<?php
include('C:\xampp\htdocs\cursadaPHP\clase02\Ejercicios\eje17.php');
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
        echo "Autos en el Garage: <br>";

        if(!is_null($this->_autos))
        {
            for ($i=0; $i < count($this->_autos); $i++) { 
                # code...
                Auto::MostrarAuto($this->_autos[$i]);
            }
        }else{
            echo "esta vacio..";
        }
    }

    /*
    Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
    objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
    */
    public function Equals(Auto $_auto)
    {
        $_bandera = -1;
    
        if(!is_null($_auto))
        {
            foreach ($this->_autos as $autoEnGarage) {
                if($autoEnGarage->Equals($_auto)) {
                    // El auto está en el garage
                    $_bandera = 0;
                    break;
                }
            }
        }
        return $_bandera;
    }
    
    
    /*
    Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
    (sólo si el auto no está en el garaje, de lo contrario informarlo).
    
        -1: no se pudo agregar
        0 : Se pudo agregar
    */
    public function Add(Auto $_nuevoAuto)
    {
        $_bandera = -1;
        if($this->Equals($_nuevoAuto) == -1)
        {
            echo "<br>estoy aca perris Add";
            array_push($this->_autos,$_nuevoAuto);
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
        if($this->Equals($_auto))
        {
            $_indice = array_search($_auto, $this->_autos);
            unset($this->_autos[$_indice]);
            $this->_autos = array_values($this->_autos);
            $_bandera = 0;
        }
        return $_bandera;
    }



}
