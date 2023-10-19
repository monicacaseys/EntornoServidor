<?php
class Trabajador {

    protected $nombre;
    protected $sueldo;

    public function __construct($nombre , $sueldo){
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;

    }

    public function imprimir(){
        echo "El trabajador es " . $this->nombre . " y su sueldo es " . $this->sueldo;
        echo "<br>";
    }
}

class Dependiente extends Trabajador{

    public $tienda;

    public function __construct($nombre,$sueldo,$tienda){
        parent::__construct($nombre, $sueldo);
        $this->tienda =$tienda;
    }

    public function imprimir(){
       parent::imprimir();
       echo "La tienda esta en " . $this->tienda;
       echo "<br>";
    }
}

class Camionero extends Trabajador {
    public $matricula;

    public function __construct($nombre, $sueldo ,$matricula){
        parent::__construct($nombre, $sueldo);
        $this->matricula =$matricula;  
    }
    public function imprimir(){
        parent::imprimir();
        echo "el camion de matricula" . $this.->matricula . " es coducido por " . $this->nombre;
        echo "<br>";
     }

}
$currante = new Trabajador("Antonio", 24000);

//$currante->imprimir();

$dependiente = new Dependiente("manolo",25000, "Vialia");
//$dependiente->tienda="Centro comercial Larios";
$dependiente->imprimir();

$camionero= new Camionero("mo",60000,"urtg7");
$camionero->imprimir();