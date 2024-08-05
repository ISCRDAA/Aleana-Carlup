var tableHilosInternacionales;

document.addEventListener('DOMContentLoaded', function(){

    tableHilosInternacionales = $('#tableHilosInternacionales').DataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": " "+media_url+"/js/languageSpanish.json"
        },
        "ajax": {
            "url": " "+base_url+"/Hilosinternacionales/getHilosInternacionales",
            "dataSrc":""
        },
        "columns":[
            {"data":"idhilosinternacionales"},
            {"data":"nombre_color"},
            {"data":"marca"},
            {"data":"tenida"},
            {"data":"nombre_tipo"},
            {"data":"peso_total"},
            {"data":"tipo_empaquetado"},
            {"data":"datecreated"},
            {"data":"dateupdate"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]
    });

    // NUEVO HILO POR CAJA
    var formHilointernacional = document.querySelector("#formHilosInternacionales");
    formHilointernacional.onsubmit = function(e){
        e.preventDefault();
        var intColor = document.querySelector('#listColor').value;
        var strMarca = document.querySelector('#txtMarca').value;
        var strTenida = document.querySelector('#txtTenida').value;
        var intTipo = document.querySelector('#listTipo').value;
        var intPesototal = document.querySelector('#txtPesoTotal').value;

        if (intColor == '' || strMarca == '' || strTenida == '' || intTipo == '' || intPesototal == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Hilosinternacionales/setHilointernacional';
        var formData = new FormData(formHilointernacional);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status)
                {
                    $('#modalFormHilosInternacionales').modal("hide");
                    formHilointernacional.reset();
                    swal("Hilos Euros", objData.msg, "success");
                    tableHilosInternacionales.ajax.reload(function(){
                    });
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
        }
    }
}, false);

$('#tableHilosInternacionales').DataTable();

window.addEventListener('load', function() {
    fntColores();
    fntTiposPrendas();
    fntViewHiloInternacional();
    fntEditHiloInternacional();
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

function fntViewHiloInternacional(){
    var btnViewHiloInternacional = document.querySelectorAll('.btnViewHiloInternacional');
    btnViewHiloInternacional.forEach(function(btnViewHiloInternacional){
        btnViewHiloInternacional.addEventListener('click', function(){
            var idhilointernacional = this.getAttribute("hi");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Hilosinternacionales/getHiloInternacional/'+idhilointernacional;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status)
                    {
                        var estadoHiloInternacional = objData.data.status == 1 ?
                        '<span class="badge badge-success">Activo</span>' :
                        '<span class="badge badge-danger">Inactivo</span>';
                        document.querySelector("#celId").innerHTML = objData.data.idhilosinternacionales;
                        document.querySelector("#celColor").innerHTML = objData.data.nombre_color;
                        document.querySelector("#celMarca").innerHTML = objData.data.marca;
                        document.querySelector("#celTenida").innerHTML = objData.data.tenida;
                        document.querySelector("#celTipo").innerHTML = objData.data.nombre_tipo;
                        document.querySelector("#celPesoTotal").innerHTML = objData.data.peso_total;
                        document.querySelector("#celEmpaquetado").innerHTML = objData.data.tipo_empaquetado;
                        document.querySelector("#celEstado").innerHTML = estadoHiloInternacional;
                        document.querySelector("#celFechaRegistro").innerHTML = objData.data.datecreated;
                        document.querySelector('#celFechaActualizacion').innerHTML = objData.data.dateupdate;
                        $('#modalViewHilosInternacional').modal('show');
                    }else{
                        swal("Error", objData.msg, "error");
                    }
                }
            }
        });
    });
}

function fntEditHiloInternacional(){
    var btnEditHiloInternacional = document.querySelectorAll('.btnEditHiloInternacional');
    btnEditHiloInternacional.forEach(function(btnEditHiloInternacional){
        btnEditHiloInternacional.addEventListener('click', function(){

            document.querySelector('#titleModal').innerHTML = "Actualizar Hilo";
            document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
            document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
            document.querySelector('#btnText').innerHTML = "Actualizar";

            var idhilointernacional = this.getAttribute("hi");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Hilosinternacionales/getHiloInternacional/'+idhilointernacional;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status)
                    {
                        // Llenar los selectores antes de mostrar el modal
                        document.querySelector("#idHilosInternacionales").value = objData.data.idhilosinternacionales;
                        document.querySelector("#listColor").value = objData.data.color_id;
                        document.querySelector("#txtMarca").value = objData.data.marca;
                        document.querySelector("#txtTenida").value = objData.data.tenida;
                        document.querySelector("#listTipo").value = objData.data.tipo_id;
                        document.querySelector("#txtPesoTotal").value = objData.data.peso_total;
                        document.querySelector("#listTipoEmpaquetado").value = objData.data.tipo_empaquetado;

                        // Render selectpickers for the updated selects
                        $('#listColor').selectpicker('render');
                        $('#listTipo').selectpicker('render');
                        $('#listTipoEmpaquetado').selectpicker('render');

                        if (objData.data.status == 1) {
                            document.querySelector("#listStatus").value = 1
                        } else {
                            document.querySelector("#listStatus").value = 2;
                        }
                        $('#listStatus').selectpicker('render');
                    }else{
                        swal("Error", objData.msg, "error");
                    }
                }
                $('#modalFormHilosInternacionales').modal('show');
            }
        });
    });
}

function openModal(){
    document.querySelector('#idHilosInternacionales').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Hilo";
    document.querySelector('#formHilosInternacionales').reset();

    $('#modalFormHilosInternacionales').modal('show');
}