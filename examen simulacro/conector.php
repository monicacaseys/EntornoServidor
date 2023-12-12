<?php

class conector_db{
    private $host   = "localhost";
    private $usuario= "root";
    private $password = "";
    private $db     ="simulacroExamen";
    public $conexion;
    public function __construct(){
        // El constructor lleva la conexión
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave, $this->db, 3306);

    
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    
    }
    

    // Método de consulta por clave primaria
    public function consultarRegistro($tabla, $campoClave, $valorClave) {
        $campoClave = $this->conn->real_escape_string($campoClave);
        $valorClave = $this->conn->real_escape_string($valorClave);

        $sql = "SELECT * FROM $tabla WHERE $campoClave = '$valorClave'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Método de actualización por clave primaria
    public function actualizarRegistro($tabla, $campoClave, $id, $nuevosValores) {
        $sets = [];
        foreach ($nuevosValores as $campo => $valor) {
            $campo = $this->conn->real_escape_string($campo);
            $valor = $this->conn->real_escape_string($valor);
            $sets[] = "$campo = '$valor'";
        }

        $sets = implode(", ", $sets);
        $campoClave = $this->conn->real_escape_string($campoClave);
        $id = $this->conn->real_escape_string($id);

        $sql = "UPDATE $tabla SET $sets WHERE $campoClave = '$id'";
        return $this->conn->query($sql);
    }

    // Método de borrado por clave primaria
    public function borrarRegistro($tabla, $campoClave, $id) {
        $campoClave = $this->conn->real_escape_string($campoClave);
        $id = $this->conn->real_escape_string($id);

        $sql = "DELETE FROM $tabla WHERE $campoClave = '$id'";
        return $this->conn->query($sql);
    }

    // Función para cerrar la conexión a la base de datos
    public function cerrarConexion() {
        $this->conn->close();
    }
}


// Uso de las funciones
$conexionBD = new conectar_db();

// Ejemplo de consulta
$usuarioConsultado = $conexionBD->consultarRegistro('usuarios', 'id', 1);
print_r($usuarioConsultado);

// Ejemplo de actualización
$nuevosValores = ['nombre' => 'NuevoNombre', 'email' => 'nuevo@email.com'];
$actualizacionExitosa = $conexionBD->actualizarRegistro('usuarios', 'id', 1, $nuevosValores);
echo ($actualizacionExitosa ? "Actualización exitosa" : "Error al actualizar");

// Ejemplo de borrado
$borradoExitoso = $conexionBD->borrarRegistro('usuarios', 'id', 1);
echo ($borradoExitoso ? "Borrado exitoso" : "Error al borrar");

// Cierre de la conexión
$conexionBD->cerrarConexion();
?>