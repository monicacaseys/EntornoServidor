<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Header con Imágenes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center; /* Centra verticalmente el contenido */
        }

        #logo {
            width: 100px; /* Ajusta el ancho del logo según tus necesidades */
            height: auto;
            cursor: pointer;
        }

      
        #cabecera {
            display: flex;
            flex-grow: 1; /* Permite que #cabecera ocupe todo el espacio disponible */
            justify-content: space-evenly; /* Centra horizontalmente el contenido al principio del contenedor */
            align-items: center;
           margin-left:0;
        }

        #navigation-icons {
            display: flex;
            padding: 30px;
            margin: 30px;
        }

        
    </style>
</head>
<body>

    <header>
        <div id="cabecera">
            <div>
                <img id="logo" src="OIP.JPEG" alt="Logo" onclick="location.href='index.php';">
            </div>
            <div>
                <a href="https://es.cooltext.com"><img src="https://images.cooltext.com/5679021.png" width="238" height="83" alt="darkfilms"></a>
            </div>
        </div>
        <div id="navigation-icons">
            <img src="usu.png" alt="Login" width="45" height="45" onclick="location.href='login.php';">
            <img src="E.png" width="45" height="45" alt="Buscar" onclick="showSearchBox();">
        </div>
    </header>

    <!-- El resto de tu contenido va aquí -->

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


