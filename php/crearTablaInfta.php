<?php
function tableador($num_fila,$num_columna){
echo "<table>";
for ($fila=1; $fila<=$num_fila;$fila++){
    if($fila%2==0){
        echo "<tr style='background-color:#ccc'>";
    }else{
        echo "<tr>";
    }
    echo "<tr>";// si hay comillas dobles sabe si hay una variable si son simples no
    for($columna=1; $columna<=$num_columna;$columna++){
        echo "<td>Fila$fila Columna $columna </td>";
    }
    echo "</tr>";
}
echo "</table>";
}

tableador(3,5);
?>