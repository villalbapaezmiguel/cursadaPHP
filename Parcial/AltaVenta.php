<?php
include('./Entidades/Producto.php');
include('./Entidades/Venta.php');

if (isset($_POST['email'], $_POST['Nombre'], $_POST['Tipo'], $_POST['Marca'], $_POST['Stock'])) {
    $email = $_POST['email'];
    $nombre = $_POST['Nombre'];
    $tipo = $_POST['Tipo'];
    $marca = $_POST['Marca'];
    $stock = $_POST['Stock'];

    $archivo_tienda = 'tienda.json';
    $archivo_ventas = 'ventas.json';

    if (file_exists($archivo_tienda)) {
        $productos = json_decode(file_get_contents($archivo_tienda), true);
        if ($productos === null) {
            $productos = [];
        }

        $producto_encontrado = null;
        foreach ($productos as &$productoData) {
            $producto = new Producto(
                $productoData['ID'],
                $productoData['Nombre'],
                $productoData['Precio'],
                $productoData['Tipo'],
                $productoData['Marca'],
                $productoData['Stock']
            );

            if ($producto->nombre == $nombre && $producto->tipo == $tipo && $producto->marca == $marca) {
                $producto_encontrado = $producto;
                break;
            }
        }

        if ($producto_encontrado && $producto_encontrado->stock >= $stock) {
            $producto_encontrado->stock -= $stock;

            $ventas = file_exists($archivo_ventas) ? json_decode(file_get_contents($archivo_ventas), true) : [];
            $id_venta = count($ventas) + 1;
            $fecha_venta = date('Y-m-d H:i:s');
            $precio_total = $producto_encontrado->precio * $stock;

            $venta = new Venta(
                $id_venta,
                $email,
                $nombre,
                $tipo,
                $marca,
                $stock,
                $fecha_venta,
                $id_venta,
                $precio_total
            );

            $ventas[] = $venta;
            file_put_contents($archivo_ventas, json_encode($ventas));
            file_put_contents($archivo_tienda, json_encode($productos));

            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $imagen_nombre = $_FILES['imagen']['name'];
                $imagen_tmp = $_FILES['imagen']['tmp_name'];
                $nombre_usuario = explode('@', $email)[0];
                $carpeta_imagenes = 'ImagenesDeVenta/2024/';
                $nombre_imagen = "{$nombre}_{$tipo}_{$marca}_{$nombre_usuario}_{$fecha_venta}." . pathinfo($imagen_nombre, PATHINFO_EXTENSION);

                move_uploaded_file($imagen_tmp, $carpeta_imagenes . $nombre_imagen);
            }

            echo "Venta registrada correctamente";
        } else {
            echo "Producto no encontrado o sin stock suficiente";
        }
    } else {
        echo "No hay productos disponibles en la tienda";
    }
} else {
    http_response_code(400);
    echo "Faltan datos obligatorios";
}
?>
