<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<h1>Datos del nuevo alumno</h1>

    <form method="POST" action="insertar_alumno.php">
        
    <label class='form-label'>Nombre</label>
    <input class='form-control' type='text' name='nombre' >
    <label class='form-label'>Apellidos</label>
    <input class='form-control' type='text' name='apellidos'>
    <label class='form-label'>DNI</label>
    <input class='form-control' type='text' name='dni'>
    <label class='form-label'>Teléfono</label>
    <input class='form-control' type='text' name='telefono'>

    <input type='submit' value='Enviar'>



    </form>
</body>
</html>