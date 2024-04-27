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
});

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