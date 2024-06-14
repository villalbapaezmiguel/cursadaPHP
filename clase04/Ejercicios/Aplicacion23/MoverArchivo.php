<?php

class Mover{

    public static function MoverArchivoFoto($nombre, $tipo , $carpeta ,$tmp_name)
    {
        $exito = -1;

        $destino = $carpeta . $nombre;
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



}


/*

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
*/












