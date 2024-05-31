<?php

class Registro {

    private $_nombre;
    private $_clave;
    private $_mail;
    private $_id;
    private $_fecha;

    public function __construct($nombre , $clave, $mail , $id , $fecha)
    {
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_mail = $mail;
        $this->_id = $id;
        if (is_string($fecha)) {
            $this->_fecha = new DateTime($fecha);
        } else {
            $this->_fecha = $fecha instanceof DateTime ? $fecha : null;
        }
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
    public function GetId()
    {
        return $this->_id;
    }
    public function GetFecha()
    {
        return $this->_fecha;
    }

    public static function AgregarJSON(Registro $nuevoUsuario)
    {
        $archivo = fopen('usuarios.json','a');
        fputs($archivo,json_encode($nuevoUsuario));
        fclose($archivo);
    }

    public static function LeerJSON($json)
    {
        $archivo = fopen($json,'r');
        $info = fread($archivo, filesize($archivo));
        $decodificado = json_decode($info);
        var_dump($decodificado);

    }


}


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['nombre']) && isset($_POST['clave']) && isset($_POST['mail']))
    {
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $mail = $_POST['mail'];

        if(!empty($nombre) && !empty($clave) && !empty($mail))
        {
            $id = random_int(1,1000);
            $fecha = new DateTime();
            $fechaString = $fecha->format('d-m-y');

            $nuevoUsuario = new Registro($nombre,$clave,$mail,$id,$fecha);
            Registro::AgregarJSON($nuevoUsuario);//No me codifica el objeto al formato json

            //echo "<br> ". $nombre . " " . $clave . " " . $mail ;
        }else{
            echo "<br> hay campos vacios..";
        }
    }else{
        echo "<br> la variable no esta definina y puede ser null ";
    }



}



























