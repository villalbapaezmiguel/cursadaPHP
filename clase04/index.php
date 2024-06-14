<?php
//verificamos que el parametro accion este definido
if(isset($_GET['accion']))
{
    switch($_SERVER["REQUEST_METHOD"])
    {
        case "GET":
            switch($_GET["accion"])
            {
                case "sesion":
                    include('./sesion.php');
                    break;
                case "cookies":
                    include('./cookies.php');
                    break;
                case "json":
                    include('./');
                    break;
                default :
                    echo "<br>Parametro de accion no definido..";
                    break;
            }
        break;
        case "POST":
            switch($_GET["accion"])
            {
                case "archivo":
                    include('./archivo.php');
                break;
                case "archivoSimple":
                    include('./archivoSimple.php');
                break;
                default :
                    echo "<br> Parametro accion no permitido..";
                break;
            }
        break;
    
    
    }
}













