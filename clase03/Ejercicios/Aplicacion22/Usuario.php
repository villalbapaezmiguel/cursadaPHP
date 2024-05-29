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

    public static function CargarUsuarioCSV(Usuario $_usuario)
    {
        if(!is_null($_usuario))
        {
            $archivo = fopen('listaUsuario.csv','a');

            $informacion = $_usuario->GetNombre() . " - " . $_usuario->GetClave() . " - " . $_usuario->GetMail() . PHP_EOL;
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


    public static function MostrarUsuariosCSV($archivo)
    {
        $_arrayUsuario = array();

        $punteroArchivo = fopen($archivo,'r');

        while(($_arrayDatos = fgetcsv($punteroArchivo ,1000 ,'-')) !== false)
        {
            $_arrayUsuario[] = new Usuario($_arrayDatos[0],$_arrayDatos[1],$_arrayDatos[2]);
        }
        fclose($punteroArchivo);

        return $_arrayUsuario;
    }

    public static function Mostrar(Usuario $usuario)
    {
        echo "<br>". "Nombre : ". $usuario->GetNombre() . " - " . "Mail : ". $usuario->GetMail() . " - " . "Clave : ". $usuario->GetClave();
    }

    public static function VerificarUsuario($clave, $mail)
    {
        if(!empty($clave) || !empty($mail))
        {
            $arrayLisatado = Usuario::MostrarUsuariosCSV('listaUsuario.csv');

            if(count($arrayLisatado) >= 1)
            {
                foreach ($arrayLisatado as $usuario) {
                    # code...
                    //Verificado” si el usuario existe y coincide la clave también.
                    if($usuario->GetClave() == $clave && $usuario->GetMail() == $mail)
                    {
                        echo "<br> Verificado";
                        break;
                    }else if(($usuario->GetClave() == $clave) == false 
                    && $usuario->GetMail() == $mail)
                    {//“Error en los datos” si esta mal la clave
                        echo "<br> Error en los datos..";
                    }else if(($usuario->GetMail() == $mail) == false)
                    {
                        echo "<br>Usuario no registrado";
                    }
                }
            }else{
                echo "<br> no hay listado";
            }

        }else{
            echo "<br> Los campos estan vacios..";
        }
    }

}





























