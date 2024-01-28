<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:../pages/login.php");
}
$usuario = $_SESSION["usuario"];
?>

<?php include("cabecera.php"); ?>
<br>
<br>
<br>
<br>


<h2>bienvenido <?php echo $usuario ?></h2>
<br>
<br>


<div class="row row-cols-1 row-cols-md-3 g-4">

    <div class="col">
        <div class="card">
            <img width="50%" src="../assets/logo.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> </h5>
                <p class="card-text"> </p>

            </div>
        </div>
    </div>

</div>
<a href="../controllers/cerrarConexion.php">cerrar la conexion</a>

<?php include("pie.php"); ?>