<?php

class Usuario implements JsonSerializable{

    private $_nombre;
    private $_clave;
    private $_email;
    private $_id;


    public function __construct($nombre , $clave , $email)
    {
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_email = $email;
        $this->_id = $this->NuevoId();
    }

    public static function NuevoId()
    {
        return random_int(1,100000);
    }

    public function GetNombre()
    {
        return $this->_nombre;
    }
    public function GetClave()
    {
        return $this->_clave;
    }
    public function GetEmail()
    {
        return $this->_email;
    }
    public function GetId()
    {
        return $this->_id;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }


    


}






