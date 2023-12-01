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
    

//CONSULTAR
public function consultar($tabla,$id,$valor){
    $resultado = $this -> conexion -> query("SELECT * FROM $tabla WHERE $id=$valor") or die ($this -> conexion ->error);
    if ($resultado)
         return $resultado;
   }


//ACTUALIZAR
public function actualizar($tabla, $id, $valor, $nuevoValor){    
        $resultado  =   $this->conexion->query("UPDATE $tabla SET $nuevoValor WHERE $id=$valor") or die($this->conexion->error);
        if($resultado)
            return $resultado;       
    } 
    
//BORRAR
public function borrar($tabla, $condicion){    
    $resultado  =   $this->conexion->query("DELETE FROM $tabla WHERE $condicion") or die($this->conexion->error);
    if($resultado)
        return $resultado;
}


}