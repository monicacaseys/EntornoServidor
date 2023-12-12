<?php

Class Producto {
    private $precio;
    private $nombre;

    public function __construct() {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function obtenerNombre(){
        return $this -> nombre;
    }
    public function obtenerPrecio(){
        return $this -> precio;
    }
}

Class Carrito{
    private $productos = [];

    public function agregarProductos(Producto $producto, $cantidad){
        $this -> productos[] =['producto'=>$producto, 'cantidad'=>$cantidad];
         
        echo "$cantidad unidades de {$producto->obtenerNombre()} agregadas al carrito.</br>";

    }

    public function mostrarCarrito(){

        if (empty($this->productos)){
            echo "el carrito esta vacio";
        } else {
            echo "Contendo del carrito: </br>";
            foreach($this->productos as $item){
                $producto = $item['producto'];
                $cantidad = $item['cantidad'];

                echo "$cantidad unidades de {$productos->obtenerNombre()} a $" .number_format($producto->obtenerPrecio(),2). " cada uno </br>"; 
           }

        }
    }

    public function calcularTotal(){
        $total=0;
        foreach($this->productos as $item){
            $producto = $item ['producto'];
            $cantidad = $item ['cantidad'];
            $total += $cantidad * $producto ->obtenerPrecio();

        }
        echo "el total es: ". number_format($total,2);
    }
}


?>