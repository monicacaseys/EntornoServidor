<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
<?php
if (!isset($_GET["pagina"])){
    $paginador=1;
}else{
    $paginador= $_GET["pagina"];
}

//mysqli = clase conexion a una bbdd

//$conexion =new mysqli("host","usuario","clave","bbdd");
$conexion=new mysqli("localhost","root","","gestion_practicas"); //constructor para crear la conexion, el xammp no tiene contraseña y el usuario siempre es root


if ($conexion -> connect_errno){
    echo "error de conexion";
}else{
    echo "la conexion se ha realizado con exito";
}
// $conexion->close(); //destruye la conexion
//consulta de cuantos alumnos hay
$sql = "SELECT COUNT(*) AS numero_alumnos FROM alumnos;";

$numero_alumno=$conexion-> query($sql);

while($row =$numero_alumno->fetch_array()){

    $cantidad=$row["numero_alumnos"];
}

echo $cantidad;

$numero_paginas=ceil($cantidad/10);

$inicio=($paginador-1)*10 + 1;
$sql ="SELECT * FROM alumnos LIMIT $inicio,10"; //consulta

$resultado = $conexion->query($sql);//que haga la consulta y la guardo el resultado en una variable y ese resultado un array asociativo
?>
<h1>Listado de alumnos</h1>
<!-- crear una tabla para los resultados -->
<table class="table table-striped">
    <tr>
        <td>ID</td>
        <td>Nombre</td>
        <td>Apellidos</td>
        <td>DNI</td>
        <td>Telefono</td>
        <td>Acción</td>
</tr>
<?php
//leemos los resultados de la consulta
//crear fila nueva para cada fila de la base de datos
//fectch array recupera cada fila del array asociativo de la avriable resultado y la saca asi, esa funcion hace todo el trabajo
while($row = $resultado->fetch_array()){
    echo "<tr>
            <td>".$row["id_alumno"]."</td> 
            <td>".$row["nombre"]."</td>
            <td>".$row["apellidos"]."</td>
            <td>".$row["dni"]."</td>
            <td>".$row["telefono"]."</td>
            <td><a href='datos_alumno.php?id_alumno=".$row["id_alumno"]."'>
                <i class='bi bi-pencil-square'></i></a></td>
            </tr>";
}
?>
<table>
<p style="text-align : center;">
<?php
echo "<ul class='pagination justify-content-center'>";
 for ($i=1;$i<=$numero_paginas;$i++){
    echo "<li><a class='page-link' href='conexion.php?pagina=$i'> $i </a></li>"; //cuando clico un umero recivo el numero por get y de ahi contruyo el inicio de mi pagina
 }
 echo "</ul>";
?>
</p>
</body>
</html>
