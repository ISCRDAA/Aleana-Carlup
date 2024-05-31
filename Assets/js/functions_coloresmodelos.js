var tableColoresmodelos;

document.addEventListener('DOMContentLoaded', function(){

    tableColoresmodelos = $('#tableColoresmodelos').DataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": " "+media_url+"/js/languageSpanish.json"
        },
        "ajax": {
            "url": " "+base_url+"/Coloresmodelos/getColoresmodelos",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_color_modelo"},
            {"data":"nombre_modelo"},
            {"data":"color_base"},
            {"data":"color_combinacion_01"},
            {"data":"color_combinacion_02"},
            {"data":"color_combinacion_03"},
            {"data":"color_combinacion_04"},
            {"data":"color_combinacion_05"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]
    });

    // NUEVO COLOR ED MODELO
    var formColormodelo = document.querySelector("#formColorModelo");
    formColormodelo.onsubmit = function(e){
        e.preventDefault();
        var intColor  = document.querySelector('#listColor').value;
        var intModelo = document.querySelector('#listModelo').value;
        var intCombinacion01 = document.querySelector('#listCombinacion01').value;
        var intCombinacion02 = document.querySelector('#listCombinacion02').value;
        var intCombinacion03 = document.querySelector('#listCombinacion03').value;
        var intCombinacion04 = document.querySelector('#listCombinacion04').value;
        var intCombinacion05 = document.querySelector('#listCombinacion05').value;

        if (intColor == '' || intModelo == '' || intCombinacion01 == '' || intCombinacion02 == '' || intCombinacion03 == '' || intCombinacion04 == '' || intCombinacion05 == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl= base_url+'/ColoresModelos/setColormodelo'
        var formData = new FormData(formColormodelo);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status)
                {
                    $('#modalFormColorModelo').modal("hide");
                    formColormodelo.reset();
                    swal("Color de Modelo", objData.msg, "success");
                    tableColoresmodelos.ajax.reload(function(){
                    });
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
        }
    }
}, false);

$('#tableColoresmodelos').DataTable();

window.addEventListener('load', function() {
    fntColores();
    fntModelosPrendas();
    fntColoresCombinaciones();
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

function fntModelosPrendas(){
    var ajaxUrl = base_url+'/Modelosprendas/getSelectModelosPrendas';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#listModelo').innerHTML = request.responseText;
            document.querySelector('#listModelo').value = 1;
            $('#listModelo').selectpicker('render');
        }
    }
}

function fntColoresCombinaciones(){
    var ajaxUrl = base_url+'/Colores/getSelectColores';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){
        if (request.readyState == 4 && request.status == 200) {
            var element = document.querySelectorAll('#listCombinacion01, #listCombinacion02, #listCombinacion03, #listCombinacion04, #listCombinacion05');
            element.forEach(function(element) {
                element.innerHTML = request.responseText;
                element.value = 1;
                $(element).selectpicker('render');
            });
            //document.querySelector('#listCombinacion01').innerHTML = request.responseText;
            //document.querySelector('#listCombinacion01').value = 1;
            //$('#listCombinacion01').selectpicker('render');
        }
    }
}

function openModal() {

    document.querySelector('#idColorModelo').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Color Modelo";
    document.querySelector('#formColorModelo').reset();

    $('#modalFormColorModelo').modal('show');
}