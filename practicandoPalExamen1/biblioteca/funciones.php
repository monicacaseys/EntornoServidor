<?php
//clase conexion
class conexion_db{
    private $host   = "localhost";
    private $usuario= "root";
    private $clave = "";
    private $db     ="biblioteca";
    public $conexion;
    public function __construct(){
        // El constructor lleva la conexión
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave, $this->db, 3307);

    
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }

    }
    

 public function añadirLibro($titulo,$autor){
    $titulo = $this-> conn ->real_escape_string($titulo);
    $autor = $this-> conn ->real_escape_string($autor);

    $sql = "INSERT INTO libros (titulo,autor) VALUES ('$titulo','$autor')";
    return $this -> conn -> query ($sql);

 }

 public function obtenerLibros(){
    $sql = "SELECT * FROM libros";
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