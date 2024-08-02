<?php

include('../Aplicacion25/Producto.php');
include('../Aplicacion23/Usuario.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $codigo = $_POST['codigo'];
    $idUsuario = $_POST['idUsuario'];
    $items = $_POST['items'];

    if(isset($codigo) && isset($idUsuario) && isset($items))
    {
        $arrayUsuario = Usuario::ListaUsuario();
        if($arrayUsuario != null)
        {
            
        }
    }

}else{
    echo json_encode(['ERROR' => 'Se espera que sea por POST']);
}












