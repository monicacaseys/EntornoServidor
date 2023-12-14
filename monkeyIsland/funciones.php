<?php
//clase conexion
class conexion_db{
    private $host   = "localhost";
    private $usuario= "root";
    private $clave = "";
    private $db     ="bromas";
    public $conexion;
    public function __construct(){
        // El constructor lleva la conexión
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave, $this->db, 3306);

    
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }

    }
    

 public function obtenerBromas(){
    $sql = "SELECT * FROM bromas";
    $result = $this-> conn ->query($sql);


    $libros= [];
    if ($result -> num_rows >0){
        while ($row = $result -> fetch_assoc()){
            $libros[]=$row;
        }
    }
    return $libros;
 }
}
?>