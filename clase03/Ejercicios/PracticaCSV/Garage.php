<?php
include('/xampp/htdocs/cursadaPHP/clase03/Ejercicios/PracticaCSV/Auto.php'); 
class Garage{
    private $_razonSocial;
    private $_precioPorHora;
    private $_arrayAutos;


    public function __construct($razonSocial, $precioPorHora = 0.0)
    {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
        $this->_arrayAutos = [];
    }

    public function GetRazonSocial()
    {
        return $this->_razonSocial;        
    }

    public function GetPrecioPorHora()
    {
        return $this->_precioPorHora;        
    }

    public function GetArrayAutos()
    {
        return $this->_arrayAutos;        
    }

    public function MostrarGarage()
    {
        echo "<br>";
        echo "Razon Social : ". $this->GetRazonSocial() . " - " . " Precio Por Hora : " . $this->GetPrecioPorHora() . "<br>";  

        if(!empty($this->_arrayAutos))
        {
            foreach($this->_arrayAutos as $_auto)
            {
                echo "<br>" . $_auto->MostrarAuto();
            }
        }else{
            echo "<br>No hay autos...";
        }    
    }


    /**Compara un objeto de tipo Garage y otro de tipo Auto
     * retorna 0 si el auto esta en el garage
     * El auto existe cuando la Marca y el Color son iguales
     */
    public function Equals(Auto $_auto)
    {
        $_exite = -1;
        if(!is_null($_auto))
        {
            foreach($this->_arrayAutos as $_valor)
            {
                if($_valor->GetMarca() ==  $_auto->GetMarca() &&  $_valor->GetColor() ==  $_auto->GetColor())
                {
                    $_exite = 0;
                }
            }
        }
        return $_exite;
    }


    /**Agrega un nuevo auto no repetido al array de autos
     * retorna : -1 si el auto es null o si el auto ya se encuentra dentro del garage
     * 0 : si se pudo agregar
     */
    public function Add(Auto $_auto)
    {
        $_ok = -1;
        if(!is_null($_auto))
        {
            if($this->Equals($_auto) == -1)
            {
                $this->_arrayAutos [] = $_auto;
                echo "<br> Se agrego un nuevo auto";
                $_ok = 0; 
            }
        }
        return $_ok;
    }

    /**Romuve un elememto del array
     * retorna : 0 si salio todo ok , de lo contrario -1
     */
    public function Remove(Auto $_auto)
    {
        $_ok = -1;

        if(!is_null($_auto))
        {
            if($this->Equals($_auto) == 0)
            {
                $indice = array_search($_auto, array_keys($this->_arrayAutos));
                unset($this->_arrayAutos[$indice]);
                $this->_arrayAutos = array_values($this->_autos);
                $_ok = 0;                
            }
        }
        return $_ok;
    }















}













