var tableHilosOscarDominguez;

document.addEventListener('DOMContentLoaded', function(){

    tableHilosOscarDominguez = $('#tableHilosOscarDominguez').DataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": " "+media_url+"/js/languageSpanish.json"
        },
        "ajax": {
            "url": " "+base_url+"/Hilososcardominguez/getHilosOscarDominguez",
            "dataSrc":""
        },
        "columns":[
            {"data":"idhilososcardominguez"},
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
    var formHilooscardominguez = document.querySelector("#formHilosOscarDominguez");
    formHilooscardominguez.onsubmit = function(e){
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
        var ajaxUrl = base_url+'/Hilososcardominguez/setHilooscardominguez';
        var formData = new FormData(formHilooscardominguez);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status)
                {
                    $('#modalFormHilosOscarDominguez').modal("hide");
                    formHilooscardominguez.reset();
                    swal("Hilos Euros", objData.msg, "success");
                    tableHilosOscarDominguez.ajax.reload(function(){
                    });
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
        }
    }
}, false);

$('#tableHilosOscarDominguez').DataTable();

window.addEventListener('load', function() {
    fntColores();
    fntTiposPrendas();
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

function openModal(){
    document.querySelector('#idHilosOscarDominguez').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Hilo";
    document.querySelector('#formHilosOscarDominguez').reset();

    $('#modalFormHilosOscarDominguez').modal('show');
}