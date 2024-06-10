<!-- Modal -->
<div class="modal fade" id="modalFormHilosOscarDominguez" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Hilo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="formHilosOscarDominguez" name="formHilosOscarDominguez" class="form-horizontal">
                    <input type="hidden" id="idHilosOscarDominguez" name="idHilosOscarDominguez" value="">
                    <p class="text-primary">Todos los campos son obligatorios.</p>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="listColor">Color</label>
                            <select class="form-control" data-live-search="true" id="listColor" name="listColor" required="">
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtMarca">Marca</label>
                            <select class="form-control selectpicker" id="txtMarca" name="txtMarca" required="">
                                <option value="Óscar Domínguez">Óscar Domínguez</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtTenida">Teñida</label>
                            <input type="text" class="form-control" id="txtTenida" name="txtTenida" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="listTipo">Tipo</label>
                            <select class="form-control" data-live-search="true" id="listTipo" name="listTipo" required="">
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtPesoTotal">Peso total</label>
                            <input type="text" class="form-control" id="txtPesoTotal" name="txtPesoTotal" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="listTipoEmpaquetado">Tipo de empaquetado</label>
                            <select class="form-control selectpicker" id="listTipoEmpaquetado" name="listTipoEmpaquetado" required="">
                                <option value="Caja">Caja</option>
                                <option value="Costal">Costal</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
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
<div class="modal fade" id="modalViewHilosOscarDominguez" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <td>Color:</td>
                            <td id="celColor">Azul</td>
                        </tr>
                        <tr>
                            <td>Marca:</td>
                            <td id="celMarca">Aguila</td>
                        </tr>
                        <tr>
                            <td>Teñida:</td>
                            <td id="celTenida">#12325</td>
                        </tr>
                        <tr>
                            <td>Tipo:</td>
                            <td id="celTipo">Navidad</td>
                        </tr>
                        <tr>
                            <td>Peso Total:</td>
                            <td id="celPesoTotal">500</td>
                        </tr>
                        <tr>
                            <td>Empaquetado:</td>
                            <td id="celEmpaquetado">Caja</td>
                        </tr>
                        <tr>
                            <td>Estado:</td>
                            <td id="celEstado">Activo</td>
                        </tr>
                        <tr>
                            <td>Fecha de creación:</td>
                            <td id="celFechaRegistro">05/16/24</td>
                        </tr>
                        <tr>
                            <td>Fecha de actualización:</td>
                            <td id="celFechaActualizacion">05/16/24</td>
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