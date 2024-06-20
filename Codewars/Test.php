<?php

class Usuario implements JsonSerializable{

    private $_nombre;
    private $_apellido;


    public function __construct($nombre,$apellido)
    {
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
    }

    public function GetNombre ()
    {
        return $this->_nombre;
    }
    public function GetApellido()
    {
        return $this->_apellido;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}


$user = new Usuario("migue","villalba");
$user3 = new Usuario("Abel","Villalba");


$contenido = file_get_contents('usuarios.json');

$jsonContenido = json_decode($contenido,true);

var_dump($jsonContenido);


$jsonContenido [] = $user3;

$arrayActualzado = json_encode($jsonContenido,JSON_PRETTY_PRINT);

if(file_put_contents('usuarios.json',$arrayActualzado))
{
    echo "<br> Se actualizo el JSON";
}else{
    echo "<br> ERROR....";
}


















