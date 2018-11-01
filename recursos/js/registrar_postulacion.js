$(function () {
    listar_postulacion();
    comboCargos();
    oculto();
    datepicker();
});

function oculto() {
    $('.alert, #panelFormularioRegistro, #panelBotones, #panelListaRequisitos, #verReg').hide();
//    $('.alert').hide();
}
function nuevoMiembro() {
    let postu = new Postulacion($("#txtId"), $("#txtIdComite"), $("#txtComite"), $("#txtDescri"), $("#txtVacancia"), $("#optCargo"), $("#txtInicioPostu"), $("#txtFinPostu"));
    postu.limpiarPostulacion();
    let vi = new Visor($("#lbldescripcion"), $("#lblcomite"), $("#lblpuesto"), $("#lblvacancia"), $("#lblinicio"), $("#lblfin"));
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

function comboCargos() {
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

function listar_busqueda_comites() {
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
            {'defaultContent': '<button type="button" class="seleccionar btn btn-success" data-dismiss="modal" onclick="">Seleccionar</button>'}
        ],
        'language': idioma_spanish
    });
    obtener_data_comite('#tblComite tbody', table);
}

var obtener_data_comite = function (tbody, table) {
    $(tbody).on('click', 'button.seleccionar', function () {
        let data = table.row($(this).parents('tr')).data();
        $("#txtIdComite").val(data.id);
        $("#txtComite").val(data.descripcion);
        $('#btnGuardar').prop('disabled', false);
        $('#btnModificar').prop('disabled', true);
    });
}

function listar_postulacion() {
    var table = $('#tblPostulacion').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/registrar_postulacion/mostrarPostulacion.php'
        },
        'columns': [
            {'data': 'idpostulacion'},
            {'data': 'descripcion'},
            {'data': 'iniciopostu'},
            {'data': 'finpostu'},
            {'defaultContent': '<button type="button" class="ver btn btn-primary" onclick="">Ver</button>' + ' ' + '<button type="button" class="anular btn btn-danger" onclick="">Anular</button>'}
        ],
        'language': idioma_spanish
    });
    obtener_data_anular('#tblPostulacion tbody', table);
    obtener_data_visor('#tblPostulacion tbody', table);
}

var obtener_data_anular = function (tbody, table) {
    $(tbody).on('click', 'button.anular', function () {
        let data = table.row($(this).parents('tr')).data();
//         console.log(data);
        anular(data.idpostulacion);
        $('#btnGuardar').prop('disabled', true);
        $('#btnModificar').prop('disabled', false);
    });
}

var obtener_data_visor = function (tbody, table) {
    $(tbody).on('click', 'button.ver', function () {
        let data = table.row($(this).parents('tr')).data();
//         console.log(data);
        // Usando la clase Visor
        let vi = new Visor($("#lbldescripcion"), $("#lblcomite"), $("#lblpuesto"), $("#lblvacancia"), $("#lblinicio"), $("#lblfin"));
        vi.descripcion.text(data.descripcion);
        vi.comite.text(data.ministerio);
        vi.puesto.text(data.cargo);
        vi.vacancia.text(data.cupo);
        vi.fechainicio.text(data.iniciopostu);
        vi.fechafin.text(data.finpostu);
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
    let postu = new Postulacion($("#txtId"), $("#txtIdComite"), $("#txtComite"), $("#txtDescri"), $("#txtVacancia"), $("#optCargo"), $("#txtInicioPostu"), $("#txtFinPostu"));

    // Mensaje de confirmacion
    mensajeConfirmacion(function () {
        if (postu.validarCampos()) {
            let datos = postu.empaquetarJSON("a", null);
            __ajax("../../validaciones/registrar_postulacion/persistir.php", datos)
                    .done((res) => {
                        console.log(res);
                        res === 'true' ? postu.limpiarPostulacion() : mostrarMensajeError(res);
                        mostrarMensajeError(res);
                        listar_postulacion();
                    })
                    .fail((res) => {
                        console.log(res);
                    });
        }
    });
}

function anular(id) {
    mensajeConfirmacion(function () {
        let postu = new Postulacion($("#txtId").val(id), $("#txtIdComite"), $("#txtComite"), $("#txtDescri"), $("#txtVacancia"), $("#optCargo"), $("#txtInicioPostu"), $("#txtFinPostu"));
        console.log(postu.empaquetarJSON("b", null));
        let datos = postu.empaquetarJSON("b", null);
        __ajax("../../validaciones/registrar_postulacion/persistir.php", datos)
                .done((res) => {
//                    console.log(res);
                    mostrarMensajeError(res);
                    listar_postulacion();
                })
                .fail((res) => {
                    console.log(res);
                });
    });
}

function testeaNULL(obj) {
    if (obj !== "") {
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

// Clases
class Postulacion {
    constructor(idpostulacion, idcomite, nombre_comite, descri_postulacion, vacancias, idcargo, iniciopostu, finpostu) {
        this.idpostulacion = idpostulacion;
        this.idcomite = idcomite;
        this.nombre_comite = nombre_comite;
        this.descri_postulacion = descri_postulacion;
        this.vacancias = vacancias;
        this.idcargo = idcargo;
        this.iniciopostu = iniciopostu;
        this.finpostu = finpostu;
    }
    limpiarPostulacion() {
        this.idpostulacion.val("");
        this.idcomite.val("");
        this.nombre_comite.val("");
        this.descri_postulacion.val("");
        this.vacancias.val("");
        this.idcargo.val("");
        this.iniciopostu.val("");
        this.finpostu.val("");
    }
    empaquetarJSON(opcion, estado) {
        let datos = {
            op: opcion,
            idpostulacion: testeaNULL(this.idpostulacion.val()),
            idcomite: testeaNULL(this.idcomite.val()),
            nombre_comite: testeaNULL(this.nombre_comite.val()),
            descri_postulacion: testeaNULL(this.descri_postulacion.val()),
            vacancias: testeaNULL(this.vacancias.val()),
            idcargo: testeaNULL(this.idcargo.val()),
            iniciopostu: testeaNULL(this.iniciopostu.val()),
            finpostu: testeaNULL(this.finpostu.val()),
            estado: estado
        }
        return datos;
    }
    validarCampos() {
        if (this.idcomite.val() === "") {
            alertas('Campo vacio', 'El comite esta vacio', 'btnBuscarComite');
            return false;
        }
        if (this.descri_postulacion.val() === "") {
            alertas('Campo vacio', 'La descripción esta vacio', 'txtDescri');
            return false;
        }
        if (this.vacancias.val() === "") {
            alertas('Campo vacio', 'La vacancia esta vacio', 'txtVacancia');
            return false;
        }
        if (this.idcargo.val() === "") {
            alertas('Campo vacio', 'El cargo esta vacio', 'optCargo');
            return false;
        }
        if (this.iniciopostu.val() === "") {
            alertas('Campo vacio', 'La fecha del inicio de postulacion esta vacio', 'txtInicioPostu');
            return false;
        }
        if (this.finpostu.val() === "") {
            alertas('Campo vacio', 'La fecha del fin de postulacion esta vacio', 'txtFinPostu');
            return false;
        }
        return true;
    }
}

class Visor {
    constructor(descripcion, comite, puesto, vacancia, fechainicio, fechafin) {
        this.descripcion = descripcion;
        this.comite = comite;
        this.puesto = puesto;
        this.vacancia = vacancia;
        this.fechainicio = fechainicio;
        this.fechafin = fechafin;
    }
    limpiarVisor() {
        this.descripcion.text("");
        this.comite.text("");
        this.puesto.text("");
        this.vacancia.text("");
        this.fechainicio.text("");
        this.fechafin.text("");
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

//datepicker


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
    $('#txtInicioPostu, #txtFinPostu').datepicker({
        // locale : 'es',
        // format : 'LL',
        yearRange: "1920:2018",
        currentText: 'Now',
        dateFormat: 'dd-mm-yy',
        minDate: new Date(new Date().setDate(todayDate)),
        //minDate : new Date('1920,1-1,1'),
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        showOn: "button",
        buttonImage: "http://localhost/iec_copia/recursos/dist/images/calendar.gif",
        buttonImageOnly: true,
        buttonText: "Select date"
                //maxDate: new Date(new Date().setDate(todayDate))    
    });
}