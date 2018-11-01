$(function () {
    analizaFecha();
    listar_postulacion();    
    oculto();
});

function oculto() {
    $('.alert, #panelFormularioRegistro, #panelAsignados, #panelBotones, #panelListaRequisitos, #verReg').hide();
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
    $('#panelFormularioRegistro, #panelAsignados,#panelBotones').fadeIn();
    $('#panelListaPersonas').fadeOut();
}

function ocultarFormulario() {
    $('#panelFormularioRegistro, #panelBotones, #panelAsignados').fadeOut();
    $('#panelListaPersonas').fadeIn();
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
function analizaFecha() {
    __ajax("../../validaciones/gestionar_postulacion/controlaFecha.php","")
            .done((res)=>{                
//                console.log(res);
    })
            .fail((res)=>{                
                console.log(res);
    });
}
function listar_busqueda_postulantes() {
    var table = $('#tblPostulante').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/registrar_candidato_comite/mostrarCandidatos.php'
        },
        'columns': [
            {'data': 'idcandidato'},
            {'data': 'miembro'},
            {'data': 'servir'},
            {'defaultContent': '<button type="button" class="seleccionar btn btn-success" data-dismiss="modal" onclick="">Seleccionar</button>'}
        ],
        'language': idioma_spanish
    });
    obtener_data_postulante('#tblPostulante tbody', table);
}

var obtener_data_postulante = function (tbody, table) {
    $(tbody).on('click', 'button.seleccionar', function () {
        let data = table.row($(this).parents('tr')).data();
        $("#txtIdPostulante").val(data.idcandidato);
        $("#txtPostulante").val(data.miembro);
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
            'url': '../../validaciones/registrar_postulacion/mostrarPostulacionGeneral.php'
        },
        'columns': [
            {'data': 'idpostulacion'},
            {'data': 'descripcion'},
            {'data': 'abierto'},
            {'defaultContent': '<button type="button" class="ver btn btn-primary" onclick="">Ver</button>' + ' ' + '<button type="button" class="asignar btn btn-success" onclick="">Asignar Postulantes</button>'}
        ],
        'language': idioma_spanish
    });
    obtener_data_asignar('#tblPostulacion tbody', table);
    obtener_data_visor('#tblPostulacion tbody', table);
}

var obtener_data_asignar = function (tbody, table) {
    $(tbody).on('click', 'button.asignar', function () {
        let data = table.row($(this).parents('tr')).data();
        if (data.abierto === "ABIERTO") {
            $("#tbody_asignados").empty();
            $("#txtIdPostulacion").val(data.idpostulacion);
            $("#txtPostulacion").val(data.descripcion);
            $("#txtVacancia").val(data.cupo);
            $("#txtFinPostu").val(data.finpostu);
            $("#txtIdPostulante, #txtPostulante").val("");
            lista_asignados(data.idpostulacion, "Asignados");
            mostrarFormulario();
        } else {
            $.alert("La postulación esta cerrada. No es posible agregar postulantes");
            $("#tbody_asignados").empty();             
        }
//        $('#btnGuardar').prop('disabled', true);
//        $('#btnModificar').prop('disabled', false);
    });
}

function lista_asignados(id, tabla) {
    let cont = 0;
    $.ajax({
        url: '../../validaciones/gestionar_postulacion/mostrarAsignados.php',
        data: {id: id},
        type: 'POST',
        success: function (res) {
            $("#tbody_asignados, #tbody_visor").empty();
            $.each(res, function (indice, item) {
                $("#tbl"+tabla).append($(`<tr>`).append($(`<td>${item.postulante}</td>
                <td>${item.fecha_agregado}</td>`)));
                ++cont;
            });
            $("#txtContador").val(cont);
        },
        error: function (res) {
            console.log(res);
        }
    });
}

var obtener_data_visor = function (tbody, table) {
    $(tbody).on('click', 'button.ver', function () {
        let data = table.row($(this).parents('tr')).data();
         console.log(data);
        $("#lblpostulacion").text(data.descripcion);
        $("#lblvacancia").text(data.cupo);
        $("#lblfin").text(data.finpostu);
        $("#lblestado").text(data.abierto);
        lista_asignados(data.idpostulacion, "Visor");
        mostrarVisor();
//        $('#btnGuardar').prop('disabled', false);
//        $('#btnModificar').prop('disabled', true);
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
    let gestion = new GestionarPostulacion($("#txtIdPostulacion"), $("#txtPostulacion"), $("#txtVacancia"), $("#txtFinPostu"), $("#txtIdPostulante"), $("#txtPostulante"), $("#txtContador"));        
    // Mensaje de confirmacion
    mensajeConfirmacion(function () {
        if (gestion.validarCampos()) {
//            console.log(gestion.empaquetarJSON("a")); //mostrar lo que se envia al servidor
            let datos = gestion.empaquetarJSON("a");
            __ajax("../../validaciones/gestionar_postulacion/persistir.php", datos)
                    .done((res) => {
                        console.log(res);
                        lista_asignados(gestion.idpostulacion.val(), "Asignados");
//                        res === 'true' ? gestion.limpiarFormulario() : mostrarMensajeError(res);
                        mostrarMensajeError(res);
//                        listar_postulacion();                        
                    })
                    .fail((res) => {
                        console.log(res);
                    });
        }
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
        configuraAlert('Referenciada', 'Ya esta registrado', 10000);
    } else if (respuesta === '10100') {
        configuraAlert('Referenciada', 'No puedes agregar, vacancia llena', 10000);
        $("#txtIdPostulante, #txtPostulante").val("");
    } 
    else if (respuesta === 'true') {
        configuraAlert('Referenciada', 'Exitoso', 10000);
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
class GestionarPostulacion {
    constructor(idpostulacion, postulacion, vacancia, fecha, idpostulante, postulante, cont_postu) {
        this.idpostulacion = idpostulacion;
        this.postulacion = postulacion;
        this.vacancia = vacancia;
        this.fecha = fecha;
        this.idpostulante = idpostulante;
        this.postulante = postulante;
        this.cont_postu = cont_postu;
    }
    limpiarFormulario() {
        this.idpostulacion.val("");
        this.postulacion.val("");
        this.vacancia.val("");
        this.fecha.val("");        
        this.idpostulante.val("");
        this.postulante.val("");
        this.cont_postu.val("");
    }
    empaquetarJSON(opcion) {
        let datos = {
            op: opcion,
            idpostulacion: testeaNULL(this.idpostulacion.val()),
            postulacion: testeaNULL(this.postulacion.val()),
            idpostulante: testeaNULL(this.idpostulante.val()),
            postulante: testeaNULL(this.postulante.val()),
            fecha: testeaNULL(this.fecha.val())
        }
        return datos;
    }
    validarCampos() {
        if (this.idpostulacion.val() === "") {
            alertas('Campo vacio', 'El postulante esta vacio', 'btnBuscarPostulante');
            return false;
        }
        if (this.idpostulante.val() === "") {
            alertas('Campo vacio', 'El postulante esta vacio', 'btnBuscarPostulante');
            return false;
        }
        return true;
    }
}

class Visor {
    constructor(idpostulacion, postulacion, vacancia, fechafin, estado) {
        this.idpostulacion = idpostulacion;
        this.postulacion = postulacion;        
        this.vacancia = vacancia;
        this.fechafin = fechafin;
        this.estado = estado;
    }
    limpiarVisor() {
        this.postulacion.text("");                
        this.vacancia.text("");        
        this.fechafin.text("");
        this.estado.text("");
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