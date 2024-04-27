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
});

$('#tableModelosprendas').DataTable();

function openModal() {

    document.querySelector('#idModeloPrenda').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Modelo";
    document.querySelector('#formModeloPrenda').reset();

    $('#modalFormModeloPrenda').modal('show');
}