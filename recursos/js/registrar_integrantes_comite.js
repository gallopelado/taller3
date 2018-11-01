$(function () {
    listar_comite_registrados();
    listar_gestion_comite();
    comboCargos();
    oculto();
    ocultoFormAdmi();
});

function oculto() {
    $('.alert, #formulario, #visorLider').hide();
//    $(".alert").hide();
}

function mostrarFormulario() {
    $('#formulario').fadeIn();
    $('#principalLider').fadeOut();
}

function ocultarFormulario() {
    $('#formulario').fadeOut();
    $('#principalLider').fadeIn();
    limpiarFormLider();
}

function ocultoFormAdmi() {
    $('#formulario_admitido').hide();
    regresaFormAdmi();
}

function mostrarFormAdmi() {
    $('#principalAdmitido').fadeOut();
    $('#formulario_admitido').fadeIn();
}

function regresaFormAdmi() {
    $('#principalAdmitido').fadeIn();
    $('#formulario_admitido').fadeOut();
}

function nuevo() {
    mostrarFormulario();
    $("#btnLidGuardar, #btnBuscarComite").prop("disabled", false);
    $("#btnLidModificar").prop("disabled", true);
}

function volverMenu() {
    $("#visorLider").fadeOut();
    $("#principalLider").fadeIn();
}

// Funcion optimizada para todos
function __ajax(url, data) {
    var ajax = $.ajax({
        'method': 'POST',
        'url': url,
        'data': data
    })
    return ajax;
}

function listarIntegrantes() {
    let idcomitecab = document.getElementById("txtIdCab").value;
    __ajax("../../validaciones/registrar_integrantes_comite/mostrarIntegrantes.php", {idcomitecab: idcomitecab})
            .done((res) => {
//                console.log(res);
                $("#tabla_body_listaintegrantes").empty();
                if (res.length !== 0) {
                    for (let i in res) {
                        if (res[i].integrante !== null) {
                            $("#modal_lista_integrantes").modal("show");
                            $("#tbl_lista_integrantes").append($(`<tr>`)
                                    .append($(`<td>${res[i].integrante}</td><td>${res[i].fecha_ingreso}</td>
                                       <td><button type="button" class="btn btn-primary" onclick="recuperaInfo(${res[i].idcandidato},'${res[i].integrante}', ${res[i].cargo_id}, '${res[i].observacion}', ${res[i].en_entrenamiento})">Modificar</button>
                                        <button type="button" class="btn btn-danger" onclick="bajaIntegrante(${res[i].idcandidato})">Eliminar</button></td>`)));
                        } else {
                            $("#modal_lista_integrantes").modal("hide");
                            $.alert("Todavía no se han asignado integrantes");
                        }
                    }
                } else {
                    $.alert("Todavía no se han asignado integrantes");
                }

            })
            .fail((res) => {
                console.log(res);
            });
}

//Metodos para guardar el detalle

function armarDatosDet(op) {
    datos = {
        op: op,
        idcomitecabecera: document.getElementById("txtIdCab").value,
        idcandidato: document.getElementById("txtIdIntegrante").value,
        idcargo: document.getElementById("optCargo").value,
        obs: document.getElementById("txtOb").value,
        entrenamiento: $("#chkEntrenamiento").is(":checked") === true ? true : false
    }
    return datos;
}

function guardarIntegrante() {
    mensajeConfirmacion(function () {
        if (validarFormAdmitido()) {
//            console.log(armarDatosDet("a"));
            __ajax("../../validaciones/registrar_integrantes_comite/persistir_integrantes.php", armarDatosDet("a"))
                    .done((res) => {
//                        console.log(res);
                        mostrarMensajeError(res);
//                        limpiarFormLider();
//                        listar_comite_registrados();
                        $("#btnAdSalir").trigger("click");
                    })
                    .fail((res) => {
                        console.log(res);
                    });
        }
    });
}

function recuperaInfo(idcandidato, integrante, cargo_id, observacion, en_entrenamiento) {
    $("#txtIdIntegrante, #txtIntegrante,txtOb").val("");
    $("#modal_lista_integrantes").modal("hide");
    $("#txtIdIntegrante").val(idcandidato);
    $("#txtIntegrante").val(integrante);
    $("#optCargo").val(cargo_id);
    $("#txtOb").val(observacion);
    if (en_entrenamiento === true)
        $("#chkEntrenamiento").prop("checked", true);
    else
        $("#chkEntrenamiento").prop("checked", false);
    $("#btnBuscarIntegrante").prop("disabled", true);
}

function modificarIntegrante() {
    mensajeConfirmacion(function () {
        if (validarFormAdmitido()) {
//            console.log(armarDatosDet("a"));
            __ajax("../../validaciones/registrar_integrantes_comite/persistir_integrantes.php", armarDatosDet("m"))
                    .done((res) => {
//                        console.log(res);
                        mostrarMensajeError(res);
//                        limpiarFormLider();
//                        listar_comite_registrados();
                        $("#btnAdSalir").trigger("click");
                    })
                    .fail((res) => {
                        console.log(res);
                    });
        }
    });
}

function bajaIntegrante(id) {
    $("#txtIdIntegrante").val(id);
    __ajax("../../validaciones/registrar_integrantes_comite/persistir_integrantes.php", armarDatosDet("b"))
            .done((res) => {
//                console.log(res);
                mostrarMensajeError(res);
//                        limpiarFormLider();
                listarIntegrantes();
                $("#btnAdSalir").trigger("click");
            })
            .fail((res) => {
                console.log(res);
            });
}

function listarMinisterios() {
    var table = $('#tblComite').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/ministerio/listaMinisterio.php'
        },
        'columns': [
            {'data': 'id'},
            {'data': 'descripcion'},
            {'defaultContent': '<button type="button" class="seleccionar btn btn-success" onclick="" data-dismiss="modal">Seleccionar</button>'}
        ],
        'language': idioma_spanish
    });
    asignar_data_ministerio("#tblComite tbody", table);
}

function asignar_data_ministerio(tbody, table) {
    $(tbody).on('click', 'button.seleccionar', function () {
        let data = table.row($(this).parents('tr')).data();
        $("#txtIdComite").val(data.id);
        $("#txtComite").val(data.descripcion);
    });
}

function listarLideres() {
    var table = $('#tbllider').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/registrar_afiliante/mostrarListaMiembros.php'
        },
        'columns': [
            {'data': 'idmiembro'},
            {'data': 'persona'},
            {'defaultContent': '<button type="button" class="seleccionar btn btn-success" onclick="" data-dismiss="modal">Seleccionar</button>'}
        ],
        'language': idioma_spanish
    });
    asignar_data_lideres("#tbllider tbody", table);
}

function asignar_data_lideres(tbody, table) {
    $(tbody).on('click', 'button.seleccionar', function () {
        let data = table.row($(this).parents('tr')).data();
        $("#txtIdLider").val(data.idmiembro);
        $("#txtLider").val(data.persona);
    });
}

function listarSuplentes() {
    var table = $('#tblsuplente').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/registrar_afiliante/mostrarListaMiembros.php'
        },
        'columns': [
            {'data': 'idmiembro'},
            {'data': 'persona'},
            {'defaultContent': '<button type="button" class="seleccionar btn btn-success" onclick="" data-dismiss="modal">Seleccionar</button>'}
        ],
        'language': idioma_spanish
    });
    asignar_data_suplentes("#tblsuplente tbody", table);
}

function asignar_data_suplentes(tbody, table) {
    $(tbody).on('click', 'button.seleccionar', function () {
        let data = table.row($(this).parents('tr')).data();
        $("#txtIdSuplente").val(data.idmiembro);
        $("#txtSuplente").val(data.persona);
    });
}

function listar_gestion_comite() {
    var table = $('#tblGestionComite').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/registrar_integrantes_comite/mostrarListaComitesRegistrados.php'
        },
        'columns': [
            {'data': 'idcomitecab'},
            {'data': 'ministerio'},
            {'defaultContent': '<button type="button" class="gestionar btn btn-primary" onclick="">Gestionar</button>'}
        ],
        'language': idioma_spanish
    });
    obtener_data_gestioncomite("#tblGestionComite tbody", table);
}

function obtener_data_gestioncomite(tbody, table) {
    $(tbody).on('click', 'button.gestionar', function () {
        let data = table.row($(this).parents('tr')).data();
        limpiarFormAdmitidos();
        mostrarFormAdmi();
        $("#txtIdCab").val(data.idcomitecab);
        $("#txtCab").val(data.ministerio);
        $("#btnBuscarIntegrante").prop("disabled", false);
//        $("#txtIdIntegrante, #txtIntegrante").val("");

    });
}

function obtenerListaPostulaciones() {
    let ministerio = document.getElementById("txtCab").value;
    __ajax("../../validaciones/evaluacion_postulante/verificaGeneradosXMinisterio.php", {ministerio: ministerio})
            .done((res) => {
                if (res.length !== 0) {
//                    console.log(res);
                    $("#modal_lista_postulacion").modal("show");
                    $("#tabla_body_listapostulacion").empty();
                    for (let i in res) {
                        $("#tbl_lista_postulacion").append($(`<tr>`)
                                .append($(`<td>${res[i].ministerio}</td><td>${res[i].finpostu}</td>
                                       <td><button type="button" class="btn btn-primary" onclick="desplegarPostulacion(${res[i].idcabecera})" data-toggle="modal" data-target="#modal_lista_seleccion">Ver lista</button></td>`)));
                    }
                } else {
                    $.alert("No hay integrantes/postulaciones para agregar");
                    $("#modal_lista_postulacion").modal("hide");
                }

            })
            .fail((res) => {
                console.log(res);
            });
}

function desplegarPostulacion(idcabecera) {
    __ajax("../../validaciones/evaluacion_postulante/desplegarPostulacion.php", {idcabe: idcabecera})
            .done((res) => {
                $("#tabla_body_listaseleccion").empty();
                for (let i in res) {
                    $("#tbl_lista_seleccion").append($(`<tr>`)
                            .append($(`<td>${res[i].candidato}</td>
                                       <td><button type="button" class="btn btn-success" onclick="recuperaAdmitido(${res[i].idcandidato},'${res[i].candidato}')">Seleccionar</button></td>`)));
                }
            })
            .fail((res) => {
                console.log(res);
            });
}

function recuperaAdmitido(id, candidato) {
    $("#txtIdIntegrante").val(id);
    $("#txtIntegrante").val(candidato);
    $("#modal_lista_seleccion, #modal_lista_postulacion").modal("hide");
}

function listar_comite_registrados() {
    var table = $('#tbllistaComite').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/registrar_integrantes_comite/mostrarListaComitesRegistrados.php'
        },
        'columns': [
            {'data': 'idcomitecab'},
            {'data': 'ministerio'},
            {'data': 'lider'},
            {'defaultContent': '<button type="button" class="ver btn btn-primary" onclick="">Ver</button>' + ' ' + '<button type="button" class="modificar btn btn-primary" onclick="mostrarFormulario()">Modificar</button> <button type="button" class="anular btn btn-danger">Anular</button>'}
        ],
        'language': idioma_spanish
    });
    obtener_data_asignar('#tbllistaComite tbody', table);
    obtener_data_anular('#tbllistaComite tbody', table);
    obtener_data_visor('#tbllistaComite tbody', table);
}

var obtener_data_asignar = function (tbody, table) {
    $(tbody).on('click', 'button.modificar', function () {
        limpiarFormLider();
        let data = table.row($(this).parents('tr')).data();
        $("#txtId").val(data.idcomitecab);
        $("#txtIdComite").val(data.idministerio);
        $("#txtComite").val(data.ministerio);
        $("#txtIdLider").val(data.idlider);
        $("#txtLider").val(data.lider);
        $("#txtIdSuplente").val(data.idsuplente);
        $("#txtSuplente").val(data.suplente);
        $("#txtDescri").val(data.descri);
        $("#txtObs").val(data.obs);
        $('#btnLidGuardar, #btnBuscarComite').prop('disabled', true);
        $('#btnLidModificar').prop('disabled', false);
    });
}

var obtener_data_anular = function (tbody, table) {
    $(tbody).on('click', 'button.anular', function () {
        limpiarFormLider();
        let data = table.row($(this).parents('tr')).data();
        $("#txtId").val(data.idcomitecab);
        anular(data.idcomitecab);
    });
}

var obtener_data_visor = function (tbody, table) {
    $(tbody).on('click', 'button.ver', function () {
        let data = table.row($(this).parents('tr')).data();
        $("#principalLider").fadeOut();
        $("#visorLider").fadeIn();
        visorLider(data);
    });
}

function visorLider(data) {
    $("#lblcomite, #lbllider, #lblsuplente, #lblsuplente, #lbldescripcion, #lblobservacion").text("");
    $("#lblcomite").text(data.ministerio);
    $("#lbllider").text(data.lider);
    $("#lblsuplente").text(data.suplente);
    $("#lbldescripcion").text(data.descri);
    $("#lblobservacion").text(data.obs);
}


var comboCargos = function () {
    __ajax("../../validaciones/referencial/mostrarLista.php", {entidad: "lista_cargos"})
            .done((res) => {
                for (i in res) {
                    $("#optCargo").append(`<option value="${res[i].idcargo}">${res[i].descripcion}</option>`);
                }
            })
            .fail((res) => {
                console.log("Error " + res);
            });
}

function validarFormLider() {
    if (document.getElementById("txtIdComite").value === "") {
        alertas('Campo vacio', 'El comite esta vacio', 'btnBuscarComite');
        return false;
    }
    if (document.getElementById("txtIdLider").value === "") {
        alertas('Campo vacio', 'El lider esta vacio', 'btnBuscarLider');
        return false;
    }
    if (document.getElementById("txtDescri").value === "") {
        alertas('Campo vacio', 'La descripcion esta vacio', 'txtDescri');
        return false;
    }
    return true;
}

function validarFormAdmitido() {
    if (document.getElementById("txtIdCab").value === "") {
        alertas('Campo vacio', 'El comite esta vacio', 'txtIdCab');
        return false;
    }
    if (document.getElementById("txtIdIntegrante").value === "") {
        alertas('Campo vacio', 'El integrante esta vacio', 'btnBuscarIntegrante');
        return false;
    }
//    if (document.getElementById("txtDescri").value === "") {
//        alertas('Campo vacio', 'La descripcion esta vacio', 'txtDescri');
//        return false;
//    }
    return true;
}

function limpiarFormLider() {
    document.getElementById("txtId").value = "";
    document.getElementById("txtIdComite").value = "";
    document.getElementById("txtComite").value = "";
    document.getElementById("txtIdLider").value = "";
    document.getElementById("txtLider").value = "";
    document.getElementById("txtIdSuplente").value = "";
    document.getElementById("txtSuplente").value = "";
    document.getElementById("txtDescri").value = "";
    document.getElementById("txtObs").value = "";
}

function limpiarFormAdmitidos() {
    document.getElementById("txtIdCab").value = "";
    document.getElementById("txtCab").value = "";
    document.getElementById("txtIdIntegrante").value = "";
    document.getElementById("txtIntegrante").value = "";
    document.getElementById("txtOb").value = ""
    $("#optCargo").empty();
    comboCargos();
    ocultoFormAdmi();
}

function armarDatos(op) {
    let datos = {
        op: op,
        idcomitecab: document.getElementById("txtId").value,
        idministerio: document.getElementById("txtIdComite").value,
        idlider: document.getElementById("txtIdLider").value,
        idsuplente: document.getElementById("txtIdSuplente").value,
        descripcion: document.getElementById("txtDescri").value,
        obs: document.getElementById("txtObs").value
    }
    return datos;
}

var guardar = function () {
    mensajeConfirmacion(function () {
        if (validarFormLider()) {
            __ajax("../../validaciones/registrar_integrantes_comite/persistir.php", armarDatos("a"))
                    .done((res) => {
//                        console.log(res);
                        mostrarMensajeError(res);
                        limpiarFormLider();
                        listar_comite_registrados();
                        $("#btnLidSalir").trigger("click");
                    })
                    .fail((res) => {
                        console.log(res);
                    });
        }
    });
}

var modificar = function () {
    mensajeConfirmacion(function () {
        if (validarFormLider()) {
            __ajax("../../validaciones/registrar_integrantes_comite/persistir.php", armarDatos("m"))
                    .done((res) => {
//                        console.log(res);
                        mostrarMensajeError(res);
                        limpiarFormLider();
                        listar_comite_registrados();
                        $("#btnLidSalir").trigger("click");
                    })
                    .fail((res) => {
                        console.log(res);
                    });
        }
    });
}

function anular(id) {
    __ajax("../../validaciones/registrar_integrantes_comite/persistir.php", armarDatos("b"))
            .done((res) => {
//                console.log(res);
                mostrarMensajeError(res);
                listar_comite_registrados();
            })
            .fail((res) => {
                console.log(res);
            });
}

function avisoTexto(id, texto) {
    $('#av' + id).text(texto);
    $('#av' + id).fadeIn(3000);
    $('#av' + id).fadeOut(8000);
}

function mensajeConfirmacion(funcion) {
    $.confirm({
        title: 'Mensaje confirmacion',
        content: 'Confirmar su operacion ?',
        buttons: {
            confirm: {
                text: 'Confirmar',
                btnClass: 'btn-blue',
                action: funcion
            },
            cancel: {
                text: 'Cancelar',
                btnClass: 'btn-red',
                action: function () {
                    $.alert('Cancelado');
                }
            }
        }
    });
}

function alertas(titulo, mensaje, foco) {
    $.alert({
        title: titulo,
        content: mensaje,
        scrollToPreviousElement: false,
        buttons: {
            "OK": function () {
                $("#" + foco).focus();
            }
        }
    });
}

function mostrarMensajeError(respuesta) {
    if (respuesta === '10004') {
        configuraAlert('Referenciada', 'Ya esta registrado', 5000);
    } else if (respuesta === 'true') {
        configuraAlert('Referenciada', 'Exitoso', 5000);
    }
}

function configuraAlert(id, mostrarTexto, duracion) {
    $('#alert' + id).text(mostrarTexto);
    $('#alert' + id).show();
    $('#alert' + id).fadeOut(duracion);
}

let idioma_spanish = {
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
