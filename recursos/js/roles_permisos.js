$(function () {
    cargarCombo("grupos", "optGrupo");
    $("#optGrupo").change(() => {
        obtenerGenerar();
    });
//    oculto();    
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

// Funcion optimizada para todos
function __ajax(url, data) {
    var ajax = $.ajax({
        'method': 'POST',
        'url': url,
        'data': data
    })
    return ajax;
}

function cargarCombo(entidad, opcion) {
    __ajax('../../validaciones/referencial/mostrarLista.php', {entidad: entidad})
            .done(function (info) {
                for (i in info) {
                    $('#' + opcion)
                            .append(`<option value="${info[i].gru_id}">${info[i].gru_nombre}</option>`);
                }
            })
}

function listar_permisos(idgrupo) {
    var table = $('#tblpermisos').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/roles_permisos/mostrarPermisos.php',
            'data': {idgrupo: idgrupo}
        },
        'columns': [
            {'data': 'pagina'},
            {'data': 'leer'},
            {'data': 'insertar'},
            {'data': 'editar'},
            {'data': 'borrar'},
            {'defaultContent': '<button type="button" class="ver btn btn-primary" onclick=""><i class="fa fa-sign-out fa-fw"></i>Ver</button>'}
        ],
        'language': idioma_spanish
    });

    obtener_data_asignar('#tblpermisos tbody', table);
}

var obtener_data_asignar = function (tbody, table) {
    $(tbody).on('click', 'button.ver', function () {
        let data = table.row($(this).parents('tr')).data();
        $("#txtIdPagina").val(data.idpagina);
        $("#txtPagina").val(data.pagina);
        document.getElementById("optLeer").value = data.leer;
        document.getElementById("optInsertar").value = data.insertar;
        document.getElementById("optEditar").value = data.editar;
        document.getElementById("optBorrar").value = data.borrar;
        $("#modal_formulario").modal("show");
    });
}

function armarDatos(bandera) {
    datos = {
        op: bandera,
        idpagina: document.getElementById("txtIdPagina").value,
        idgrupo: document.getElementById("optGrupo").value,
        leer: document.getElementById("optLeer").value,
        insertar: document.getElementById("optInsertar").value,
        editar: document.getElementById("optEditar").value,
        borrar: document.getElementById("optBorrar").value
    }
    return datos;
}

function persistir() {
//    console.log(armarDatos("m"));
    let datos = armarDatos("m");
    __ajax("../../validaciones/roles_permisos/persistir.php", datos)
            .done((res) => {
                console.log(res);
                obtenerGenerar();
            })
            .fail((res) => {
                console.log(res);
            });
}

function botonGenerar() {
    $("#btnGenerar").click(() => {
        obtenerGenerar();
    });
}

function obtenerGenerar() {
    if (document.getElementById("optGrupo").value !== "..") {
        let idgrupo = document.getElementById("optGrupo").value;
        listar_permisos(idgrupo);
    } else {
        console.log("seleccione un grupo");
    }
}

function volverMenu() {
    $('#verReg').fadeOut();
    $('#panelListaMiembros, #panelBotonesCabecera').fadeIn();
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

