<?php
class Producto {
    public $id;
    public $nombre;
    public $precio;
    public $tipo;
    public $marca;
    public $stock;

    public function __construct($id, $nombre, $precio, $tipo, $marca, $stock) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->tipo = $tipo;
        $this->marca = $marca;
        $this->stock = $stock;
    }

    public function actualizarStockYPrecio($nuevoPrecio, $cantidad) {
        $this->precio = $nuevoPrecio;
        $this->stock += $cantidad;
    }
}
?>
