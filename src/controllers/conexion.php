<?php
class conexion{
   private $host="localhost";
   private $db="aleana";
   private $user="root";
   private $pass="";
   private $conn;

public function __construct(){
    try {
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
        echo "Connected to $this->db at $this->host successfully.";
    } catch (PDOException $pe) {
        die("Could not connect to the database $this->db :" . $pe->getMessage());
    }
}
public function consultar($sql){
    $sentencia=$this->conn->prepare($sql);
    $sentencia->execute();
    return $sentencia->fetchAll();
}

}



?>