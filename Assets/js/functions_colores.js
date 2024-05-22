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

    // NUEVO COLOR
    var formColor = document.querySelector("#formColor");
    formColor.onsubmit = function(e){
        e.preventDefault();
        var strNombre = document.querySelector('#txtNombre').value;

        if (strNombre == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Colores/setColor';
        var formData = new FormData(formColor);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status)
                {
                    $('#modalFormColor').modal("hide");
                    formColor.reset();
                    swal("Color", objData.msg, "success");
                    tableColores.ajax.reload(function(){

                    });
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
        }
    }
}, false);

$('#tableColores').DataTable();

function openModal() {

    document.querySelector('#idColor').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Color";
    document.querySelector('#formColor').reset();

    $('#modalFormColor').modal('show');
}