<?php
//laterface no hace nada pero sus hijo ens quimplementar sus metodos
//proporciona un modelo para que tengan sus hijos, hay que iplementarlas y no tienen que estar vacias
//todas las funciones estan vacias
interface Animal {
    public function haz_ruido();

    public function muevete();

}

class Perro implements Animal{

    public function haz_ruido(){
        echo "guau";
    }

    public function muevete(){
        echo "camina a 4"
    }
}
class Pez implements Animal{

    public function haz_ruido(){
        echo "glu-glu";
    }

    public function muevete(){
        echo "nada con aletas"
    }
}