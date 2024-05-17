<?php
//include('/xampp/htdocs/clase03/Ejercicios/Aplicacion19/Auto.php');
include('/xampp/htdocs/cursadaPHP/clase03/Ejercicios/Aplicacion19/Auto.php');
class Garage
{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos = array();//inicializo el array

    function __construct($_razonSocial, $_precioPorHora = 0.0)
    {
        $this->_razonSocial = $_razonSocial;
        $this->_precioPorHora = $_precioPorHora;
        $this->_autos = [];
    }

    public function MostrarGarage()
    {
        echo "<br> Razón Social: " . $this->_razonSocial ;
        echo "<br> Precio por Hora: $" . $this->_precioPorHora;
        echo "<br>Autos en el Garage: <br>";

        if(!is_null($this->_autos) && !empty($this->_autos))
        {
            for ($i=0; $i < count($this->_autos); $i++) { 
                # code...
                Auto::MostrarAuto($this->_autos[$i]);
            }
        }else{
            echo "esta vacio..";
        }
    }

    //Geters

    public function GetRazonSocial()
    {
        return $this->_razonSocial;
    }

    public function GetPrecioPorHora()
    {
        return $this->_precioPorHora;
    }

    //Da la cantidad de objetos que tiene 
    public function GetAutos()
    {
        $informacionAuto = "";
        if(!is_null($this->_autos))
        {
            foreach($this->_autos as $_valor)
            {
                //echo "<br>" . Auto::MostrarAuto($_valor);
                $informacionAuto .= Auto::MostrarAuto($_valor);
            }

        }else{
            return "No hay autos";
        }

        return $informacionAuto;
    }

    //Seter

    public function SetRazonSocial($_nuevo)
    {
        $this->_razonSocial = $_nuevo;
        return 0;
    }

    public function SetPrecioPorHora($_nuevo)
    {
        $this->_precioPorHora = $_nuevo;
        return 0;
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

        /**
     * Esta funcion guarda el objeto en archivo.csv
     * Retorna : 
     * -1 : El objeto pasado por parametro es null
     * -2 : Ocurrio un error un error al intentar escribir el archivo o con la respuesta del archivo
     *  0 : Salio todo Ok.
     * param :
     * Garage $_auto : Objeto a ser convertido en un archivo CSV
     */
    public static function GuardarGarge(Garage $_Garage)
    {
        //fopen(paramUno , paramDos )
        //paramUno : URL del Archivo a ser abierto
        //paramDos : Apertura para sólo escritura; coloca el puntero del fichero al final del mismo. Si el fichero no existe, se intenta crear.
        $archivo = fopen("./ListaGarage.csv","a");
        if(is_null($_Garage))
        {
            echo "<br>Error el auto es null";
            return -1;
        }

        $informacionAuto = $_Garage->GetRazonSocial() . "-" . $_Garage->GetPrecioPorHora() . "-" . " Autos almacenados : ". $_Garage->GetAutos() . PHP_EOL;
        
        //fwrite(paramUno , paramDos)
        //paramUno : URL del Archivo a ser escrito
        //paramDos : informacion a ser escrita en el archivo
        //retorna : La cantidad de bytes que se escribieron , de lo contrario false
        $resultado = fwrite($archivo,$informacionAuto);
        
        if($resultado)
        {
            echo "<br> Se escribio correctamente";
            return 0;
        }else{
            echo "<br> Ocurrio un error..";
            return -2;
        }

        fclose($archivo);//Cerramos el archivo
    }

    public static function LeerGarage($_ruta)
    {
        $archivo = fopen($_ruta , 'r');
        
        while(!feof($archivo))
        {
            $contenido = fgets($archivo , filesize($_ruta));
            echo "<br>" . $contenido;
        }
    
        fclose($archivo);
    }

    
    public static function LeerGaragesCSV($filename) {
        $garages = []; // Inicializa un array para almacenar los objetos Garage.
        $file = fopen($filename, 'r'); // Abre el archivo CSV en modo lectura.
    
        while (($data = fgetcsv($file)) !== false) {
            // Lee la primera línea que contiene la razón social y el precio por hora del garage.
            $razonSocial = $data[0];
            $precioPorHora = $data[1];
            $garage = new Garage($razonSocial, $precioPorHora); // Crea un nuevo objeto Garage.
    
            // Ahora lee los autos asociados al garage.
            while (($autoData = fgetcsv($file)) !== false) {
                // Verifica si la línea tiene exactamente 3 campos (marca, modelo, color).
                if (count($autoData) < 3) {
                    // Si no tiene 3 campos, se asume que no hay más autos y se vuelve a la lectura del siguiente garage.
                    break;
                }
                // Crea un nuevo objeto Auto con los datos leídos y lo agrega al garage.
                $auto = new Auto($autoData[0], $autoData[1], $autoData[2]);
                $garage->Add($auto);
            }
    
            // Agrega el objeto Garage al array de garages.
            $garages[] = $garage;
        }
    
        fclose($file); // Cierra el archivo CSV.
        return $garages; // Retorna el array de objetos Garage.
    }
    


}
