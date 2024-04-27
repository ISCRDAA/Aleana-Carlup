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

function openModal() {

    document.querySelector('#idColorModelo').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Color Modelo";
    document.querySelector('#formColorModelo').reset();

    $('#modalFormColorModelo').modal('show');
}