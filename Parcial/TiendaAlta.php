<?php
include('./Entidades/Producto.php');

if (isset($_POST['Nombre'], $_POST['Precio'], $_POST['Tipo'], $_POST['Marca'], $_POST['Stock'])) {
    $nombre = $_POST['Nombre'];
    $precio = $_POST['Precio'];
    $tipo = $_POST['Tipo'];
    $marca = $_POST['Marca'];
    $stock = $_POST['Stock'];

    $archivo = 'tienda.json';
    if (file_exists($archivo)) {
        $productos = json_decode(file_get_contents($archivo), true);
        if ($productos === null) {
            $productos = [];
        }
    } else {
        $productos = [];
    }

    $producto_existente = false;
    foreach ($productos as &$productoData) {
        $producto = new Producto(
            $productoData['ID'],
            $productoData['Nombre'],
            $productoData['Precio'],
            $productoData['Tipo'],
            $productoData['Marca'],
            $productoData['Stock']
        );

        if ($producto->nombre == $nombre && $producto->tipo == $tipo) {
            $producto_existente = true;
            $producto->actualizarStockYPrecio($precio, $stock);
            break;
        }
    }

    if (!$producto_existente) {
        $id = count($productos) + 1;
        $productos[] = [
            'ID' => $id,
            'Nombre' => $nombre,
            'Precio' => $precio,
            'Tipo' => $tipo,
            'Marca' => $marca,
            'Stock' => $stock
        ];
    }

    file_put_contents($archivo, json_encode($productos));

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $carpeta_imagenes = 'ImagenesDeProductos/2024/';
        move_uploaded_file($imagen_tmp, $carpeta_imagenes . $nombre . '_' . $tipo . '.' . pathinfo($imagen_nombre, PATHINFO_EXTENSION));
    }

    echo "Producto agregado correctamente";
} else {
    http_response_code(400);
    echo "Faltan datos obligatorios";
}
?>
