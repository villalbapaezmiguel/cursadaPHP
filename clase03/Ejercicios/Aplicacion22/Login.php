<?php
include("Usuario.php");


/*
Usuario::CargarUsuarioCSV(new Usuario('Jorge','12345','jorge@gmail.com'));
Usuario::CargarUsuarioCSV(new Usuario('Alexis','222','Alexis@gmail.com'));
Usuario::CargarUsuarioCSV(new Usuario('Migue','3333','Migue@gmail.com'));
Usuario::CargarUsuarioCSV(new Usuario('Oscar','4444','Oscar@gmail.com'));
Usuario::CargarUsuarioCSV(new Usuario('Raul','6666','Raul@gmail.com'));*/

$clave = $_POST['clave'];
$mail = $_POST['mail'];


echo "<br> Clave : " .$clave;
echo "<br> Mail : " .$mail;


Usuario::ImprimirListaUsuario();
$verificacion = Usuario::VerificarUsuario($clave,$mail);
echo $verificacion;

if($verificacion == 0)
{
    echo "<br> Verificado";
}
if($verificacion == 1)
{
    echo "<br> Error en los datos";
}
if($verificacion == 2)
{
    echo "<br> Usuarios no registrado";
}