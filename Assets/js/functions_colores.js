var tableColores;

document.addEventListener('DOMContentLoaded', function(){

    tableColores = $('#tableColores').DataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": " "+media_url+"/js/languageSpanish.json"
        },
        "ajax": {
            "url": " "+base_url+"/Colores/getColores",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_color"},
            {"data":"nombre_color"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]
    });

    // NUEVO COLOR
    var formColor = document.querySelector("#formColor");
    formColor.onsubmit = function(e){
        e.preventDefault();
        var strNombre = document.querySelector('#txtNombre').value;

        if (strNombre == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Colores/setColor';
        var formData = new FormData(formColor);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status)
                {
                    $('#modalFormColor').modal("hide");
                    formColor.reset();
                    swal("Color", objData.msg, "success");
                    tableColores.ajax.reload(function(){
                        fntViewColor();
                        fntEditColor();
                    });
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
        }
    }
}, false);

$('#tableColores').DataTable();

window.addEventListener('load', function() {
    fntViewColor();
    fntEditColor();
}, false);

function fntViewColor(){
    var btnViewColor = document.querySelectorAll('.btnViewColor');
    btnViewColor.forEach(function(btnViewColor){
        btnViewColor.addEventListener('click', function(){
            var idcolor = this.getAttribute("cl");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Colores/getColor/'+idcolor;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status)
                    {
                        var estadoColor = objData.data.status == 1 ?
                        '<span class="badge badge-success">Activo</span>' :
                        '<span class="badge badge-danger">Inactivo</span>';
                        document.querySelector("#celId").innerHTML = objData.data.id_color;
                        document.querySelector("#celNombre").innerHTML = objData.data.nombre_color;
                        document.querySelector("#celEstado").innerHTML = estadoColor;
                        $('#modalViewColor').modal('show');
                    }else{
                        swal("Error", objData.msg, "error");
                    }
                }
            }
        });
    });
}

function fntEditColor(){
    var btnEditColor = document.querySelectorAll('.btnEditColor');
    btnEditColor.forEach(function(btnEditColor){
        btnEditColor.addEventListener('click', function(){

            document.querySelector('#titleModal').innerHTML = "Actualizar Color";
            document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
            document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
            document.querySelector('#btnText').innerHTML = "Actualizar";

            var idcolor = this.getAttribute("cl");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Colores/getColor/'+idcolor;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status)
                    {
                        document.querySelector("#idColor").value = objData.data.id_color;
                        document.querySelector("#txtNombre").value = objData.data.nombre_color;

                        if (objData.data.status == 1) {
                            document.querySelector("#listStatus").value = 1;
                        } else {
                            document.querySelector("#listStatus").value = 2;
                        }
                        $('#listStatus').selectpicker('render');
                    }else{
                        swal("Error", objData.msg, "error");
                    }
                }
                $('#modalFormColor').modal('show');
            }
        });
    });
}

function openModal() {

    document.querySelector('#idColor').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Color";
    document.querySelector('#formColor').reset();

    $('#modalFormColor').modal('show');
}