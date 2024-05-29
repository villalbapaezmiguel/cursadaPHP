<?php 
include('./Usuario.php');

/*
Usuario::CargarUsuarioCSV(new Usuario('Jorge','12345','jorge@gmail.com'));
Usuario::CargarUsuarioCSV(new Usuario('Alexis','222','Alexis@gmail.com'));
Usuario::CargarUsuarioCSV(new Usuario('Migue','3333','Migue@gmail.com'));
Usuario::CargarUsuarioCSV(new Usuario('Oscar','4444','Oscar@gmail.com'));
Usuario::CargarUsuarioCSV(new Usuario('Raul','6666','Raul@gmail.com'));*/
$listadoUsarios = [];

if(isset($_GET['listado']) && $_GET['listado'] === 'usuarios' )
{
    echo "<br> si existe ese listado ";
    //Mostramos los datos del archivo.csv

    $listadoUsarios = Usuario::MostrarUsuariosCSV('usuarios.csv');

    if(count($listadoUsarios) >= 1)
    {
        foreach ($listadoUsarios as $objeto) {
            # code...
            Usuario::Mostrar($objeto);
        }
    }else{
        echo "<br> no hay listado";
    }


}else{
    echo "<br> NO existe..";
}








