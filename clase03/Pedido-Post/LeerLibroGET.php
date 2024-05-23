<?php

include('./libro.php');


var_dump($_GET);

//Si esta seteado ingresa
if(isset($_GET['titulo']))
{
    $_titulo = $_GET['titulo'];
    
    echo "<br>".$_titulo;
    
    
    Libro::encontrarPrecio($_titulo);

}else {
    echo "No existe la key titulo";
}












