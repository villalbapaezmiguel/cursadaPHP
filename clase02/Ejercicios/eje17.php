<?php

/** */
class Auto
{

    //atributos: color , precio , marca y fecha
    private $color;
    private $precio;
    private $marca;
    private DateTime $fecha;

    public function __construct()
    {
        //obtenemos un array de los agumentos pasados por el contructor
        $arrayParametros = func_get_args();

        //obtenemos la cantidad de parametros pasados por el constructor
        $cantidadParametros = func_num_args();

        //obtenemos el nombre de la funcion
        $nombreContructor = '__construc' . $cantidadParametros;
        if (method_exists($this, $nombreContructor)) {
            //si existe , llamo al contructor que tenga ese numero de parametros
            call_user_func_array(array($this, $nombreContructor), $arrayParametros);
        }
    }


    function __construct0($marca, $color, $precio = 0)
    {
        echo "<br> valor de la marca : $marca <br>";
        $this->SetMarca($marca);
        $this->color = $color;
        $this->precio = $precio;
        $this->fecha = new DateTime();
    }

    function __construct1($marca, $color, $precio)
    {
        $this->marca = $marca;
        $this->color = $color;
        $this->precio = $precio;
        $this->fecha = new DateTime();
    }

    function __construct2($marca, $color, $precio, $fecha)
    {
        $this->marca = $marca;
        $this->color = $color;
        $this->precio = $precio;
        $this->fecha = $fecha;
    }
    /*
    //marca y color
    function __construct0($marca , $color, $precio = 0 )
    {
        $this->marca = $marca;
        $this->color = $color;
        $this->precio = $precio;
        $this->fecha = new DateTime();
    }



    //marca , color y precio
    function __construct1($marca , $color , $precio)
    {
        $this->marca = $marca;
        $this->color = $color;
        $this->precio = $precio;
        $this->fecha = new DateTime();
    }

    // La marca, color, precio y fecha.
    function __construct2($marca , $color , $precio , $fecha)
    {
        $this->marca = $marca;
        $this->color = $color;
        $this->precio = $precio;
        $this->fecha = $fecha;
        
    }*/


    //generamos getters

    public function GetMarca()
    {
        return $this->marca;
    }

    public function GetColor()
    {
        return $this->color;
    }

    public function GetPrecio()
    {
        return $this->precio;
    }

    public function GetFecha()
    {
        return $this->fecha ?? null;
    }


    //generamos setters

    public function SetMarca($marca)
    {
        $this->marca = $marca;
    }

    public function SetColor($color)
    {
        $this->color = $color;
    }

    public function SetPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function SetFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    //Funciones 

    public function AgregarImpuestos($impuesto)
    {
        // sumará al precio del objeto
        $this->precio += $impuesto;
    }
    public static function MostrarAuto($auto)
    {
        $auxMarca = $auto->GetMarca();
        $auxColor = $auto->GetColor();
        $auxPrecio = $auto->GetPrecio();
        $auxFecha = $auto->GetFecha() ?? "No especificada";

        $infoAuto = "Marca: " . ($auxMarca ?? "No especificada") . "<br>" .
            "Color: " . ($auxColor ?? "No especificada") . "<br>" .
            "Precio: " . ($auxPrecio ?? "No especificada") . "<br>" .
            "Fecha: " . $auxFecha . "<br>";

        echo $infoAuto;
    }
}

echo "hola migue, sos un gran programador!! <br>";

$auto1 = new Auto("Fiat", "rojo");
$auto2 = new Auto("Fiat", "rojo");

Auto::MostrarAuto($auto1);
echo "<br>";
Auto::MostrarAuto($auto2);
