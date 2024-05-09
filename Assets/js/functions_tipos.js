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

    }
}, false);

$('#tableTipos').DataTable();

function openModal() {

    document.querySelector('#idTipo').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Tipo";
    document.querySelector('#formTipo').reset();

    $('#modalFormTipo').modal('show');
}