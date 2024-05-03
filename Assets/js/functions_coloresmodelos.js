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
            {"data":"nombre_color"},
            {"data":"nombre_modelo"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]
    });
});

$('#tableColoresmodelos').DataTable();

window.addEventListener('load', function() {
    fntColores();
    fntModelosPrendas();
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

function openModal() {

    document.querySelector('#idColorModelo').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Color Modelo";
    document.querySelector('#formColorModelo').reset();

    $('#modalFormColorModelo').modal('show');
}