<?php include("cabecera.php"); ?>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-md-4">

        </div>

        <div class="col-md-4">
            <br>
            <div class="card">
                <div class="card-header">Incio de sesión</div>
                <div class="card-body">
                    <form action="../controllers/loginCont.php" method="post">
                        Ingrese su usuario: <input class="form-control" type="text" name="usuario">
                        <br />
                        Ingrese su constraseña: <input class="form-control" type="password" name="contrasena" id="">
                        <br>
                        <button class="btn btn-success" type="submit">Iniciar sesión</button>

                    </form>
                </div>

            </div>

        </div>

        <div class="col-md-4">

        </div>
    </div>

</div>




<?php include("pie.php"); ?>