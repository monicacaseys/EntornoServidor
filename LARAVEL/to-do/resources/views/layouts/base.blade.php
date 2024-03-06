<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa; /* Fondo gris claro */
        }

        .container {
    background-color: #cce5ff; /* Fondo azul claro */
    border: 1px solid #d6d8db; /* Borde gris claro */
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.5); /* Sombra degradada blanca */
    padding: 20px;
    border-radius: 10px;
    margin-top: 50px;
    margin-left: auto; /* Centra horizontalmente */
    margin-right: auto; /* Centra horizontalmente */
    max-width: 800px; /* Opcional: establece un ancho máximo para el contenedor */
}

        .btn-custom {
            background-color: #007bff; /* Fondo azul oscuro */
            color: #fff; /* Texto blanco */
        }

    </style>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
