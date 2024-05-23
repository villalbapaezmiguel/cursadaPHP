<?php

class Usuario {

    private $_nombre;
    private $_clave;
    private $_mail;

    public function __construct($nombre, $clave , $mail)
    {
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_mail = $mail;
    }

    public function GetNombre()
    {
        return $this->_nombre;
    }
    public function GetClave()
    {
        return $this->_clave;
    }
    public function GetMail()
    {
        return $this->_mail;
    }

    public static function AltaUsuario(Usuario $_usuario)
    {
        if(!is_null($_usuario))
        {
            $archivo = fopen('usuarios.csv','a');

            $informacion = $_usuario->GetNombre() . " - " . $_usuario->GetClave() . " . " . $_usuario->GetMail() . PHP_EOL;

            $resultado = fwrite($archivo,$informacion);
            if($resultado)
            {
                echo "<br> Se escribio Correctamente";
            }else{
                echo "<br> Ocurrio un error..";
            }

            fclose($archivo);

        }else{
            echo "<br> No existe el usuario";
        }
    }


}








