<?php
session_start();
if(!isset($_SESSION['usuario'])){
header("location:../pages/login.php");
}
$usuario=$_SESSION["usuario"];
?>

<?php include("cabecera.php");?>
<br>
<br>
<br>
<br>


<h2>bienvenido <?php echo $usuario?></h2>
<a href="../controllers/cerrarConexion.php">cerrar la conexion</a>

<?php include("pie.php");?>