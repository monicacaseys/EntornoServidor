<h1>
<?php
echo "hola";
$variable="moni";
$cantidad=23;

function mi_funcion(){
    //asi declaro una variable global aunq este dentro de una funcion
    global $mi_variable;
    $mi_variable=33;
};

$GLOBALS; //gurda todas las variables globales

$_POST;
//guarda valores de formularios Y VA POR DETRAS
//FORMULARIO: USUARIO INTERACTUA CO LA APP

//LAS VARIABLES DEL SISTEMA SON ARRAYS (GLOBALS Y GET Y POST)
$_SERVER;//GUARDA MUCHA CANTIDAD DE INFROMACION
//$_SERVER ["DOCUMENT_ROOT"];// GUARDA DONDE SE ENCUENNTRA LA RUTA FISICAMENTE

var_dump ($_SERVER); //muestra el array de lo k le indicas
$_COOKIE;
$_SESSION;
$_FILES; //GUARDA LOS ARCHIVOS 

$_GET //pasar variables por distintos archivos PROBLEA: los valores estan en la url y eso lo puedo modificar por eso un formulario n7unca puede ir con get
$valor+=34; // suma 34 a valor

$a=10;
$b=20,
if(&a<$b){
    echo "a es menor k b";
}
$a=true;
$b=false;
if($a&&$b){
    echo "es vdd";
}else{
    echo "es falso"; // seria falso porq no son los dos verdaderos pero si fuera || seria verdadero porque ya hay uno verdadero
}


?>
</h1>
