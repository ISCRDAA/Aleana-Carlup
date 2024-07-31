<!-- Modal -->
<div class="modal fade" id="modalFormModeloPrenda" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Modelo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="formModeloPrenda" name="formModeloPrenda" class="form-horizontal">
                    <input type="hidden" id="idModeloPrenda" name="idModeloPrenda" value="">
                    <p class="text-primary">Todos los campos son obligatorios.</p>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtNombre">Nombre</label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtPeso">Peso</label>
                            <input type="text" class="form-control" id="txtPeso" name="txtPeso" required="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="listTipo">Tipo</label>
                            <select class="form-control" data-live-search="true" id="listTipo" name="listTipo" required="">
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="listStatus">Status</label>
                            <select class="form-control selectpicker" id="listStatus" name="listStatus" required="">
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>
                        &nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal View-->
<div class="modal fade" id="modalViewModelosPrendas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Datos del Hilo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>ID:</td>
                            <td id="celId">1</td>
                        </tr>
                        <tr>
                            <td>Nombre:</td>
                            <td id="celNombre">Azul</td>
                        </tr>
                        <tr>
                            <td>Tipo:</td>
                            <td id="celTipo">Aguila</td>
                        </tr>
                        <tr>
                            <td>Peso del Modelo:</td>
                            <td id="celPesoDelModelo">#12325</td>
                        </tr>
                        <tr>
                            <td>Estado:</td>
                            <td id="celEstado">Activo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
            </div>
        </div>
    </div>
</div>