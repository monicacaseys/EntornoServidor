<?php

class monedero{
    private $cantidad;
    
    public function __construct($cantidad_inicial) {
        $this->cantidad = $cantidad_inicial;
    }

    public function pagar_con_monedero($cantidad_a_pagar) {
        if ($this->cantidad >= $cantidad_a_pagar) {
            $this->cantidad -= $cantidad_a_pagar;
            echo "Pago exitoso. Cantidad restante en el monedero: $this->cantidad";
        } else {
            echo "No hay suficiente dinero para pagar. Cantidad: $this->cantidad";
        }
    }

    public function incrementarMonedero($cantidad_a_incrementar) {
        $this->cantidad += $cantidad_a_incrementar;
        echo "Monedero incrementado. Nueva cantidad: $this->cantidad";
    }
}

    ?>


