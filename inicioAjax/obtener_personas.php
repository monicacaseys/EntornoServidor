<?php
class conectar_db {
    private $host   = "localhost";
    private $usuario= "root";
    private $clave = "";
    private $db     = "personas";
    public $conexion;
    public function __construct() {
        // El constructor lleva la conexión
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave, $this->db);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }

        $this->conexion->set_charset("utf8");
    }
}

// Crear una instancia de la clase conectar_db
$conexion_db = new conectar_db();

// Obtener la conexión desde la instancia
$conexion = $conexion_db->conexion;

// Obtener el valor de 'sexo' enviado por AJAX
$sexo = $_POST['sexo'];

// Consulta SQL basada en la opción seleccionada
if ($sexo == 'hombres') {
    $sql = "SELECT * FROM listado_personas WHERE `COL 5` = 'Male'";
} elseif ($sexo == 'mujeres') {
    $sql = "SELECT * FROM listado_personas WHERE `COL 5` = 'Female'";
} elseif ($sexo == 'todos') {
    $sql = "SELECT * FROM listado_personas";
} else {
    die("Opción no válida");
}

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Imprimir resultados en formato de tabla con estilos de Bootstrap
    echo '<div class="table-responsive">';
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Nombre</th>';
    echo '<th>Apellidos</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['COL 1'] . '</td>';
        echo '<td>' . $row['COL 2'] . '</td>';
        echo '<td>' . $row['COL 3'] . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conexion->close();
?>

