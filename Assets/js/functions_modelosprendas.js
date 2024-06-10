var tableModelosprendas;

document.addEventListener('DOMContentLoaded', function(){

    tableModelosprendas = $('#tableModelosprendas').DataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": " "+media_url+"/js/languageSpanish.json"
        },
        "ajax": {
            "url": " "+base_url+"/Modelosprendas/getModelosprendas",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_modelo"},
            {"data":"nombre"},
            {"data":"tipo_nombre"},
            {"data":"peso_modelo"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]
    });

    // NUEVO MODELO DE PRENDA
    var formModeloprenda = document.querySelector("#formModeloPrenda");
    formModeloprenda.onsubmit = function(e){
        e.preventDefault();

        var strNombre = document.querySelector('#txtNombre').value;
        var intTipo = document.querySelector('#listTipo').value;
        var intPeso = document.querySelector('#txtPeso').value;

        if (strNombre == '' || intTipo == '' || intPeso == '')
        {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Modelosprendas/setModeloprenda';
        var formData = new FormData(formModeloprenda);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status)
                {
                    $('#modalFormModeloPrenda').modal("hide");
                    formModeloprenda.reset();
                    swal("Modelo", objData.msg, "success");
                    tableModelosprendas.ajax.reload(function(){

                    });
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
        }
    }
}, false);

$('#tableModelosprendas').DataTable();

window.addEventListener('load', function() {
    fntTiposPrendas();
    fntViewModeloPrenda();
}, false);

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

function fntViewModeloPrenda(){
    var btnViewModeloPrenda = document.querySelectorAll('.btnViewModeloPrenda');
    btnViewModeloPrenda.forEach(function(btnViewModeloPrenda){
        btnViewModeloPrenda.addEventListener('click', function(){
            var idmodeloprenda = this.getAttribute("mp");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Modelosprendas/getModeloPrenda/'+idmodeloprenda;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status)
                    {
                        var estadoModelosPrendas = objData.data.status == 1 ?
                        '<span class="badge badge-success">Activo</span>' :
                        '<span class="badge badge-danger">Inactivo</span>';
                        document.querySelector("#celId").innerHTML = objData.data.id_modelo;
                        document.querySelector("#celNombre").innerHTML = objData.data.nombre;
                        document.querySelector("#celTipo").innerHTML = objData.data.tipo_nombre;
                        document.querySelector("#celPesoDelModelo").innerHTML = objData.data.peso_modelo;
                        document.querySelector("#celEstado").innerHTML = estadoModelosPrendas;
                        $('#modalViewModelosPrendas').modal('show');
                    }else{
                        swal("Error", objData.msg, "error");
                    }
                }
            }
        });
    });
}

function openModal() {

    document.querySelector('#idModeloPrenda').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Modelo";
    document.querySelector('#formModeloPrenda').reset();

    $('#modalFormModeloPrenda').modal('show');
}