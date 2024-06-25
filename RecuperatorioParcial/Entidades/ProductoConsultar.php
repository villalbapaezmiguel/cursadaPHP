<?php

echo "<br>Estoy en Producto consulta";
include('Producto.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{   



}else {
    echo "<br> Estas consultas tienen que ser por POST";
}

function Consulta($nombre , $tipo , $marca , $archivo)
{
    
}







