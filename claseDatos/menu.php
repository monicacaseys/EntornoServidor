<?php
// menu con los items que yo kiera sin que sean fijos por eso creo una clase
class Menu{
    private $items;
    private $orientacion;
    

    function __construct($items, $orientacion ){
        $this->items=$items;
        $this->orientacion=$orientacion;

    }

    function pintaMenu($orientacion){
        if($orientacion=="horizontal"){
            foreach($this->items as $item){
                echo "<span> ".$item . " </span>";
            }
        }
        if($orientacion=="vertical"){
            foreach($this->items as $item){
                echo "<ul>";
                echo "<li>$item</li>";
                echo "</ul>";
            }
        }
    }
}

$items= array('Home','Redes','Contacto');

$miMenu = new Menu($items,'horizontal');
$miMenu->pintaMenu("horizontal");

$miMenu = new Menu($items,'vertical');
$miMenu->pintaMenu("vertical");
