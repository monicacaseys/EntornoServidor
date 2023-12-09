<?php

class conectar_db{
    private $host   = "localhost";
    private $usuario= "root";
    private $clave = "";
    private $db     ="gastos";
    public $conexion;
    public function __construct(){
        // El constructor lleva la conexión
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave, $this->db, 3307);
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }    
    }

   //CONSULTAR
   public function consultar($consulta){
    $resultado = $this -> conexion -> query($consulta) or die ($this -> conexion ->error);
    if ($resultado)
         return $resultado;
   }
}
function volver(){
    header ("Location: index.php");
}

?>