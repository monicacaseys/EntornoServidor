<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Modificar Tarea</title>
</head>
<body>
    <?php
    include("./funciones.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $conexion = new conectar_db;
        $sql ="SELECT * FROM tareas WHERE id = $id"; //consulta

        $resultado = $conexion->consultar($sql);
        $tarea = $resultado->fetch_array();

        if(isset($_POST['guardar'])){
            // Aquí deberías recoger los datos del formulario y actualizar la tarea en la base de datos.
            $titulo_nuevo = $_POST['titulo'];
            $descripcion_nueva = $_POST['descripcion'];
            $categoria_nueva = $_POST['categoria'];

            $sql_actualizar = "UPDATE tareas SET titulo='$titulo_nuevo', descripcion='$descripcion_nueva', categoria='$categoria_nueva' WHERE id=$id";
            $conexion->consultar($sql_actualizar);
            volver();
        }
    ?>
    <div class="container mt-5">
        <div class="border p-4">
            <h1 class="text-center">Modificar Tarea</h1>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título:</label>
                    <input type="text" class="form-control" name="titulo" value="<?php echo $tarea['titulo']; ?>">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea class="form-control" name="descripcion"><?php echo $tarea['descripcion']; ?></textarea>
                </div>
                <div class="mb-3">
                     <label for="categoria">Categoría:</label>
                       <select name="categoria" required>
                       <option value="ocio">Ocio</option>
                       <option value="hogar">Hogar</option>
                       <option value="trabajo">Trabajo</option>
                       <option value="compras">Compras</option>
                         <option value="nueva">Añadir Nueva Categoría</option>
                       </select><br><br>
                       <?php
if(isset($_POST['agregar']) && $_POST['categoria'] === 'nueva'){
    echo '<input type="text" name="nuevaCategoria" required>';
}
?>
               </div>

                <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
            </form>
        </div>
    </div>

    <?php
        } else {
            echo "No se ha proporcionado un ID válido.";
        }
    ?>
</body>
</html>
