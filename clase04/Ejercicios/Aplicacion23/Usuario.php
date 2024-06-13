<?php

class Usuario{

    private $_nombre;
    private $_clave;
    private $_mail;
    private $_id;
    private $_fecha;

    public function __construct($nombre, $clave , $mail, $id = 0 , $fecha = null)
    {
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_mail = $mail;
        $this->_id = $id;
        $this->_fecha = $fecha;

        if(isset($this->_fecha))
        {
            
        }
    }







}














