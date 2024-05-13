<?php
//Villalba Paez Miguel Antonio
class Auto
{
    public $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    function __construct($_marca, $_color, $_precio = 0.0, $_fecha = null)
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
    //Getters de las propiedades
    public function GetMarca()
    {
        $aux = $this->_marca;
        return $aux;
    }
    public function GetColor()
    {
        $aux = $this->_color;
        return $aux;
    }
    public function GetPrecio()
    {
        return $this->_precio;
    }
    public function GetFecha()
    {
        return $this->_fecha;
    }
    //Setter de las propiedades
    public function SetMarca($_nuevoMarca)
    {
        $this->_marca = $_nuevoMarca;
        return 0;
    }
    public function SetColor($_nuevoColor)
    {
        $this->_marca = $_nuevoColor;
        return 0;
    }
    public function SetPrecio($_nuevoPrecio)
    {
        $this->_marca = $_nuevoPrecio;
        return 0;
    }
    public function SetFecha($_nuevoFecha)
    {
        $this->_marca = $_nuevoFecha;
        return 0;
    }

    public function AgregarImpuesto($_impuestoAgregado)
    {
        $exito = false;

        if (is_numeric($_impuestoAgregado)) {
            $this->_precio += $_impuestoAgregado;
            $exito = true;
        }

        return $exito;
    }

    public static function  MostrarAuto(Auto $auto)
    {
        echo "<br>";


        echo "Marca : " . $auto->_marca . "<br>";
        echo "Color : " . $auto->_color . "<br>";
        echo "Precio : " . $auto->_precio . "<br>";
        echo "Fecha : " . ($auto->_fecha ? $auto->_fecha->format('Y-m-d') : "N/A") . "<br>";
    }

    public function Equals(Auto $objeto2)
    {
        $exito = "no..";

        if ($this->_marca == $objeto2->_marca) {
            $exito = "si";
        }

        return $exito;
    }

    public static function Add(Auto $_objeto1, Auto $_objeto2)
    {
        $_nuevoPrecio = 0.0;
        if (($_objeto1->_marca == $_objeto2->_marca) &&
            ($_objeto1->_color == $_objeto2->_color)
        ) {
            if ($_objeto1->_precio >= 0.0 && $_objeto2->_precio >= 0.0) {
                return $_objeto1->_precio + $_objeto2->_precio;
            } else {
                return 0.0;
            }
        }

        return "No son de la misma marca y color";
    }

    //Trabajamos con archivos


    /**
     * Esta funcion guarda el objeto en archivo.csv
     * Retorna : 
     * -1 : El objeto pasado por parametro es null
     * -2 : Ocurrio un error un error al intentar escribir el archivo o con la respuesta del archivo
     *  0 : Salio todo Ok.
     * param :
     * Auto $_auto : Objeto a ser convertido en un archivo CSV
     */
    public static function GuardarAuto(Auto $_auto)
    {
        //fopen(paramUno , paramDos )
        //paramUno : URL del Archivo a ser abierto
        //paramDos : Apertura para sólo escritura; coloca el puntero del fichero al final del mismo. Si el fichero no existe, se intenta crear.
        $archivo = fopen("./ListaAutos.csv","a");
        if(is_null($_auto))
        {
            echo "<br>Error el auto es null";
            return -1;
        }

        $informacionAuto = $_auto->GetMarca() . "-" . $_auto->GetColor() . "-" . $_auto->GetPrecio() . "-" . $_auto->GetFecha() . PHP_EOL;
        
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



}
