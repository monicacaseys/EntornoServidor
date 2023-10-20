<?php
//tiene por lo menos un metodo abstract que esta vacia pero sus hijos si que tienen que implementarla. por lo menos un metodo es abtracto, y est avacio, pero el resto pueden ser nromales
abstract class encendible{
    abstract public function encender()

}
class Bombilla extends encendible{
    public function encender (){
        echo "La bombilla encendida"
    }
}