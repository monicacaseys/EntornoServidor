<?php

class conector_db {
    private $servername = "localhost";
    private $username = "usuario";
    private $password = "contraseña";
    private $dbname = "nombre_base_de_datos";
    private $conn;

    // Constructor para la conexión a la base de datos
    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Verifica la conexión
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
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

?>

<?php
require_once('funciones.php');

// Crear una instancia de la clase ConexionBD
$conexionBD = new ConexionBD();

// Obtener todos los usuarios
$usuarios = $conexionBD->obtenerUsuarios();
print_r($usuarios);

// Obtener información de un usuario por ID
$usuarioID = 1;
$usuario = $conexionBD->obtenerUsuarioPorID($usuarioID);
print_r($usuario);

// Insertar un nuevo usuario
$nombreNuevoUsuario = "Nuevo Usuario";
$emailNuevoUsuario = "nuevo@usuario.com";
$insertarUsuario = $conexionBD->insertarUsuario($nombreNuevoUsuario, $emailNuevoUsuario);
echo ($insertarUsuario ? "Usuario insertado correctamente" : "Error al insertar usuario");

// Cerrar la conexión a la base de datos
$conexionBD->cerrarConexion();
?>
<!-- SIN CONSTRUCTOR -->

<?php
// Ejercicio 4: Actualización de Datos en la Base de Datos
$servername = "localhost";
$username = "usuario";
$password = "contraseña";
$dbname = "nombre_base_de_datos";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Actualiza la edad de un usuario específico
$usuario_id = 1; // ID del usuario a actualizar
$nueva_edad = 30; // Nueva edad

$sql = "UPDATE usuarios SET edad = $nueva_edad WHERE id = $usuario_id";

if ($conn->query($sql) === TRUE) {
    echo "Datos actualizados correctamente.";
} else {
    echo "Error al actualizar los datos: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
?>


