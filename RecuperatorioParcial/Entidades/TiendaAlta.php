<?php
include('Producto.php');
include('Tienda.php');

echo "<br>Estas en tiendaAlta";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['tipo']) && isset($_POST['marca']) && isset($_POST['stock'])) 
    {


    } else {
        echo "<br>EEROR ,Falta rellenar datos..";
    }
} else {
    echo "<br>Tiene que estar en POst";
}


