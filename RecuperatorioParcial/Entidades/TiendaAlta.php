<?php
include('Producto.php');
include('Tienda.php');

echo "<br>Estas en tiendaAlta";
$tienda = new Tienda("tienda.json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

    if (isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['tipo']) && isset($_POST['marca']) && isset($_POST['stock']) && isset($_FILES['archivo'])) {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $tipo = $_POST['tipo'];
        $marca = $_POST['marca'];
        $stock = $_POST['stock'];

        $carpeta = './ImagenesDeProductos/2024/';
        $imagen = GuardarImagen(
            $_FILES['archivo']['name'],
            $_FILES['archivo']['type'],
            $carpeta,
            $_FILES['archivo']['tmp_name']
        );

        var_dump($imagen);

        $nuevoProducto = new Producto($nombre, $precio, $tipo, $marca, $stock, $imagen);
        $tienda->agregarOActualizarProducto($nombre, $precio, $tipo, $marca, $stock, $imagen);
    } else {
        echo "<br>ERROR: Faltan datos por rellenar.";
    }
} else {
    echo "<br>ERROR: La solicitud debe ser POST.";
}

function GuardarImagen($nombre, $tipo, $carpeta, $tmp_name) {
    // Genera un nombre de destino seguro
    $nombreArchivo = pathinfo($nombre, PATHINFO_FILENAME) . '.' . pathinfo($nombre, PATHINFO_EXTENSION);
    $destino = $carpeta . $nombreArchivo;

    // Verifica que la carpeta exista y crea la carpeta si no existe
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }

    // Verifica el tipo de archivo
    if (!(strpos($tipo, "jpeg") || strpos($tipo, "png"))) {
        echo "<br>ERROR: Tipo de archivo no permitido.";
        return null;
    } else {
        if (move_uploaded_file($tmp_name, $destino)) {
            echo "<br>El archivo ha sido cargado correctamente.";
            return $destino;
        } else {
            echo "<br>ERROR: Ocurrió un error al mover el archivo.";
            return null;
        }
    }
}
?>
