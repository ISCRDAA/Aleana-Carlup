var tableTipos;

document.addEventListener('DOMContentLoaded', function(){

    tableTipos = $('#tableTipos').DataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": " "+media_url+"/js/languageSpanish.json"
        },
        "ajax": {
            "url": " "+base_url+"/Tipos/getTipos",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_tipo"},
            {"data":"nombre"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]
    });

    // NUEVO TIPO
    var formTipo = document.querySelector("#formTipo");
    formTipo.onsubmit = function(e){
        e.preventDefault();
        var strTipo = document.querySelector('#txtTipo').value;

        if (strTipo == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Tipos/setTipo';
        var formData = new FormData(formTipo);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    $('#modalFormTipo').modal("hide");
                    formTipo.reset();
                    swal("Tipo", objData.msg, "success")
                    tableTipos.ajax.reload(function(){

                    });
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
        }
    }
}, false);

$('#tableTipos').DataTable();

window.addEventListener('load', function() {
    fntViewTipo();
}, false);

function fntViewTipo(){
    var btnViewTipo = document.querySelectorAll('.btnViewTipo');
    btnViewTipo.forEach(function(btnViewTipo){
        btnViewTipo.addEventListener('click', function(){
            var idtipo = this.getAttribute("tp");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Tipos/getTipo/'+idtipo;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status)
                    {
                        var estadoTipo = objData.data.status == 1 ?
                        '<span class="badge badge-success">Activo</span>' :
                        '<span class="badge badge-danger">Inactivo</span>';
                        document.querySelector("#celId").innerHTML = objData.data.id_tipo;
                        document.querySelector("#celNombre").innerHTML = objData.data.nombre;
                        document.querySelector("#celEstado").innerHTML = estadoTipo;
                        $('#modalViewTipo').modal('show');
                    }else{
                        swal("Error", objData.msg, "error");
                    }
                }
            }
        });
    });
}

function openModal() {

    document.querySelector('#idTipo').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Tipo";
    document.querySelector('#formTipo').reset();

    $('#modalFormTipo').modal('show');
}