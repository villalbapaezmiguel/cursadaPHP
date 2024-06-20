<?php
include('Producto.php');
include('Tienda.php');

echo "<br>Estas en tiendaAlta";
$tienda = new Tienda("MiTienda");

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['tipo']) && isset($_POST['marca']) && isset($_POST['stock'])) 
    {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $tipo = $_POST['tipo'];
        $marca = $_POST['marca'];
        $stock = $_POST['stock'];
        $imagem = $_POST['imagen'];

        $carpeta = './ImagenesDeProducto/2024';
        $nuevoProducto = new Producto($nombre, $precio , $tipo ,$marca , $stock,$imagen);
        $tienda->AgregarOActulizarProductos('tienda.json',$nuevoProducto);
        GuardarImagen(
            $_POST['archivo']['name'],
            $_POST['archivo']['type'],
            $carpeta,
            $_FILES["archivo"]["tmp_name"]
        );
        
    } else {
        echo "<br>EEROR ,Falta rellenar datos..";
    }
} else {
    echo "<br>Tiene que estar en POst";
}

/*
function GuardarImagen()
{
    $carpeta = './ImagenesDeProducto/2024';
    $nombre = $_FILES["archivo"]['name'];
    $tipo= $_FILES["archivo"]['type'];
    $destino = $carpeta . $nombre . $tipo;

    if((strpos($tipo, 'jpeg') || strpos($tipo , 'png')))
    {
        if(move_uploaded_file($_FILES["archivo"]["tmp_name"],$destino))
        {
            echo "<br> El archivo ha sido cargado correctamente";       
        }else{
            echo "<br> Ocurrio un error al mover el archivo";
        }
    }
}*/

function GuardarImagen($nombre, $tipo , $carpeta ,$tmp_name)
    {
        $exito = -1;

        $destino = $carpeta . $nombre . $tipo;
        if(!(strpos($tipo,"jpeg") || strpos($tipo,"png")))
        {
            echo "<br> EEROR , conflictos con el tipo";
        }else{
            if(move_uploaded_file($tmp_name,$destino))
            {
                echo "<br> El archivo ha sido cargado correctamente";  
            }
        }
        return $exito;
    }

