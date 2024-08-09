var tableHilosMiguelGarcia;

document.addEventListener('DOMContentLoaded', function(){

    tableHilosMiguelGarcia = $('#tableHilosMiguelGarcia').DataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": " "+media_url+"/js/languageSpanish.json"
        },
        "ajax": {
            "url": " "+base_url+"/Hilosmiguelgarcia/getHilosMiguelGarcia",
            "dataSrc":""
        },
        "columns":[
            {"data":"idhilosmiguelgarcia"},
            {"data":"nombre_color"},
            {"data":"marca"},
            {"data":"tenida"},
            {"data":"nombre_tipo"},
            {"data":"peso_total"},
            {"data":"tipo_empaquetado"},
            {"data":"datecreated"},
            {"data":"dateupdate"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]
    });

    // NUEVO HILO POR CAJA
    var formHilomiguelgarcia = document.querySelector("#formHilosMiguelGarcia");
    formHilomiguelgarcia.onsubmit = function(e){
        e.preventDefault();
        var intColor = document.querySelector('#listColor').value;
        var strMarca = document.querySelector('#txtMarca').value;
        var strTenida = document.querySelector('#txtTenida').value;
        var intTipo = document.querySelector('#listTipo').value;
        var intPesototal = document.querySelector('#txtPesoTotal').value;

        if (intColor == '' || strMarca == '' || strTenida == '' || intTipo == '' || intPesototal == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Hilosmiguelgarcia/setHilomiguelgarcia';
        var formData = new FormData(formHilomiguelgarcia);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status)
                {
                    $('#modalFormHilosMiguelGarcia').modal("hide");
                    formHilomiguelgarcia.reset();
                    swal("Hilos Miguel Garcia", objData.msg, "success");
                    tableHilosMiguelGarcia.ajax.reload(function(){
                        fntColores();
                        fntTiposPrendas();
                        fntViewHiloMiguelGarcia();
                        fntEditHiloMiguelGarcia();
                    });
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
        }
    }
}, false);

$('#tableHilosMiguelGarcia').DataTable();

window.addEventListener('load', function() {
    fntColores();
    fntTiposPrendas();
    fntViewHiloMiguelGarcia();
    fntEditHiloMiguelGarcia();
}, false);

function fntColores(){
    var ajaxUrl = base_url+'/Colores/getSelectColores';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#listColor').innerHTML = request.responseText;
            document.querySelector('#listColor').value = 1;
            $('#listColor').selectpicker('render');
        }
    }
}

function fntTiposPrendas(){
    var ajaxUrl = base_url+'/Tipos/getSelectTipos';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#listTipo').innerHTML = request.responseText;
            document.querySelector('#listTipo').value = 1;
            $('#listTipo').selectpicker('render');
        }
    }
}

function fntViewHiloMiguelGarcia(){
    var btnViewHiloMiguelGarcia = document.querySelectorAll('.btnViewHiloMiguelGarcia');
    btnViewHiloMiguelGarcia.forEach(function(btnViewHiloMiguelGarcia){
        btnViewHiloMiguelGarcia.addEventListener('click', function(){
            var idhilomiguelgarcia = this.getAttribute("hmg");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Hilosmiguelgarcia/getHiloMiguelGarcia/'+idhilomiguelgarcia;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status)
                    {
                        var estadoHiloMiguelGarcia = objData.data.status == 1 ?
                        '<span class="badge badge-success">Activo</span>' :
                        '<span class="badge badge-danger">Inactivo</span>';
                        document.querySelector("#celId").innerHTML = objData.data.idhilosmiguelgarcia;
                        document.querySelector("#celColor").innerHTML = objData.data.color_nombre;
                        document.querySelector("#celMarca").innerHTML = objData.data.marca;
                        document.querySelector("#celTenida").innerHTML = objData.data.tenida;
                        document.querySelector("#celTipo").innerHTML = objData.data.tipo_nombre;
                        document.querySelector("#celPesoTotal").innerHTML = objData.data.peso_total;
                        document.querySelector("#celEmpaquetado").innerHTML = objData.data.tipo_empaquetado;
                        document.querySelector("#celEstado").innerHTML = estadoHiloMiguelGarcia;
                        document.querySelector("#celFechaRegistro").innerHTML = objData.data.datecreated;
                        document.querySelector('#celFechaActualizacion').innerHTML = objData.data.dateupdate;
                        $('#modalViewHilosMiguelGarcia').modal('show');
                    }else{
                        swal("Error", objData.msg, "error");
                    }
                }
            }
        });
    });
}

function fntEditHiloMiguelGarcia(){
    var btnEditHiloMiguelGarcia = document.querySelectorAll('.btnEditHiloMiguelGarcia');
    btnEditHiloMiguelGarcia.forEach(function(btnEditHiloMiguelGarcia){
        btnEditHiloMiguelGarcia.addEventListener('click', function(){

            document.querySelector('#titleModal').innerHTML = "Actualizar Hilo";
            document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
            document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
            document.querySelector('#btnText').innerHTML = "Actualizar";

            var idhilomiguelgarcia = this.getAttribute("hmg");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Hilosmiguelgarcia/getHiloMiguelGarcia/'+idhilomiguelgarcia;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status)
                    {
                        // Llenar los selectores antes de mostrar el modal
                        document.querySelector("#idHilosMiguelGarcia").value = objData.data.idhilosmiguelgarcia;
                        document.querySelector("#listColor").value = objData.data.color_id;
                        document.querySelector("#txtMarca").value = objData.data.marca;
                        document.querySelector("#txtTenida").value = objData.data.tenida;
                        document.querySelector("#listTipo").value = objData.data.tipo_id;
                        document.querySelector("#txtPesoTotal").value = objData.data.peso_total;
                        document.querySelector("#listTipoEmpaquetado").value = objData.data.tipo_empaquetado;

                        // Render selectpickers for the updated selects
                        $('#listColor').selectpicker('render');
                        $('#listTipo').selectpicker('render');
                        $('#listTipoEmpaquetado').selectpicker('render');

                        if (objData.data.status == 1) {
                            document.querySelector("#listStatus").value = 1
                        } else {
                            document.querySelector("#listStatus").value = 2;
                        }
                        $('#listStatus').selectpicker('render');
                    }else{
                        swal("Error", objData.msg, "error");
                    }
                }
                $('#modalFormHilosMiguelGarcia').modal('show');
            }
        });
    });
}

function openModal(){
    document.querySelector('#idHilosMiguelGarcia').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Hilo";
    document.querySelector('#formHilosMiguelGarcia').reset();

    $('#modalFormHilosMiguelGarcia').modal('show');
}