<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Header con Imágenes</title>
    <style>
   body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #333;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333; /* Color de fondo del encabezado, puedes cambiarlo según tu diseño */
    padding: 10px; /* Añadir espaciado interno al encabezado */
    color: white; /* Color del texto, puedes cambiarlo según tu diseño */
}

.left, .center, .right {
    padding: 10px; /* Añadir espaciado interno a cada elemento del encabezado */
}

.right {
    display: flex;
}

.right div {
    margin-left: 10px; /* Añadir un pequeño espacio entre los elementos derechos */
}


        
    </style>
</head>
<body>
<header>
        <div class="left"> <img id="logo" src="OIP.JPEG" width="80" height="120" alt="Logo" onclick="location.href='index.php';"></div>
        <div class="center"><a href="https://es.cooltext.com"><img src="https://images.cooltext.com/5679021.png" width="238" height="83" alt="darkfilms"></a></div>
        <div class="right">
            <div><img src="usu.png" alt="Login" width="45" height="45" onclick="location.href='login.php';"></div>
            <div><img src="E.png" width="45" height="45" alt="Buscar" onclick="showSearchBox();"></div>
        </div>
    </header>

 

    <footer>
        <p>&copy; 2023 Blog de Películas</p>
    </footer>

    <script>
        function showSearchBox() {
            // Aquí puedes agregar la lógica para mostrar la caja de búsqueda
            alert("Implementa la lógica para la búsqueda aquí");
        }
    </script>
</body>
</html>


