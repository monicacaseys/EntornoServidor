<?php

class conectar_db{
    private $host   = "localhost";
    private $usuario= "root";
    private $clave = "";
    private $db     ="contactos";
    public $conexion;
    public function __construct(){
        // El constructor lleva la conexión
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave, $this->db, 3306);

    
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    
        $this->conexion->set_charset("utf8");
    }
    

   //CONSULTAR
   public function consultar($consulta){
    $resultado = $this -> conexion -> query($consulta) or die ($this -> conexion ->error);
    if ($resultado)
         return $resultado;
   }

   //Contar resultados
   public function contar_resultados(){
    $resultado = $this -> conexion -> affected_rows;
    return $resultado;
   }

// Método para obtener el ID generado automáticamente en la última inserción
   public function ultima_id(){
    $resultado = $this -> conexion -> insert_id;
    return $resultado;
   }

   //CERRAR 
   public function cerrar(){
    $this -> conexion -> close();
   }
 
}
function volver(){
    header ("Location: index.php");
}

   ?>