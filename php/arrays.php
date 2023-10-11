<?
//crear tabla y columnas 
echo "<table>";
for ($fila=1; $fila<=10;$fila++){
    if($fila%2==0){
        echo "<tr style='background-color:#ccc'>";
    }else{
        echo "<tr>";
    }
    echo "<tr>";// si hay comillas dobles sabe si hay una variable si son simples no
    for($columna=1; $columna<=10;$columna++){
        echo "<td>Fila$fila Columna $columna </td>";
    }
    echo "</tr>";
}
echo "</table>";
//arry dias k tenemos clase
$clasesphp=[
    "lune"=>"no",
    "martes"=>"no",
    "miercoles"=>"si",
    "jueves"=>"si",
    "viernes"=>"si",
    
];
//crear array 3 macras coche
$marcaCoche=["mutsubisi","seat","mustang"];

//imprimir array
for($i=0;$i<count($marcaCoche);$i++){
    echo $marcaCoche[$i];
}

foreach ($marcaCoche as $coche){
    echo $coche;
}
  

$numeros=[2,3,6,76,87,34];
foreach ($numeros as $numero){
    echo $numero;
}

$suma=0;
foreach ($numeros as $numero){
$suma+=$numero;
}
echo "la suma es $suma";

$personas =array(
    array(
        "nombre"=>"pepe",
        "edad"=>34
    ),
    array(
        "nombre"=>"mar",
        "edad"=> 80
    )
    );
    //imprimir
    var_dump($personas[0]["nombre"]);

$deportes= array(
    "Futbol"=> array (
        "RM",
        "B",
        "v"
    ),
    "Motor"=>array(
        "vr",
        "FA"
    ),
    "baloncesto"=>array(
        "rr",
        "hh"
    )
    );

echo $deportes ["Futbol"][2]; //imprive v
// imprimir todos los array del array deportes
foreach ($deportes as $deporte){
   foreach ($deporte as $equipo){ // asi lee todos los array que tiee dentro el array deportes
    echo $equipo;
   }
};

function sumar($a,$b){
    $sumar=$a+$b;
    echo $sumar;
   // return $sumar;
    //cuando no hay un return se llama procedimie las dos cosas no se pueden hacer. bCuando devuelve algo es una funcion.
}

//llamo a la funcion
echo sumar(34,54); //o guardarlo en una variable

$alumnos = array(
    array("nombre" => "Manolo Pérez", "nota" => 6.5),
    array("nombre" => "Antonio Pérez", "nota" => 8),
    array("nombre" => "María Gómez", "nota" => 9.1),
    array("nombre" => "Manolo Pérez II", "nota" => 7.5),
    array("nombre" => "Antonio Pérez II", "nota" => 9),
    array("nombre" => "María Gómez II", "nota" => 8.1),
    array("nombre" => "Manolo Pérez III", "nota" => 3.5),
    array("nombre" => "Antonio Pérez III", "nota" => 7),
    array("nombre" => "María Gómez III", "nota" => 6.1)
);
    

    function nota_media($array_alumnos){
        $suma=0;// guardar las notas en la variable
     foreach($array_alumnos as $alumno){ //el primer valor de alumno sera el array de manolo completo
        $suma=$suma+$alumno["nota"];
     }
     $numero_alumnos=count($array_alumnos);

     $media=$suma / $numero_alumnos;

     return $media;
    }

    echo nota_media;

    //funcion k sume 4 numero y  imprima el resultado+

    function sumaNum ($a,$b,$c,$d){
  
        return $a+$b+$c+$d;
    }

    echo sumaNum(1,2,3,4);

    //funcion que suma muchos numeros
    function sumarMuchos($numeros){
    $sumar=0;
    foreach($numeros as $numero){
        $sumar+=$numero;
    }
    return $sumar;
    }

    $seis_num=[2,3,4,5,6,7];
    echo sumar($seis_num);

    //definir constantes
    

?>