<?php
include('C:\xampp\htdocs\cursadaPHP\clase02\Ejercicios\eje17.php');
class Garage
{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos = array();//inicializo el array

    function __construct($_razonSocial, $_precioPorHora = 0.0, $_autos = null)
    {
        $this->_razonSocial = $_razonSocial;
        $this->_precioPorHora = $_precioPorHora;
        $this->_autos = $_autos;
    }

    public function MostrarGarage()
    {
        echo "<br> Razón Social: " . $this->_razonSocial ;
        echo "<br> Precio por Hora: $" . $this->_precioPorHora;
        echo "<br>Autos en el Garage: <br>";

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
     0 = es igual ;
    -1 = no se encontro;
    -2 = el array esta vacio
    */
    public function Equals(Auto $_auto)
    {
        $_bandera = -1;
        
        if(!is_null($_auto))
        {
            if(!is_null($this->_autos))//Verifico si el array esta vacio y el objeto a comparar no sea nulo
            {
                foreach ($this->_autos as $autoEnGarage) 
                {
                    if($autoEnGarage->GetMarca() == $_auto->GetMarca() && 
                    $autoEnGarage->GetColor() == $_auto->GetColor() )
                    {
                        $_bandera = 0;
                        break;
                    }
                }
            }else if(is_null($this->_autos))
            {
                $_bandera = -2;
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
        //Si el auto no esta en el garaje O si el garaje se encuentra vacio
        if($this->Equals($_nuevoAuto) != 0 || $this->Equals($_nuevoAuto) == -2)
        {
            $this->_autos[] = $_nuevoAuto;
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
        if($this->Equals($_auto) == 0)
        {
            $_indice = array_search($_auto, $this->_autos);
            unset($this->_autos[$_indice]);
            $this->_autos = array_values($this->_autos);
            $_bandera = 0;
        }
        return $_bandera;
    }



}
