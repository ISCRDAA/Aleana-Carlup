<?php
        headerAdmin($data);
        getModal('modalHilosCostal', $data);
    ?>
        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1>
                        <i class="fas fa-user-tag"></i> <?= $data['page_title']; ?>
                        <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Nuevo</button>
                    </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>/roles"><?= $data['page_title']; ?></a></li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="tableHilosCostal">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Color</th>
                                            <th>Marca</th>
                                            <th>Teñida</th>
                                            <th>Tipo</th>
                                            <th>Cantidad de cajas</th>
                                            <th>Cantidad de conos</th>
                                            <th>Peso total</th>
                                            <th>Tipo de empaquetado</th>
                                            <th>Status</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td>1</td>
                                        <td>Mostasa</td>
                                        <td>Hola marca</td>
                                        <td>789456</td>
                                        <td>Acrilan</td>
                                        <td>10</td>
                                        <td>200</td>
                                        <td>300 mg</td>
                                        <td>Costal</td>
                                        <td>Activo</td>
                                        <td></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <?php footerAdmin($data); ?>