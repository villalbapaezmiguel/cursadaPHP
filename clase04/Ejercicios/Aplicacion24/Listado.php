<?php
include('../Aplicacion23/Usuario.php');

if($_SERVER['REQUEST_METHOD'] == "GET")
{
    if(isset( $_GET['listado']))
    {
        $metodo = $_GET['listado'];
        switch($metodo)
        {
            case "usuarios":

                $arrayUsuarios = [];
                $arrayUsuarios = Usuario::LeerJSON('usuarios.json');
                //var_dump($arrayUsuarios);
                foreach($arrayUsuarios as $usuario)
                {
                    echo Usuario::Mostrar($usuario);
                }
                break;
            default : echo json_encode(["ERROR" => "No existe ese listado..."]);
        }

    }
}


























