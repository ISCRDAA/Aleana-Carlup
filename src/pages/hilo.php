<?php include("cabecera.php"); ?>

<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                Datos del Hilo
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">

                        Marca del hilo: <input required class="form-control" type="text" name="marcaHilo">
                        <br>
                        Color del hilo: <input required class="form-control" type="text" name="color">
                        <br>
                        Peso del hilo: <input required class="form-control" type="text" name="peso">
                        <br>
                        Teñida del hilo: <input required class="form-control" type="text" name="tenida">
                        <br>
                        Descripcion del hilo:
                        <textarea required class="form-control" name="descripcion" rows="3"></textarea>

                        <input class="btn btn-success" type="submit" name="" value="Guardar cambios" id="">

                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Teñida</th>
                            <th scope="col">Descripcion</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($proyectos as $proyecto) { ?>
                            <tr>
                                <td><?php echo $proyecto["id"]; ?></td>
                                <td><?php echo $proyecto["nombre"]; ?></td>
                                <td><img width="100px" src="imagenes/<?php echo $proyecto["imagen"]; ?>" alt="imagen" srcset=""></td>
                                <td><?php echo $proyecto["descripcion"]; ?></td>
                                <td> <a class="btn btn-danger" href="?borrar=<?php echo $proyecto["id"]; ?>" role="button">Eliminar</a>
                                </td>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>








<?php include("pie.php"); ?>