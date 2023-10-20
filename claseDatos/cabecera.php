<?php

class Cabecera{

    private $titulo;
    private $background;
    private $alienacion;

    function __construct($titulo, $background, $alienacion ){
        $this->titulo=$titulo;
        $this->background=$background;
        $this->alienacion=$alienacion;
    }

    function pintaCabecera(){
            echo "<div style='background-color: ".$this->background."; text-align: ".$this->alienacion."'>"; //lo que son comillas dosbles de normal aqui son simples
            echo "<h1>$this->titulo</h1>";
            echo "</div>";
    //        echo "<h1 style= text-align: ".$this -> alineacion."; backgroung-color:". $this -> colorFondo.">".$this -> titulo."</h1>";
    }
}

$cabecera= new Cabecera("Hola","red","center");
$cabecera->pintaCabecera();