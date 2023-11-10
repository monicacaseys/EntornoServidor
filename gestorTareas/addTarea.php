<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body >
    <?php
    include ("./funciones.php");
  //categorias disponibles
  $categorias_disponibles = array("ocio", "hogar", "trabajo", "compras");

  if(isset($_POST['agregar'])){
      $titulo_nuevo = $_POST['titulo'];
      $descripcion_nueva = $_POST['descripcion'];
      $categoria_seleccionada = $_POST['categoria'];

      // verificar si se seleccionó 'nueva' y si se proporciono un nombre para la nueva categoría
      if ($categoria_seleccionada === 'nueva' && !empty($_POST['nuevaCategoria'])) {
          $categoria_nueva = $_POST['nuevaCategoria'];
          
      } else {
          // si no es 'nueva' o no se proporciono un nombre, utilizar la categoría seleccionada
          $categoria_nueva = $categoria_seleccionada;
      }

      //utilizar $categoria_nueva en la inserción de la tarea
      $conexion = new conectar_db;
      $sql_insertar_tarea = "INSERT INTO tareas (titulo, descripcion, categoria) VALUES ('$titulo_nuevo', '$descripcion_nueva', '$categoria_nueva')";
      $conexion->consultar($sql_insertar_tarea);
      volver();
  }

    ?>
 
    <div class="container mt-5">
        <div class="border p-4">
            <h1 class="text-center">Agregar tarea</h1>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo: </label>
                    <input type="text" class="form-control" name="titulo">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion: </label>
                    <textarea class="form-control" name="descripcion"></textarea>
                </div>

                <div class="mb-3">
                <label for="categoria">Categoría:</label>
                    <select name="categoria" id="categoria" required>
    <?php
            // mostrar opciones de categorias
            foreach ($categorias_disponibles as $categoria) {
                echo "<option value=\"$categoria\">$categoria</option>";
            }
            ?>
                          <option value="nueva">Añadir Nueva Categoría</option>
                     </select>

        <?php
        // campo de texto para la nueva categoría
        echo '<input type="text" name="nuevaCategoria" placeholder="Nombre de la nueva categoría">';
        ?>
                </div>
                <input type="submit" name="agregar" value="Agregar">
            </form>
        </div>
    </div>

   
</body>
</html>






