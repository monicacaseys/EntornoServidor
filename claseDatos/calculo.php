<?php

abstract class Operacion{
    private $num1;
    private $num2;

    public function operar (){}

    
}

class Suma extends Operacion{
    function __construct($num1, $num2 ){
        $this->num1=$num1;
        $this->num2=$num2;
    }
    public function operar (){
     echo "la suma es " . ($this->num1 + $this->num2);
    }

}

class Suma extends Operacion{
    function __construct($num1, $num2 ){
        $this->num1=$num1;
        $this->num2=$num2;
    }
    public function operar (){
     echo "la suma es " . ($this->num1 + $this->num2);
    }

}
$suma=new Suma(2,2);
$suma->operar();