<?php

class Usuario implements JsonSerializable{

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
    }

    public static function GenerarId()
    {
        return random_int(1,10000);
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
    public function GetFecha()
    {
        return $this->_fecha;
    }
    // Implementar el método jsonSerialize
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public static function AgregarJSON(Usuario $nuevoUsuario)
    {
        $exito = -1;
        $archivo = "usuarios.json";
        $usuariosExistentes = [];

        if(file_exists($archivo))
        {
            $contenidoArchivo = file_get_contents($archivo);
            $usuariosExistentes = json_decode($contenidoArchivo,true);

            if($usuariosExistentes === null)
            {
                $usuariosExistentes = [];
            }
        }

        //agregamos al usuario al array existente
        $usuariosExistentes [] = $nuevoUsuario;

        //codificar el array completo a json
        $jsonActualizado = json_encode($usuariosExistentes,JSON_PRETTY_PRINT);

        //guardar el json actualizado en el archivo
        if(file_put_contents( $archivo,$jsonActualizado))
        {
            $exito = 0;
        }

        return $exito;
    }


    public static function LeerJSON($rutaJSON)
    {
        $arrayUsuarios = array();

        if(file_exists($rutaJSON))
        {
            $contenidoArchivo = file_get_contents($rutaJSON);
            $arrayUsuarios = json_decode($contenidoArchivo,true);

        }else{
            echo json_encode(["ERROR" => "Esta ruta no existe.."]);
        }
        return $arrayUsuarios;
    }

    public static function Mostrar($usuario)
    {
        echo "Nombre : ". $usuario->GetNombre();
        echo "Clave : ". $usuario->GetClave();
        echo "Mail : ". $usuario->GetMail();
        echo "Fecha : ". $usuario->GetFecha();
        echo "<br><br> ";
    }

}














