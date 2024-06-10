<?php

    var_dump($_FILES);

    $destino = "uploads/".$_FILES["foto"]["name"];
    if(move_uploaded_file($_FILES["foto"]["tmp_name"],$destino) == true)
    {
        echo "<br> Archivo recibido y movido correctamente";
    }else{

        echo "<br> Error..";
    }










