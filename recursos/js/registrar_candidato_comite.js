$(function () {
    listar_candidatos();
    oculto();
});

function oculto() {
    $('.alert, #panelFormularioRegistro, #panelBotones, #panelListaRequisitos, #verReg').hide();
//    $('.alert').hide();
}
function nuevoMiembro() {
    let cand = new candidato('a', $('#txtId'), $('#txtMiembro'), $('#txtIdMiembro'), $('#txtCualidades'), $('#txtActitudes'), $('#txtAntecedentes'), $('#txtFecha'), $('#txtServir'));
    cand.limpiarCampos();
    let vi = new Visor($("#lblmiembro"), $("#lblcualidades"), $("#lblactitudes"), $("#lblantecedentes"), $("#lblfecha"), $("#lblservir"));
    vi.limpiarVisor();
    mostrarFormulario();
    $('#btnGuardar').prop('disabled', false);
    $('#btnModificar').prop('disabled', true);

}
function mostrarFormulario() {
    $('#panelFormularioRegistro, #panelBotones').fadeIn();
    $('#panelListaPersonas, #botones_cabecera, #panelBotonesCabecera').fadeOut();
}

function ocultarFormulario() {
    $('#panelFormularioRegistro, #panelBotones, #panelListaRequisitos').fadeOut();
    $('#panelListaPersonas, #panelBotonesCabecera').fadeIn();
}

function mostrarVisor() {
    $('#panelListaPersonas, #panelBotonesCabecera').fadeOut();
    $('#verReg').fadeIn();
}

function volverMenu() {
    $('#verReg').fadeOut();
    $('#panelListaPersonas, #panelBotonesCabecera').fadeIn();
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

function listar_busqueda_miembros() {
    var table = $('#tblMiembro').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/registrar_afiliante/mostrarListaMiembros.php'
        },
        'columns': [
            {'data': 'idmiembro'},
            {'data': 'persona'},
            {'data': 'estadomembresia'},
            {'defaultContent': '<button type="button" class="seleccionar btn btn-success" data-dismiss="modal" onclick="">Seleccionar</button>'}
        ],
        'language': idioma_spanish
    });
    obtener_data_miembro('#tblMiembro tbody', table);
}

var obtener_data_miembro = function (tbody, table) {
    $(tbody).on('click', 'button.seleccionar', function () {
        let data = table.row($(this).parents('tr')).data();
        // console.log(data);
        let idpersona = $('#txtIdMiembro').val(data.idmiembro),
                persona = $('#txtMiembro').val(data.persona);
        $('#btnGuardar').prop('disabled', false);
        $('#btnModificar').prop('disabled', true);
    });
}

function listar_candidatos() {
    var table = $('#tblCandidatos').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/registrar_candidato_comite/mostrarCandidatos.php'
        },
        'columns': [
            {'data': 'idcandidato'},
            {'data': 'miembro'},
            {'data': 'fecha'},
            {'defaultContent': '<button type="button" class="ver btn btn-primary" onclick="">Ver</button>' + ' ' + '<button type="button" class="modificar btn btn-primary" onclick="mostrarFormulario()">Modificar</button>'}
        ],
        'language': idioma_spanish
    });
    obtener_data_asignar('#tblCandidatos tbody', table);
    obtener_data_visor('#tblCandidatos tbody', table);
}

var obtener_data_asignar = function (tbody, table) {
    $(tbody).on('click', 'button.modificar', function () {
        let data = table.row($(this).parents('tr')).data();
//         console.log(data);
        // Usando la definicion de funcion
        let cand = new candidato('a', $('#txtId'), $('#txtMiembro'), $('#txtIdMiembro'), $('#txtCualidades'),
                $('#txtActitudes'), $('#txtAntecedentes'), $('#txtFecha'), $('#txtServir'));
        cand.idcandidato.val(data.idcandidato);
        cand.idmiembro.val(data.idmiembro);
        cand.candinombre.val(data.miembro);
        cand.cualidades.val(data.cualidades);
        cand.actitudes.val(data.actministerial);
        cand.antecedentes.val(data.antecedentes);
        cand.fecha.val(data.fecha);
        cand.servir.val(data.servir);
        $('#btnGuardar').prop('disabled', true);
        $('#btnModificar').prop('disabled', false);
    });
}

var obtener_data_visor = function (tbody, table) {
    $(tbody).on('click', 'button.ver', function () {
        let data = table.row($(this).parents('tr')).data();
        // console.log(data);
        // Usando la clase Visor
        let vi = new Visor($("#lblmiembro"), $("#lblcualidades"), $("#lblactitudes"), $("#lblantecedentes"), $("#lblfecha"), $("#lblservir"));
        vi.miembro.text(data.miembro);
        vi.cualidades.text(data.cualidades);
        vi.actitudes.text(data.actministerial);
        vi.antecedentes.text(data.antecedentes);
        vi.fecha.text(data.fecha);
        vi.servir.text(data.servir);
        mostrarVisor();
        $('#btnGuardar').prop('disabled', false);
        $('#btnModificar').prop('disabled', true);
    });
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

var guardar = function () {
    // Creamos el objeto
    let cand = new candidato('a', $('#txtId'), $('#txtMiembro'), $('#txtIdMiembro'), $('#txtCualidades'),
            $('#txtActitudes'), $('#txtAntecedentes'), $('#txtFecha'), $('#txtServir'));
    // Mensaje de confirmacion
    mensajeConfirmacion(function () {
        if (cand.validar()) {
            let datos = cand.empaquetarJSON();
            __ajax("../../validaciones/registrar_candidato_comite/persistir.php", datos)
                    .done((res) => {
                        console.log(res);
                        res === 'true' ? cand.limpiarCampos() : mostrarMensajeError(res);
                        mostrarMensajeError(res);
                        listar_candidatos();
                    })
                    .fail((res) => {
                        console.log(res);
                    });
        }
    });
}

var modificar = function () {
    // Creamos el objeto
    let cand = new candidato('m', $('#txtId'), $('#txtMiembro'), $('#txtIdMiembro'), $('#txtCualidades'),
            $('#txtActitudes'), $('#txtAntecedentes'), $('#txtFecha'), $('#txtServir'));
    // Mensaje de confirmacion
    mensajeConfirmacion(function () {
        if (cand.validar()) {
            let datos = cand.empaquetarJSON();
            __ajax("../../validaciones/registrar_candidato_comite/persistir.php", datos)
                    .done((res) => {
                        console.log(res);
                        res === 'true' ? cand.limpiarCampos() : mostrarMensajeError(res);
                        mostrarMensajeError(res);
                        listar_candidatos();
                    })
                    .fail((res) => {
                        console.log(res);
                    });
        }
    });
}

function testeaNULL(obj) {
    if (obj !== '' && obj !== null) {
        return obj;
    } else {
        return null;
    }
}

function avisoTexto(id, texto) {
    $('#av' + id).text(texto);
    $('#av' + id).fadeIn(3000);
    $('#av' + id).fadeOut(8000);
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

function candidato(_op, _idcandidato, _candinombre, _idmiembro, _cualidades, _actitudes, _antecedentes, _fecha, _servir) {
    this.op = _op;
    this.idcandidato = _idcandidato;
    this.candinombre = _candinombre;
    this.idmiembro = _idmiembro;
    this.cualidades = _cualidades;
    this.actitudes = _actitudes;
    this.antecedentes = _antecedentes;
    this.fecha = _fecha;
    this.servir = _servir;

    // Metodo para validar
    this.validar = function () {

        if (this.candinombre.val() === '' || this.candinombre.val() === null) {
            alertas('Campo vacio', 'El miembro esta vacio', 'btnBuscarMiembro');
            return false;
        }

        if (this.cualidades.val() === '' || this.cualidades.val() === null) {
            alertas('Campo vacio', 'El campo cualidades esta vacio', 'txtCualidades');
            return false;
        }

        if (this.actitudes.val() === '' || this.actitudes.val() === null) {
            alertas('Campo vacio', 'El campo actitudes esta vacio', 'txtActitudes');
            return false;
        }

        if (this.antecedentes.val() === '' || this.antecedentes.val() === null) {
            alertas('Campo vacio', 'El campo antecedentes esta vacio', 'txtAntecedentes');
            return false;
        }

        if (this.servir.val() === '' || this.servir.val() === null) {
            alertas('Campo vacio', 'El campo desea servir esta vacio', 'txtServir');
            return false;
        }

        return true;
    },
            this.empaquetarJSON = function () {
                let datos = {
                    op: this.op,
                    idcandidato: testeaNULL(this.idcandidato.val()),
                    idmiembro: testeaNULL(this.idmiembro.val()),
                    cualidades: testeaNULL(this.cualidades.val()),
                    actitudes: testeaNULL(this.actitudes.val()),
                    antecedentes: testeaNULL(this.antecedentes.val()),
                    fecha: testeaNULL(this.fecha.val()),
                    servir: testeaNULL(this.servir.val())
                }
                return datos;
            },
            this.limpiarCampos = function () {
                this.idcandidato.val("");
                this.candinombre.val("");
                this.idmiembro.val("");
                this.cualidades.val("");
                this.actitudes.val("");
                this.antecedentes.val("");
                this.fecha.val("");
                this.servir.val("");
            }
}

class Visor {
    constructor(miembro, cualidades, actitudes, antecedentes, fecha, servir) {
        this.miembro = miembro;
        this.cualidades = cualidades;
        this.actitudes = actitudes;
        this.antecedentes = antecedentes;
        this.fecha = fecha;
        this.servir = servir;
    }
    limpiarVisor() {
        this.miembro.text("");
        this.cualidades.text("");
        this.actitudes.text("");
        this.antecedentes.text("");
        this.fecha.text("");
        this.servir.text("");
    }
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
