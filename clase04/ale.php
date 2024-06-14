<?php

session_start();

switch($_SERVER["REQUEST_METHOD"])
{
    case "POST":        
        if(isset($_POST["nombre"]) && isset($_POST["apellido"]))
        {
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $_SESSION["usuario"] = array("nombre"=> $nombre , "apellido" => $apellido);
            echo "<br>Sesion iniciadad";
        }else {
            echo "<br> NOmbre y Apellido requeridos";
        }
        break;

    case "GET":
        if(isset($_SESSION["usuario"]))
        {
            $usuario = $_SESSION["usuario"];
            echo "<br> Bienvenido : ". $usuario["nombre"] ;
        }else{
            echo "<br> Sesion NO iniciadad";
        }
        break;    
    case "DELETE":
        session_destroy();
        echo "<br> Sesion destruida";
        break;


}

















