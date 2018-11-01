$(function () {
    listar_miembros();
    combos();
    analizaAsistenciaOtraIglesia();
    analizaConyugeMiembros();
    oculto();
    datepicker();
});

function oculto() {
    $('.alert, #panelFormularioRegistro, #panelBotones, #panelListaRequisitos, #verReg').hide();
//    $('.alert').hide();
}

function mostrarFormulario() {
    $('#panelFormularioRegistro, #panelBotones, #panelListaRequisitos').fadeIn();
    $('#panelListaMiembros, #panelBotonesCabecera').fadeOut();
}

function ocultarFormulario() {
    $('#panelFormularioRegistro, #panelBotones, #panelListaRequisitos').fadeOut();
    $('#panelListaMiembros, #panelBotonesCabecera').fadeIn();
    limpiarFormulario();
}

function nuevoMiembro() {
    mostrarFormulario();
    $('#txtId').val('');
    $('#txtIdPersona').val('');
    $('#txtPersona').val('');
    $('#btnModificar').prop('disabled', true);
    $('#btnGuardar').prop('disabled', false);
    limpiarFormulario();
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

//Cargar los combos
function combos() {
    cargarCombo('clasificacionsocial', 'optClasificacionSocial');
    cargarCombo('estadomembresia', 'optEstadoMembresia');
}

function cargarCombo(entidad, opcion) {
    __ajax('../../validaciones/enums/mostrarEnum.php', {entidad: entidad})
            .done(function (info) {
                for (i in info) {
                    $('#' + opcion)
                            .append(`<option value="${info[i].descripcion}">${info[i].descripcion}</option>`);
                }
            })
}

// Manejo de los buscadores
function listar_Persona_buscador() {
    var table = $('#tblpersona').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/persona/mostrarAllPersona.php'
        },
        'columns': [
            {'data': 'id'},
            {'data': 'persona'},
            {'data': 'ci'},
            {'defaultContent': '<button type="button" class="asignar btn btn-success" onclick="" data-dismiss="modal">Elegir</button>'}
        ],
        'language': idioma_spanish
    });
    seleccionPersona('#tblpersona tbody', table);
}

function listar_iniciador_buscador() {
    var table = $('#tblIniciador').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/persona/mostrarAllPersona.php'
        },
        'columns': [
            {'data': 'id'},
            {'data': 'persona'},
            {'data': 'ci'},
            {'defaultContent': '<button type="button" class="asignar btn btn-success" onclick="" data-dismiss="modal">Elegir</button>'}
        ],
        'language': idioma_spanish
    });
    seleccionIniciador('#tblIniciador tbody', table);
}

function listar_conyuge_buscador() {
    var table = $('#tblConyuge').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/persona/mostrarAllPersona.php'
        },
        'columns': [
            {'data': 'id'},
            {'data': 'persona'},
            {'data': 'ci'},
            {'defaultContent': '<button type="button" class="asignar btn btn-success" onclick="" data-dismiss="modal">Elegir</button>'}
        ],
        'language': idioma_spanish
    });
    seleccionConyuge('#tblConyuge tbody', table);
}

var seleccionPersona = function (tbody, table) {
    $(tbody).on('click', 'button.asignar', function () {
        let data = table.row($(this).parents('tr')).data();
        let idpersona = $('#txtIdPersona').val(data.id),
                persona = $('#txtPersona').val(data.persona);
    });
}

var seleccionIniciador = function (tbody, table) {
    $(tbody).on('click', 'button.asignar', function () {
        let data = table.row($(this).parents('tr')).data();
        let idpersona = $('#txtIdIniciador').val(data.id),
                persona = $('#txtIniciador').val(data.persona);
    });
}

var seleccionConyuge = function (tbody, table) {
    $(tbody).on('click', 'button.asignar', function () {
        let data = table.row($(this).parents('tr')).data();
        let idpersona = $('#txtIdConyuge').val(data.id),
                persona = $('#txtConyuge').val(data.persona);
    });
}

function listar_miembros() {
    var table = $('#tblMiembros').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/registrar_afiliante/mostrarListaMiembros.php'
        },
        'columns': [
            {'data': 'idmiembro'},
            {'data': 'persona'},
            {'data': 'iniciomembresia'},
            {'defaultContent': '<button type="button" class="ver btn btn-primary" onclick="">Ver</button>' + ' ' +
                        '<button type="button" class="modificar btn btn-primary" onclick="mostrarFormulario()">Modificar</button>' + ' ' +
                        '<button type="button" class="baja btn btn-danger" onclick="">Dar de baja</button>'}
        ],
        'language': idioma_spanish
    });
    obtener_data_asignar('#tblMiembros tbody', table);
    obtener_data_visor('#tblMiembros tbody', table);
}

function listar_persona() {
    var table = $('#tblPersona').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/persona/mostrarAllPersona.php'
        },
        'columns': [
            {'data': 'id'},
            {'data': 'persona'},
            {'data': 'ci'},
            {'defaultContent': '<button type="button" class="ver btn btn-primary" onclick="">Ver</button>' + ' ' +
                        '<button type="button" class="asignar btn btn-primary" onclick="mostrarFormulario()">Asignar</button>' + ' ' +
                        '<button type="button" class="modificar btn btn-primary" onclick="mostrarFormulario()">Modificar</button>'}
        ],
        'language': idioma_spanish
    });
    obtener_data_asignar('#tblPersona', table);
    obtener_data_visor('#tblPersona', table);
}

var obtener_data_asignar = function (tbody, table) {
    $(tbody).on('click', 'button.modificar', function () {
        let data = table.row($(this).parents('tr')).data();
        let idpersona = $('#txtId').val(data.idmiembro),
                persona = $('#txtPersona').val(data.persona);
        obtenerDatosMiembro();
         $('#btnGuardar').prop('disabled', true);
         $('#btnModificar').prop('disabled', false);
    });
    $(tbody).on('click', 'button.baja', function () {
        let data = table.row($(this).parents('tr')).data();
        let idmiembro = $('#txtId').val(data.idmiembro),
                idpersona = $('#txtIdPersona').val(data.idpersona);
        eliminar();
    });    
}

function obtener_data_visor(tbody, table) {
    $(tbody).on('click', 'button.ver', function () {
        var data = table.row($(this).parents('tr')).data();        
        let idmiembro = $('#lblpersona').val(data.idmiembro),
                idpersona = $('#txtIdPersona').val(data.idpersona);
        visorDocumentos(data.idmiembro);
        $('#verReg').fadeIn();
        $('#panelListaMiembros, #panelBotonesCabecera').fadeOut();
        $('#btnGuardar').prop('disabled', false);
        $('#btnModificar').prop('disabled', true);
    });
}

function volverMenu() {
    $('#verReg').fadeOut();
    $('#panelListaMiembros, #panelBotonesCabecera').fadeIn();
}

function visorDocumentos(id) {    
    __ajax('../../validaciones/registrar_afiliante/buscarMiembro.php', {idmiembro: id})
            .done(function (info) {
                if (info) {
                    limpiarVisor();
                    for (i in info) {
//                        console.log(info);
                        $('#lblpersona').text(info[i].persona);
                        $('#lblrazonalta').text(info[i].razonadmision);
                        $('#lblclasisocial').text(info[i].clasisocial);
                        $('#lblestado').text(info[i].estadomembresia);
                        $('#lblfechaconversion').text(info[i].fechaconverso);
                        $('#lbliniciomembre').text(info[i].iniciomembresia);
                        $('#lbliglesiaAnterior').text(info[i].otraiglesia);
                        $('#lbliniciador').text(info[i].iniciador);
                        $('#lblformacontacto').text(info[i].formacontacto);
                        $('#lblconyuge').text(info[i].conyuge);
                        $('#lblnrohijos').text(info[i].nrohijos);
                        $('#lblobservacion').text(info[i].observacion);
                    }
                } else {
//                    $('#tblVisorRequisitos').hide();
                    limpiarVisor();
                }
            });
}

function limpiarVisor() {
    $('#lblpersona').text('');
    $('#lblrazonalta').text('');
    $('#lblclasisocial').text('');
    $('#lblestado').text('');
    $('#lblfechaconversion').text('');
    $('#lbliniciomembre').text('');
    $('#lbliglesiaAnterior').text('');
    $('#lbliniciador').text('');
    $('#lblformacontacto').text('');
    $('#lblconyuge').text('');
    $('#lblnrohijos').text('');
    $('#lblobservacion').text('');
}

function limpiarFormulario() {
    $('#txtFechaConversion').val('');
    $('#txtInicioMembresia').val('');
    $('#chkAsisIglesia').prop('checked', false);
    $('#txtIglesia').val('');
    $('#txtIdIniciador').val('');
    $('#txtIniciador').val('');
    $('#txtFormaContacto').val('');
    $('#chkConyuge').prop('checked', false);
    $('#txtNumHijos').val('');
    $('#txtIdConyuge').val('');
    $('#txtConyuge').val('');
    $('#txtObs').val('');
}

var obtenerDatosMiembro = function () {
    let data = {idmiembro: $('#txtId').val()};
    __ajax('../../validaciones/registrar_afiliante/buscarMiembro.php', data)
            .done(function (res) {
                limpiarFormulario();
                if (res) {
                    cargaFormulario(res);
                }
            })
            .fail(function (res) {
                console.log(res);
                console.log('error');
            })
            .always(function (res) {
                console.log('procesado..');
            })
}

function cargaFormulario(obj) {
//    console.log(obj);    
    for (i in obj) {
        $('#txtIdPersona').val(obj[i].idpersona);
        if (obj[i].razonadmision === 'TESTIMONIO') {
            $('#rdbTestimonio').prop('checked', true);
        } else if (obj[i].razonadmision === 'BAUTISMO') {
            $('#rdbBautismo').prop('checked', true);
        } else if (obj[i].razonadmision === 'TRANSFERENCIA') {
            $('#rdbTransferencia').prop('checked', true);
        }
        $('#optClasificacionSocial').val(obj[i].clasisocial);
        $('#optEstadoMembresia').val(obj[i].estadomembresia);
        $('#txtFechaConversion').val(obj[i].fechaconverso);
        $('#txtInicioMembresia').val(obj[i].iniciomembresia);
        if (obj[i].asistiaotraiglesia === true) {
            $('#chkAsisIglesia').prop('checked', true);
            $('#txtIglesia').val(obj[i].otraiglesia);
            $('#divIglesia').fadeIn();
        }
        if (obj[i].padresmiembros === true) {
            $('#chkPadresMiembros').prop('checked', true);
        }
        $('#txtIdIniciador').val(obj[i].idiniciador);
        $('#txtIniciador').val(obj[i].iniciador);
        $('#txtFormaContacto').val(obj[i].formacontacto);
        if (obj[i].esmiembroconyuge === true) {
            $('#chkConyuge').prop('checked', true);
            $('#txtIdConyuge').val(obj[i].idconyuge);
            $('#txtConyuge').val(obj[i].conyuge);
            $('#divElegirConyuge').fadeIn();
        }
        $('#txtNumHijos').val(obj[i].nrohijos);
        $('#txtObs').val(obj[i].observacion);
    }
}

function recuperaOpcionesAlta() {
    let _opBautismo = $('#rdbBautismo'),
            _opTestimonio = $('#rdbTestimonio'),
            _opTransferencia = $('#rdbTransferencia'),
            _opAlta = '';
    if (_opBautismo.is(':checked')) {
        _opAlta = _opBautismo.val();
    } else if (_opTestimonio.is(':checked')) {
        _opAlta = _opTestimonio.val();
    } else if (_opTransferencia.is(':checked')) {
        _opAlta = _opTransferencia.val();
    }
    return _opAlta;
}

function recuperaDatosFormulario() {
    let datos = {
        idmiembro: $('#txtId'),
        idpersona: $('#txtIdPersona'),
        razonalta: recuperaOpcionesAlta(),
        clasificacionsocial: $('#optClasificacionSocial'),
        estadomembresia: $('#optEstadoMembresia'),
        fechaconversion: $('#txtFechaConversion'),
        iniciomembresia: $('#txtInicioMembresia'),
        asistiaotraiglesia: $('#chkAsisIglesia'),
        padresmiembros: $('#chkPadresMiembros'),
        otraiglesia: $('#txtIglesia'),
        idiniciador: $('#txtIdIniciador'),
        formacontacto: $('#txtFormaContacto'),
        conyugemiembro: $('#chkConyuge'),
        numerohijos: $('#txtNumHijos'),
        idconyuge: $('#txtIdConyuge'),
        observacion: $('#txtObs')
    }
    return datos;
}

function extraeDatos(opcion) {
    let datos = recuperaDatosFormulario();
    let datosjson = {
        op: opcion,
        idmiembro: testeaNULL(datos.idmiembro.val()),
        idpersona: testeaNULL(datos.idpersona.val()),
        razonalta: recuperaOpcionesAlta(),
        clasificacionsocial: testeaNULL(datos.clasificacionsocial.val()),
        estadomembresia: testeaNULL(datos.estadomembresia.val()),
        fechaconversion: testeaNULL(datos.fechaconversion.val()),
        iniciomembresia: testeaNULL(datos.iniciomembresia.val()),
        asistiaotraiglesia: analizaBooleano(datos.asistiaotraiglesia),
        padresmiembros: analizaBooleano(datos.padresmiembros),
        otraiglesia: testeaNULL(datos.otraiglesia.val()),
        idiniciador: testeaNULL(datos.idiniciador.val()),
        formacontacto: testeaNULL(datos.formacontacto.val()),
        conyugemiembro: analizaBooleano(datos.conyugemiembro),
        numerohijos: testeaNULL(datos.numerohijos.val()),
        idconyuge: testeaNULL(datos.idconyuge.val()),
        observacion: testeaNULL(datos.observacion.val())
    }
    return datosjson;
}

function testeaNULL(obj) {
    if (obj !== '' && obj !== null) {
        return obj;
    } else {
        return null;
    }
}

var guardar = function () {
    //Mensaje de confirmacion
    var result = confirm('Desea guardar ?');
    if (result === true) {
        //Recoleccion de datos
        let datos = extraeDatos('a');
        //Validar formulario
        if (validarFormulario(datos)) {
            // Se procede a guardar
            console.log(datos);
            $.ajax({
                url: '../../validaciones/registrar_afiliante/persistirMiembro.php',
                data: datos,
                type: 'POST',
                success: function (res) {
                    console.log(res);
                    mostrarMensajeError(res);
                    listar_miembros();
                },
                error: function (res) {
                    console.log('Error ' + res);
                }
            });
//            limpiarFormulario();
        }
    } else { //else del mensaje confirm
        alert('Usted ha cancelado');
    }
}

var modificar = function () {
    //Mensaje de confirmacion
    var result = confirm('Desea modificar');
    if (result === true) {
        let datos = extraeDatos('m');
        if (validarFormulario(datos)) {
            __ajax('../../validaciones/registrar_afiliante/persistirMiembro.php', datos)
                    .done(function (res) {
                        console.log(res);
                        mostrarMensajeError(res);
                        listar_miembros();
                    })
                    .fail(function (res) {
                        alert('Error ' + res);
                    })
                    .always(function (res) {
                        console.log('Completado modificar');
                    });
        }
    } else {
        alert('Usted ha cancelado');
    }

}

function eliminar() {
    var result = confirm('Desea dar de baja ?');
    if (result === true) {
        let datos = extraeDatos('b');
        if (validarFormulario(datos)) {
            __ajax('../../validaciones/registrar_afiliante/persistirMiembro.php', datos)
                    .done(function (res) {
                        console.log(res);
                        mostrarMensajeError(res);
                        listar_miembros();
                    })
                    .fail(function (res) {
                        alert('Error ' + res);
                    })
                    .always(function (res) {
                        console.log('Completado dar de baja');
                    });
        }
    } else {
        alert('Usted ha cancelado');
    }
}

function mostrarMensajeError(respuesta) {
    if (respuesta === '23505') {
        configuraAlert('Referenciada', 'Ya esta registrado', 5000);
    } else if (respuesta === '10004') {
        configuraAlert('Referenciada', 'Ya esta registrado', 5000);
    } else if (respuesta === '10001') {
        configuraAlert('Referenciada', 'No tiene ficha de bautismo', 10000);
    } else if (respuesta === '10002') {
        configuraAlert('Referenciada', 'No tiene carta de testimonio', 10000);
    } else if (respuesta === '10003') {
        configuraAlert('Referenciada', 'No tiene carta de traslado', 10000);
    } else if (respuesta === '10005') {
        configuraAlert('Referenciada', 'No tiene el Evento Culto Central', 10000);
    } else if (respuesta === 'true') {
        configuraAlert('Referenciada', 'Exitoso', 5000);
        // cargaDocumentos(); //Refresca la lista de documentos
        //cerrar el formulario
    }
}

function configuraAlert(id, mostrarTexto, duracion) {
    $('#alert' + id).text(mostrarTexto);
    $('#alert' + id).show();
    $('#alert' + id).fadeOut(duracion);
}

function analizaAsistenciaOtraIglesia() {
    $('#chkAsisIglesia').click(function () {
        if ($('#chkAsisIglesia').prop('checked')) {
            $('#txtFormaContacto').val('');
            $('#divIglesia').fadeIn();
        } else {
            $('#divIglesia').fadeOut();
        }
    });
}

function analizaConyugeMiembros() {
    $('#chkConyuge').click(function () {
        if ($('#chkConyuge').prop('checked')) {
            $('#txtIdConyuge, #txtConyuge').val('');
            $('#divElegirConyuge').fadeIn();
        } else {
            $('#divElegirConyuge').fadeOut();
        }
    });
}

function analizaBooleano(obj) {
    let elemento = obj;
    if (elemento.prop('checked')) {
        return true;
    } else {
        return null;
    }
}

var validarFormulario = function (obj) {
    let datos = obj,
            elemento = recuperaDatosFormulario();

    if (datos.idpersona === '' || datos.idpersona === null) {
        avisoTexto('IdPersona', 'No debe quedar vacio');
        $('#btnBuscarPersona').focus();
        return false;
    }

    if (datos.conyugemiembro === true && datos.idconyuge === null) {
        alert('Debe escoger el conyuge !');
        $('#btnBuscarConyuge').focus();
        return false;
    }

    if (datos.asistiaotraiglesia === true && datos.otraiglesia === null) {
        alert('Debe escribir su iglesia anterior !');
        elemento.otraiglesia.focus();
        return false;
    }

    return true;
}

function avisoTexto(id, texto) {
    $('#av' + id).text(texto);
    $('#av' + id).fadeIn(3000);
    $('#av' + id).fadeOut(8000);
}



//Idioma spanish para el datatable
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

//Manejo del datepicker
$.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);

function datepicker() {
    var todayDate = new Date().getDate();
    $('#txtFechaConversion').datepicker({
        // locale : 'es',
        // format : 'LL',
        yearRange: "1920:2018",
        currentText: 'Now',
        dateFormat: 'dd-mm-yy',
        minDate: new Date('1920,1-1,1'),
        changeMonth: true,
        changeYear: true,
        maxDate: new Date(new Date().setDate(todayDate))
    });
}
