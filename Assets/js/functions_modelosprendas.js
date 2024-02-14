var tableModelosprendas;

document.addEventListener('DOMContentLoaded', function(){

    tableModelosprendas = $('#tableModelosprendas').DataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
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