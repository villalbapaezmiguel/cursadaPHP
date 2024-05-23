<?php
include('./libro.php');

if(isset($_POST['titulo']) && $_POST['precio'])
{
    $_titulo = $_POST['titulo'];
    $_precio = $_POST['precio'];
    
    $libro = new Libro($_titulo,$_precio);
    
    Libro::guardarLibro($libro);

}else{
    echo "<br> No se enviaron los parametros correspondientes";
}









