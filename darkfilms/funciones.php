<?php
session_start();
?>
<?php
// no tengo la sql  no se si funciona lo de permanencia de login.  falta añadir funcionalidad carrito
class conectar_db {
    private $host = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $db = "darkfilms";
    public $conexion;

    public function __construct() {
        // Constructor para establecer la conexión
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave, $this->db, 3307);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }

        $this->conexion->set_charset("utf8");
    }

    // CONSULTAR
    public function consultar($consulta) {
        $resultado = $this->conexion->query($consulta) or die($this->conexion->error);
        if ($resultado) {
            return $resultado;
        }
    }
    public function consultarValor($sql) {
        // Ejecutar la consulta
        $result = $this->conexion->query($sql);

        // Verificar si la consulta fue exitosa
        if ($result) {
            // Obtener el primer valor de la primera fila
            $row = $result->fetch_assoc();

            // Liberar el resultado y devolver el valor
            $result->free();
            return $row ? array_shift($row) : null;
        } else {
            // Si la consulta falla, puedes manejar el error aquí o devolver un valor predeterminado
            return null;
        }
    }

    // Contar resultados
    public function contar_resultados($consulta) {
        $resultado = $this->consultar($consulta);
        return $resultado->num_rows;
    }

    // CERRAR
    public function cerrar() {
        $this->conexion->close();
    }
}

function obtenerNombreCategoria($categoria_id, $categorias) {
    foreach ($categorias as $categoria) {
        if ($categoria['id'] == $categoria_id) {
            return $categoria['nombre'];
        }
    }
    return 'Categoría no encontrada';
}
function obtenerCategoriaPorId($categoria_id, $categorias) {
    foreach ($categorias as $categoria) {
        if ($categoria['id'] == $categoria_id) {
            return $categoria;
        }
    }
    return null; 
}

function volver() {
    header("Location: index.php");
}

?>
