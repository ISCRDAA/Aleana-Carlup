<!-- Modal -->
<div class="modal fade" id="modalFormColorModelo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Color Modelo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="formColorModelo" name="formColorModelo" class="form-horizontal">
                    <input type="hidden" id="idColorModelo" name="idColorModelo" value="">
                    <p class="text-primary">Todos los campos son obligatorios.</p>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="listColor">Color</label>
                            <select class="form-control" data-live-search="true" id="listColor" name="listColor" required="">
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="listModelo">Modelo</label>
                            <select class="form-control" data-live-search="true" id="listModelo" name="listModelo" required="">
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