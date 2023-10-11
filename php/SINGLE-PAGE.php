<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <from id="mi formulario" action="" method="GET">
        <label>Titulo del comic *</label>
        <input type="text" name="titulo" placeholder="Titulo del comic"> 
        <br>
        <label>Editorial</label>
        <input type="text" name="editorial" > 
        <br>
        <input type="submit" value="Enviar" > 
    </from>
    <h5>los campos con asteriscos son obligatorios</h5>

    <?
    if(isset($_POST)){
        if($_POST["titulo"]==""){
            echo "escribe el titulo o me cago en tu pecho";
        }
        if($_POST["editorial"]==""){
            echo "escribe el titulo o me cago en tu pecho";
        }
    }
    //  Respuesta PHP al formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //  Recibimos la información del formulario mediante POST
    $titulo = $_POST["titulo"];
    $editorial = $_POST["editorial"];
    
    //  Mostramos la información en párrafmos HTML
    echo "<p>$titulo</p>";
    echo "<p>$editorial</p>";
    }
    
    ?>
</body>
</html>