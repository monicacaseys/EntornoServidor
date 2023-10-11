<?
$agenda_proxima_semana = [
    "lunes" => "Poner lavadora",
    "martes" => "Limpieza de la casa",
    "miercoles" => "Ir al supermercado",
    "jueves" => "Planchar",
    "viernes" => "Salir con los colegas",
    "sabado" => "Partido de padle",
    "domingo" => "Descansar"
    ];
    // clave =>valor

    function pintar ($agenda){
        foreach($agenda as $dia=>$tarea){
        echo "El dia ".$dia." tienes que hacer ".$tarea."<br>" ; //si son variables normales tanto . " no hace falta: "El dia $dia tienes que hacer $tarea<br>"
        }
       
    }
?>
