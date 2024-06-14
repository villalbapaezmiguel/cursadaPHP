<?php

include('../Aplicacion23/Usuario.php');
include('../Aplicacion23/MoverArchivo.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $usuario = new Usuario($_POST['nombre'],$_POST['clave'],$_POST['mail'], Usuario::GenerarId(), date('Y-m-d'));

    if(Usuario::AgregarJSON($usuario) == 0)
    {
        $carpeta = "./Usuarios/Fotos/";
        if(Mover::MoverArchivoFoto($_FILES["archivo"]['name'],
            $_FILES["archivo"]['type'],$carpeta,
            $_FILES["archivo"]["tmp_name"]) 
            == 0)
        {
            echo "<br> Se agrego correctamente";
        }

    }else {
        echo "<br> NO , Ocurrio un error..";
    }

}else{
    echo "no es post";
}











