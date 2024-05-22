var tableProduccion;
document.addEventListener('DOMContentLoaded',function(){
    tableProduccion =$('#tableProduccion').DataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": " "+media_url+"/js/languageSpanish.json"
        },
        "ajax": {
            "url": " "+base_url+"/Usuarios/getProduccion",
            "dataSrc":""
        },
        "columns":[
            {"data":"idpersona"},
            {"data":"nombres"},
            {"data":"apellidos"},
            {"data":"telefono"},
            {"data":"email_user"},
            {"data":"nombrerol"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]
    })
})
function openModal(){
    $('#modalFormProduccion').modal('show');
}