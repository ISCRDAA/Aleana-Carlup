var tableHilosCaja;

document.addEventListener('DOMContentLoaded', function(){

    tableHilosCaja = $('#tableHilosCaja').DataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": " "+media_url+"/js/languageSpanish.json"
        },
        "ajax": {
            "url": " "+base_url+"/Hiloscaja/getHilosCaja",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_hilo_caja"},
            {"data":"nombre_color"},
            {"data":"marca"},
            {"data":"tenida"},
            {"data":"nombre_tipo"},
            {"data":"cantidad_de_cajas"},
            {"data":"cantidad_de_conos"},
            {"data":"peso_total"},
            {"data":"tipo_empaquetado"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]
    });
});

$('#tableHilosCaja').DataTable();

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

function openModal() {

    document.querySelector('#idHilosCaja').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Hilo";
    document.querySelector('#formHilosCaja').reset();

    $('#modalFormHilosCaja').modal('show');
}