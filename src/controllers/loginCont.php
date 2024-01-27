<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $usuario = $_POST["usuario"];
    $pass=$_POST["contrasena"];
    $sql = "SELECT * FROM usuarios WHERE nombre='$usuario' AND pass='$pass'";
    $result = $conn->query($sql);
}
if($result->num_rows>0){
    session_start();
    $_SESSION["usuario"]= $usuario;
    header("location:../pages/menuOpcion.php");
}else{
    echo"Error al iniciar sesion";
}
$conn->close();
?>