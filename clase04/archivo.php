<?php

$carpeta_archivos = "Subida/";

$nombre_archivo = $_FILES["archivo"]['name'];
$tipo_archivo = $_FILES["archivo"]['type'];
$tamano_archivo = $_FILES["archivo"]["size"];


$destino_archivo = $carpeta_archivos . $nombre_archivo; 

if(!(strpos($tipo_archivo,"jpeg") || strpos($tipo_archivo,"png")) &&
$tamano_archivo < 100000 )
{
    echo "<br> El tamaño del archivo no debe pasar los 100kb";
}else{
    if(move_uploaded_file($_FILES["archivo"]["tmp_name"],$destino_archivo))
    {
        echo "<br> El archivo ha sido cargado correctamente";       
    }else{
        echo "<br> Ocurrio un error al mover el archivo";
    }

}




