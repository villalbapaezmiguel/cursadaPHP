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

                $arrayUsuarios = Usuario::LeerJSON('usuarios.json');
                //var_dump($arrayUsuarios);
                if($arrayUsuarios != null)
                {
                    foreach($arrayUsuarios as &$usuario)
                    {
                        echo $usuario->GetNombre();
                        //echo  var_dump($usuario) . "<br>";                       
                    }
                }

                break;
            default : echo json_encode(["ERROR" => "No existe ese listado..."]);
        }

    }
}


























