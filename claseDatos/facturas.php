<?php

class Facturas{

    private $dni;
    private $total;
    private $estado;


    function __construct($dni, $total ,$estado ="Pendiente"){
        $this->dni=$dni;
        $this->total=$total;
        $this->estado=$estado;
    }

    function imprime_factura(){
        echo "Cliente : " . $this->dni . "<br>";
        echo "Total : " . $this->total . "<br>";
        echo "Estado : " . $this->estado . "<br>";
    }
}

$factura = new Facturas("3332355H", 2000);
$factura->imprime_factura();