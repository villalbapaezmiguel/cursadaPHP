<?php
//Villalba Paez Miguel Antonio
//Ejercicio 20BIS

include('./Usuario.php');

if(isset($_POST['nombre']) && $_POST['clave'] && $_POST['mail'] )
{
    $_nombre = $_POST['nombre'];
    $_clave = $_POST['clave'];
    $_mail = $_POST['mail'];

    Usuario::AltaUsuario(new Usuario($_nombre,$_clave,$_mail));


}else{
    echo "<br> Los parametros estan mal o no existen...";
}











