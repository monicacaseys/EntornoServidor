<?
$clase = [
["nombre" =>"Francisco López", "email" => "flopez@gmail.com", "telefono" => 655456578],
["nombre" =>"Francisco López", "email" => "flopez@gmail.com", "telefono" => 655456578],
["nombre" =>"Francisco López", "email" => "flopez@gmail.com", "telefono" => 655456578],
["nombre" =>"Francisco López", "email" => "flopez@gmail.com", "telefono" => 655456578],
["nombre" =>"Francisco López", "email" => "flopez@gmail.com", "telefono" => 655456578]
];

?>
<table>
<!-- //cabecera -->
<tr>
<td>Nombre</td>
<td>Email</td>
<td>Telf</td>
</tr>

<?php

foreach ($clase as $datos){
 //fila . Para hacerlo bien y concatenar hay qu eponer ". ." y asi se concatena
    echo "<tr> 
        <td>".$datos["nombre"]."</td>,
        <td>".$datos["email"]."</td>,
        <td>".$datos["telefono"]."</td
    </tr>";
}
?>

</table>