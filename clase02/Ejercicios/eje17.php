<?php
/** */
class Auto{

    //atributos: color , precio , marca y fecha
    private $color ;
    private $precio ;
    private $marca ;
    private DateTime $fecha;

    public function __construct()
    {
        //obtenemos un array de los agumentos pasados por el contructor
        $arrayParametros = func_get_args();

        //obtenemos la cantidad de parametros pasados por el constructor
        $cantidadParametros = func_num_args();

        //

    }

    function __construct0($marca , $color)
    {
        $this->marca = $marca;
        $this->color = $color;
    }







}



?>