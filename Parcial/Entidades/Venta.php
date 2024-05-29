<?php
class Venta {
    public $id;
    public $emailUsuario;
    public $nombreProducto;
    public $tipoProducto;
    public $marcaProducto;
    public $cantidad;
    public $fecha;
    public $numeroPedido;
    public $precioTotal;

    public function __construct($id, $emailUsuario, $nombreProducto, $tipoProducto, $marcaProducto, $cantidad, $fecha, $numeroPedido, $precioTotal) {
        $this->id = $id;
        $this->emailUsuario = $emailUsuario;
        $this->nombreProducto = $nombreProducto;
        $this->tipoProducto = $tipoProducto;
        $this->marcaProducto = $marcaProducto;
        $this->cantidad = $cantidad;
        $this->fecha = $fecha;
        $this->numeroPedido = $numeroPedido;
        $this->precioTotal = $precioTotal;
    }
}
?>
