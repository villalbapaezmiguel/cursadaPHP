<?php

include('../Aplicacion23/Usuario.php');
include('../Aplicacion23/MoverArchivo.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['nombre']) && isset($_POST['clave']) && isset($_POST['mail']))
    {
        $usuario = new Usuario($_POST['nombre'],$_POST['clave'],$_POST['mail'], Usuario::GenerarId(), date('Y-m-d'));

        if(Usuario::AgregarJSON($usuario) == 0)
        {
            $carpeta = "./Usuarios/Fotos/";
            if(file_exists($carpeta))
            {
                if(Mover::MoverArchivoFoto($_FILES["archivo"]['name'],
                    $_FILES["archivo"]['type'],
                    $carpeta,
                    $_FILES["archivo"]["tmp_name"]) 
                    == 0)
                {
                    echo json_encode(["Exito" => "Se agrego correctamente"]);
                }
            }
        }else {
            echo json_encode(["ERROR" => "No se pudo agregar al usuario..."]);
        }
    }else {
        echo json_encode(["ERROR" => "Falta rellenar informacion"]);
    }

}else{
    echo json_encode(["ERROR" => "No es por POST"]);
}











