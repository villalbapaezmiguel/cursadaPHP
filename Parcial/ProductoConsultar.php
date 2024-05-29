<?php
if (isset($_POST['Nombre'], $_POST['Tipo'], $_POST['Marca'])) 
{
    $nombre = $_POST['Nombre'];
    $tipo = $_POST['Tipo'];
    $marca = $_POST['Marca'];

    $archivo = 'tienda.json';
    if (file_exists($archivo)) 
    {
        $productos = json_decode(file_get_contents($archivo), true);

        $producto_existe = false;
        $tipo_existe = false;
        $nombre_existe = false;

        foreach ($productos as $producto) 
        {
            if ($producto['Nombre'] == $nombre && $producto['Tipo'] == $tipo && $producto['Marca'] == $marca) 
            {
                $producto_existe = true;
                break;
            }
            if ($producto['Tipo'] == $tipo) 
            {
                $tipo_existe = true;
            }
            if ($producto['Nombre'] == $nombre) 
            {
                $nombre_existe = true;
            }
        }

        if ($producto_existe) 
        {
            echo "existe";
        } else {
            if (!$nombre_existe && !$tipo_existe) 
            {
                echo "No existe ningún producto con ese tipo o ese nombre.";
            } elseif (!$nombre_existe) 
            {
                echo "No existe ningún producto con ese nombre.";
            } elseif (!$tipo_existe) 
            {
                echo "No existe ningún producto con ese tipo.";
            }
        }
    } else {
        echo "No existe ningún producto con ese tipo o ese nombre.";
    }
} else {
    http_response_code(400);
    echo "Faltan datos obligatorios";
}
?>
