<?php
session_start();
?>
<?php
// no tengo la sql  no se si funciona lo de permanencia de login.  falta añadir funcionalidad carrito
class conectar_db {
    private $host = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $db = "tienda_virtual";
    public $conexion;

    public function __construct() {
        // Constructor para establecer la conexión
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave, $this->db, 3306);

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

function volver() {
    header("Location: index.php");
}

?>
