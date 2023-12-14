<?php
// bromas.php

class conectar_db {
    private $host = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $db = "bromas";
    public $conexion;

    public function __construct() {
    
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave, $this->db, 3306);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    // Método para obtener una broma aleatoria
    public function obtenerBromaAleatoria() {
      
        $sql = "SELECT * FROM bromas ORDER BY RAND() LIMIT 1";
        $result = $this->conexion->query($sql);

        // Verificar si se obtuvo algún resultado
        if ($result->num_rows > 0) {
            // Obtener la fila como un array asociativo
            $broma = $result->fetch_assoc();
        } else {
            // Si no hay bromas en la base de datos
            $broma = array(
                'contenido' => 'No hay bromas disponibles',
                'puntuacion' => 0
            );
        }

        return $broma;
    }

 
    public function cerrarConexion() {
        $this->conexion->close();
    }
}


$conexion_db = new conectar_db();

// Obtener una broma aleatoria
$broma = $conexion_db->obtenerBromaAleatoria();

// Cerrar la conexión a la base de datos
$conexion_db->cerrarConexion();

// Imprimir la broma
var_dump($broma);
?>
