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
                            <label for="listTipo">Tipo</label>
                            <select class="form-control" data-live-search="true" id="listTipo" name="listTipo" required="">
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtPeso">Peso</label>
                            <input type="text" class="form-control" id="txtPeso" name="txtPeso" required="">
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