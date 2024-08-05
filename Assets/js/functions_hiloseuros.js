var tableHilosEuros;

document.addEventListener('DOMContentLoaded', function(){

    tableHilosEuros = $('#tableHilosEuros').DataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": " "+media_url+"/js/languageSpanish.json"
        },
        "ajax": {
            "url": " "+base_url+"/Hiloseuros/getHilosEuros",
            "dataSrc":""
        },
        "columns":[
            {"data":"idhiloseuros"},
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
    var formHiloeuro = document.querySelector("#formHilosEuros");
    formHiloeuro.onsubmit = function(e){
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
        var ajaxUrl = base_url+'/Hiloseuros/setHiloeuro';
        var formData = new FormData(formHiloeuro);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status)
                {
                    $('#modalFormHilosEuros').modal("hide");
                    formHiloeuro.reset();
                    swal("Hilos Euros", objData.msg, "success");
                    tableHilosEuros.ajax.reload(function(){
                    });
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
        }
    }
}, false);

$('#tableHilosEuros').DataTable();

window.addEventListener('load', function() {
    fntColores();
    fntTiposPrendas();
    fntViewHiloEuro();
    fntEditHiloEuro();
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

function fntViewHiloEuro(){
    var btnViewHiloEuro = document.querySelectorAll('.btnViewHiloEuro');
    btnViewHiloEuro.forEach(function(btnViewHiloEuro){
        btnViewHiloEuro.addEventListener('click', function(){
            var idhiloeuro = this.getAttribute("he");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Hiloseuros/getHiloEuro/'+idhiloeuro;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status)
                    {
                        var estadoHiloEuro = objData.data.status == 1 ?
                        '<span class="badge badge-success">Activo</span>' :
                        '<span class="badge badge-danger">Inactivo</span>';
                        document.querySelector("#celId").innerHTML = objData.data.idhiloseuros;
                        document.querySelector("#celColor").innerHTML = objData.data.nombre_color;
                        document.querySelector("#celMarca").innerHTML = objData.data.marca;
                        document.querySelector("#celTenida").innerHTML = objData.data.tenida;
                        document.querySelector("#celTipo").innerHTML = objData.data.nombre_tipo;
                        document.querySelector("#celPesoTotal").innerHTML = objData.data.peso_total;
                        document.querySelector("#celEmpaquetado").innerHTML = objData.data.tipo_empaquetado;
                        document.querySelector("#celEstado").innerHTML = estadoHiloEuro;
                        document.querySelector("#celFechaRegistro").innerHTML = objData.data.datecreated;
                        document.querySelector('#celFechaActualizacion').innerHTML = objData.data.dateupdate;
                        $('#modalViewHilosEuro').modal('show');
                    }else{
                        swal("Error", objData.msg, "error");
                    }
                }
            }
        });
    });
}

function fntEditHiloEuro(){
    var btnEditHiloEuro = document.querySelectorAll('.btnEditHiloEuro');
    btnEditHiloEuro.forEach(function(btnEditHiloEuro){
        btnEditHiloEuro.addEventListener('click', function(){

            document.querySelector('#titleModal').innerHTML = "Actualizar Hilo";
            document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
            document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
            document.querySelector('#btnText').innerHTML = "Actualizar";

            var idhiloeuro = this.getAttribute("he");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Hiloseuros/getHiloEuro/'+idhiloeuro;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status)
                    {
                        // Llenar los selectores antes de mostrar el modal
                        document.querySelector("#idHilosEuros").value = objData.data.idhiloseuros;
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
                $('#modalFormHilosEuros').modal('show');
            }
        });
    });
}

function openModal(){
    document.querySelector('#idHilosEuros').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Hilo";
    document.querySelector('#formHilosEuros').reset();

    $('#modalFormHilosEuros').modal('show');
}