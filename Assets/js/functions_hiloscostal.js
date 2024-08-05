var tableHilosCostal;

document.addEventListener('DOMContentLoaded', function(){

    tableHilosCostal = $('#tableHilosCostal').DataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": " "+media_url+"/js/languageSpanish.json"
        },
        "ajax": {
            "url": " "+base_url+"/Hiloscostal/getHilosCostal",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_hilo_costal"},
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

    // NUEVO HILO POR COSTAL
    var formHilocostal = document.querySelector("#formHilosCostal");
    formHilocostal.onsubmit = function(e){
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
        var ajaxUrl = base_url+'/Hiloscostal/setHilocostal';
        var formData = new FormData(formHilocostal);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status)
                {
                    $('#modalFormHilosCostal').modal("hide");
                    formHilocostal.reset();
                    swal("Hilos Coperativa", objData.msg, "success");
                    tableHilosCostal.ajax.reload(function(){
                    });
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
        }
    }
}, false);

$('#tableHilosCostal').DataTable();

window.addEventListener('load', function() {
    fntColores();
    fntTiposPrendas();
    fntViewHiloCostal();
    fntEditHiloCoperativa();
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

function fntViewHiloCostal(){
    var btnViewHiloCostal = document.querySelectorAll('.btnViewHiloCoperativa');
    btnViewHiloCostal.forEach(function(btnViewHiloCostal){
        btnViewHiloCostal.addEventListener('click', function(){
            var idhilocostal = this.getAttribute("hco");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Hiloscostal/getHiloCostal/'+idhilocostal;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status)
                    {
                        var estadoHiloCostal = objData.data.status == 1 ?
                        '<span class="badge badge-success">Activo</span>' :
                        '<span class="badge badge-danger">Inactivo</span>';
                        document.querySelector("#celId").innerHTML = objData.data.id_hilo_costal;
                        document.querySelector("#celColor").innerHTML = objData.data.nombre_color;
                        document.querySelector("#celMarca").innerHTML = objData.data.marca;
                        document.querySelector("#celTenida").innerHTML = objData.data.tenida;
                        document.querySelector("#celTipo").innerHTML = objData.data.nombre_tipo;
                        document.querySelector("#celPesoTotal").innerHTML = objData.data.peso_total;
                        document.querySelector("#celEmpaquetado").innerHTML = objData.data.tipo_empaquetado;
                        document.querySelector("#celEstado").innerHTML = estadoHiloCostal;
                        document.querySelector("#celFechaRegistro").innerHTML = objData.data.datecreated;
                        document.querySelector('#celFechaActualizacion').innerHTML = objData.data.dateupdate;
                        $('#modalViewHilosCostal').modal('show');
                    }else{
                        swal("Error", objData.msg, "error");
                    }
                }
            }
        });
    });
}

function fntEditHiloCoperativa(){
    var btnEditHiloCoperativa = document.querySelectorAll('.btnEditHiloCoperativa');
    btnEditHiloCoperativa.forEach(function(btnEditHiloCoperativa){
        btnEditHiloCoperativa.addEventListener('click', function(){

            document.querySelector('#titleModal').innerHTML = "Actualizar Hilo";
            document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
            document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
            document.querySelector('#btnText').innerHTML = "Actualizar";

            var idhilocostal = this.getAttribute("hco");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Hiloscostal/getHiloCostal/'+idhilocostal;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status)
                    {
                        // Llenar los selectores antes de mostrar el modal
                        document.querySelector("#idHilosCostal").value = objData.data.id_hilo_costal;
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
                $('#modalFormHilosCostal').modal('show');
            }
        });
    });
}

function openModal() {

    document.querySelector('#idHilosCostal').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Hilo";
    document.querySelector('#formHilosCostal').reset();

    $('#modalFormHilosCostal').modal('show');
}