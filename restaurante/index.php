<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Reserva tu Mesa</h1>
        <form action="" method="post">
            <div class="d-flex justify-content-between">
                <div class="p-2 border">
                    <label for="sillas">Personas</label>
                    <input type="number" class="form-control" name="sillas" id="sillas" required>
                </div>
                <div class="p-2 border">
                    <label for="dia">Día</label>
                    <input type="date" class="form-control" name="dia" id="dia" required>
                </div>
            </div>
            <div class="form-group text-center">
                <input class="submit-btn btn" type="submit" value="Reservar">
            </div>
        </form>
    </div>

    <?php
    include("./funciones.php");

    $conexion = new conectar_db;
    $reservaRealizada = false; // para decidir qué mensajes mostrar al usuario según el resultado de la operación de reserva.

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numComensales = $_POST["sillas"];
        $diaReserva = $_POST["dia"];

        // Verificar si se han proporcionado valores válidos
        if (!empty($numComensales) && !empty($diaReserva)) {
            // Obtener mesas disponibles con suficientes sillas y que no estén reservadas para el día seleccionado
            $sql = "SELECT m.id, m.sillas FROM mesa m
                    WHERE m.sillas = $numComensales AND m.id NOT IN (
                        SELECT r.mesa_id FROM reservas r
                        WHERE r.dia_reserva = '$diaReserva'
                    ) LIMIT 1"; // asi se detiene en el primer resultado que encuentra
            $resultado = $conexion->consultar($sql);

            if ($resultado->num_rows > 0) {
                // Recorrer las mesas disponibles
                while ($row = $resultado->fetch_assoc()) {
                    $mesaId = $row["id"];

                    // Realizar la reserva
                    $insertarReserva = "INSERT INTO reservas (mesa_id, num_comensales, dia_reserva) VALUES ($mesaId, $numComensales, '$diaReserva')";
                    if ($conexion->consultar($insertarReserva) === true) {
                        $reservaRealizada = true;
                        echo "<script>alert('Reserva realizada con éxito.');</script>";
                        break; // Salir del bucle si se realizó la reserva
                    } else {
                        echo "<script>alert('Error al realizar la reserva: " . $conexion->error() . "');</script>";
                    }
                }
            } else {
                echo "<script>alert('No hay mesas disponibles con suficientes sillas para el número de comensales seleccionado en la fecha indicada.');</script>";
            }
        } else {
            echo "<script>alert('Por favor, selecciona el número de comensales y la fecha antes de reservar.');</script>";
        }
    }
    ?>
</body>

</html>

