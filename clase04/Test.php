<?php

class Registro{

    private $_nombre;
    private $_clave;
    private $_mail;
    private $_id;
    private $_fecha;

    public function __construct($nombre , $clave, $mail , $id = 0, $fecha = null)
    {
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_mail = $mail;
        $this->_id = $id;

        if($id == 0)
        {
            $id = random_int(1,1000);
        }

        if($fecha == null)
        {
            $auxFecha = new DateTime();
            $fecha = $auxFecha->format('m-d-y');
        }
        $this->_fecha = $fecha;
        $this->_id = $id;
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
//seters
    public function SetNombre($nombre)
    {
        $this->_nombre = $nombre;
    }
    public function SetClave($clave)
    {
        $this->_clave = $clave;
    }
    public function SetMail($mail)
    {
        $this->_mail = $mail;
    }
    public function SetId($id)
    {
        $this->_id = $id;
    }
    public function SetFecha($fecha)
    {
        $this->_fecha = $fecha;
    }

    public static function AgregarJSON(Registro $nuevoUsuario)
    {
        /*
        $archivo = fopen("usuarios.json","a");
        if(fputs($archivo,json_encode($nuevoUsuario->toArray()) . PHP_EOL) >= 1)
        {
            echo "<br> El objeto se pudo pasar a JSON";
        }else{
            echo "<br> Ocurrio un error";
        }
        fclose($archivo);*/
        $archivo = fopen("usuarios.json","a");
        fputs($archivo,json_encode(Registro::CasteoGenerico($nuevoUsuario)));
        //fputs($archivo , json_encode($nuevoUsuario->toArray()));
        fclose($archivo);

        //hay un error y es que tenemos que hacer :
        //traer la informacion del archivo
        //agregarlo al nuevo cargar
        //transformarlo en un array y volverlo a guardar
        //ENCONTRAR LA FORMA    

    }

    public static function LeerJSON($json)
    {
        $archivo = fopen($json,'r');
        $info = fread($archivo, filesize($json));
        $decodificado = json_decode($info);
        fclose($archivo);
        var_dump($decodificado);

    }

    private function toArray() {
        return [
            'nombre' => $this->_nombre,
            'clave' => $this->_clave,
            'mail' => $this->_mail,
            'id' => $this->_id,
            'fecha' => $this->_fecha
        ];
    }

    public static function Casteo($objeto)
    {
        $nuevo = new Registro($objeto["nombre"],$objeto["clave"],$objeto["mail"]);
        return $nuevo;
    }

    public static function CasteoGenerico(Registro $objeto)
    {
        $objetoGenerico = new stdClass();//te crea un objeto generico

        $objetoGenerico->_nombre = $objeto->GetNombre();
        $objetoGenerico->_clave = $objeto->GetClave();
        $objetoGenerico->_mail = $objeto->GetMail();
        $objetoGenerico->_id = $objeto->GetId();
        $objetoGenerico->_fecha = $objeto->GetFecha();

        return $objetoGenerico;
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
            $nuevoUsuario = new Registro($nombre,$clave,$mail,$id,$fechaString);
            Registro::AgregarJSON($nuevoUsuario);//No me codifica el objeto al formato json
            echo "<br>";
            echo Registro::LeerJSON("usuarios.json");//Seguimois copn los problemas para convertir a JSON 32:30
        }else{
            echo "<br> hay campos vacios..";
        }
    }else{
        echo "<br> la variable no esta definina y puede ser null ";
    }



}



























