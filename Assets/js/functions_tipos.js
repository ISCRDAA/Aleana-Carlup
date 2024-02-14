var tableTipos;

document.addEventListener('DOMContentLoaded', function(){

    tableTipos = $('#tableTipos').DataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
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