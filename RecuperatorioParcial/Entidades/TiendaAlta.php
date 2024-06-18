<?php
//include("./RecuperatorioParcial/Entidades/Producto.php");
include('Producto.php');

echo "<br>Estoy en tiendaAlta";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['tipo']) && isset($_POST['marca']) && isset($_POST['stock']) )
    {
        $producto = new Producto($_POST['nombre'],$_POST['precio'],$_POST['tipo'],$_POST['marca'],$_POST['stock']);

        if(Producto::AgregarJSON($producto) == 0)
        {
            
        }

    }else{
        echo "<br> Error , Hay parametros sin definir..";
    }

}






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




















