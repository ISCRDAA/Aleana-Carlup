var tableColores;

document.addEventListener('DOMContentLoaded', function(){

    tableColores = $('#tableColores').DataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": " "+media_url+"/js/languageSpanish.json"
        },
        "ajax": {
            "url": " "+base_url+"/Colores/getColores",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_color"},
            {"data":"nombre_color"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]
    });
});

$('#tableColores').DataTable();