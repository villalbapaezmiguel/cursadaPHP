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

    public static function ImprimirListaUsuario()
    {
        $_arrayUsuario = Usuario::ListaUsuario();
        foreach ($_arrayUsuario as $usuario) {
            # code...
            Usuario::Mostrar($usuario);
        }
    }

    public static function ListaUsuario()
    {
        return Usuario::MostrarUsuariosCSV('listaUsuario.csv');
    }

    public static function VerifcarEmail($_email)
    {
        $exito = -1;
        $lista = Usuario::ListaUsuario();
        foreach($lista as $usuario)
        {            
            if(trim($usuario->GetMail()) === trim($_email))
            {
                $exito = 0;
                break;
            }
        }
        return $exito;
    }

    public static function VerifcarClave($_clave)
    {
        $exito = -1;
        $lista = Usuario::ListaUsuario();
        foreach($lista as $usuario)
        {
            if($usuario->GetClave() == $_clave)
            {
                $exito = 0;

                break;
            }
        }
        return $exito;
    }



    public static function VerificarUsuario($clave, $mail)
    {
        $_verificado = -1;

        if(!empty($clave) || !empty($mail))
        {
            if(Usuario::VerifcarClave($clave) == 0 
            && Usuario::VerifcarEmail($mail) == 0)
            {
                //si el usuario existe y la clave tambien coincide
                $_verificado = 0;
            }

            if(Usuario::VerifcarEmail($mail) == 0 && Usuario::VerifcarClave($clave) == -1)
            {
                //Error en los datos si esta mal la clave
                $_verificado = 1;
            }

            if(Usuario::VerifcarEmail($mail) == -1 && Usuario::VerifcarClave($clave) == 0)
            {
                $_verificado = 2;
            }

        }else{
            echo "<br> Los campos estan vacios..";
        }   
        
        return $_verificado;
    }

}





























