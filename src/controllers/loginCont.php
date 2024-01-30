<?php
include("conexion.php");
include("../pages/cabecera.php");

$mensaje="Error en tu usuario o contraseña";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $usuario = $_POST["usuario"];
    $pass=$_POST["contrasena"];
    $confirmar=$_POST["confirmar"];

    if($pass !==$confirmar){
        die("Error las contraseñas no coinciden");
    }

    $sql = "SELECT * FROM users WHERE userName='$usuario' AND pass='$pass'";
    $result = $conn->query($sql);
}

$conn->close();
?>
<br>
<br>
<br>
<br>

<div class="alert alert-danger" role="alert">

    <?php
        if($result->num_rows>0){
            session_start();
            $_SESSION["usuario"]= $usuario;
            header("location:../pages/menuOpcion.php");
        }else{
            echo "error";
        }
    ?>

</div>

<?php include("../pages/pie.php");?>