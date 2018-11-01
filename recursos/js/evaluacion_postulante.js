$(function () {
    analizaFecha();
    listar_postulacion();
    oculto();
});

function oculto() {
    $('.alert, #panelFormularioRegistro, #panelAsignados, #panelBotones').hide();
//    $('.alert').hide();
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
//    $('#panelListaPersonas, #panelBotonesCabecera').fadeOut();
//    $('#verReg').fadeIn();
}

function volverMenu() {
//    $('#verReg').fadeOut();
//    $('#panelListaPersonas, #panelBotonesCabecera').fadeIn();
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
    __ajax("../../validaciones/gestionar_postulacion/controlaFecha.php", "")
            .done((res) => {
//                console.log(res);
            })
            .fail((res) => {
                console.log(res);
            });
}
//function listar_busqueda_postulantes() {
//    var table = $('#tblPostulante').DataTable({
//        'destroy': true,
//        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
//        'ajax': {
//            'method': 'POST',
//            'url': '../../validaciones/registrar_candidato_comite/mostrarCandidatos.php'
//        },
//        'columns': [
//            {'data': 'idcandidato'},
//            {'data': 'miembro'},
//            {'data': 'servir'},
//            {'defaultContent': '<button type="button" class="seleccionar btn btn-success" data-dismiss="modal" onclick="">Seleccionar</button>'}
//        ],
//        'language': idioma_spanish
//    });
//    obtener_data_postulante('#tblPostulante tbody', table);
//}

//var obtener_data_postulante = function (tbody, table) {
//    $(tbody).on('click', 'button.seleccionar', function () {
//        let data = table.row($(this).parents('tr')).data();
//        $("#txtIdPostulante").val(data.idcandidato);
//        $("#txtPostulante").val(data.miembro);
//        $('#btnGuardar').prop('disabled', false);
//        $('#btnModificar').prop('disabled', true);
//    });
//}

function listar_postulacion() {
    var table = $('#tblPostulacion').DataTable({
        'destroy': true,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
        'ajax': {
            'method': 'POST',
            'url': '../../validaciones/registrar_postulacion/mostrarPostulacionGeneralCerrada.php'
        },
        'columns': [
            {'data': 'idpostulacion'},
            {'data': 'descripcion'},
            {'data': 'cantidadinscriptos'},
            {'defaultContent': '<button type="button" class="revisar btn btn-primary" onclick="">Revisar</button>'}
        ],
        'language': idioma_spanish
    });
    obtener_data_asignar('#tblPostulacion tbody', table);
//    obtener_data_visor('#tblPostulacion tbody', table);
}

var obtener_data_asignar = function (tbody, table) {
    $(tbody).on('click', 'button.revisar', function () {
        let data = table.row($(this).parents('tr')).data();
//        console.log(data);
        //Asigna valores al campos
        document.getElementById("txtIdPostulacion").value = data.idpostulacion;
        document.getElementById("txtPostulacion").value = data.descripcion;
        document.getElementById("txtFinPostu").value = data.fechafin;
        document.getElementById("txtCupo").value = data.cupo;

        //Examinar los registrados por idpostulacion
        lista_asignados(data.idpostulacion, "Asignados");
        verificaListaGenerada(data.idpostulacion);
        mostrarFormulario(); 
    });
}

function lista_asignados(id, tabla) {
    $.ajax({
        url: '../../validaciones/gestionar_postulacion/mostrarAsignados.php',
        data: {id: id},
        type: 'POST',
        success: function (res) {
            $("#tbody_asignados, #tbody_visor").empty();
//            console.log(res);
            $.each(res, function (indice, item) {
                $("#tbl" + tabla).append($(`<tr>`).append($(`<td>${item.idcandidato}</td><td>${item.postulante}</td>                
                <td><button type="button" class="ver btn btn-success" data-toggle="modal" data-target="#modal_postulante" onclick="verInformacion(${item.idcandidato})">Ver Información</button></td>
                <td><input type="checkbox" name="requisito" value="SI">SI</td>`)));
            });
        },
        error: function (res) {
            console.log(res);
        }
    });
}

function verificaListaGenerada(idpostulacion) {
    __ajax("../../validaciones/evaluacion_postulante/verificaGenerados.php", {idpostulacion: idpostulacion})
            .done((res) => {
                if (res !== 0) {
                    $("#tbody_admitidos").empty();
                    $("#btnGenerar").prop("disabled", true);
                    $("#ListaAdmitidos").show();
                    for (let i in res) {
//                        console.log(res[i]);
                        $("#tblAdmitidos").append($(`<tr>`).append($(`<td>${res[i].candidato}</td>`)));
                    }
                } else {
                    console.log("Esta vacio");
                    $("#ListaAdmitidos").hide();
                    $("#btnGenerar").prop("disabled", false);
                }
            })
            .fail((res) => {
                console.log(res);
            });
}

function verInformacion(idpostulante) {
    __ajax("../../validaciones/registrar_candidato_comite/mostrarCandidatoById.php", {idcandidato: idpostulante})
            .done(function (res) {
                for (let i in res) {
                    document.getElementById("txtCualidades").value = res[i].cualidades;
                    document.getElementById("txtActitudes").value = res[i].actministerial;
                    document.getElementById("txtAntecedentes").value = res[i].antecedentes;
                    document.getElementById("txtServir").value = res[i].servir;
                }
            })
            .fail(function (res) {
                console.log(res);
            })
}

//var obtener_data_visor = function (tbody, table) {
//    $(tbody).on('click', 'button.ver', function () {
//        let data = table.row($(this).parents('tr')).data();
//        console.log(data);
//        $("#lblpostulacion").text(data.descripcion);
//        $("#lblvacancia").text(data.cupo);
//        $("#lblfin").text(data.finpostu);
//        $("#lblestado").text(data.abierto);
//        lista_asignados(data.idpostulacion, "Visor");
//        mostrarVisor();
////        $('#btnGuardar').prop('disabled', false);
////        $('#btnModificar').prop('disabled', true);
//    });
//}

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

function vistaPrevia() {
    var listapersonas = [];
    var clasificados = [];
    var evaluacion,
            jsonCabDet,
            jsonDet,
            cont = 0;
    $("#tbody_asignados tr").each(function (index, elem) {
        listapersonas.push({
            idcandidato: $(this).find('td').eq(0).html(),
            candidato: $(this).find('td').eq(1).html(),
            requisito: $(this).find('td').eq(3).find('input').is(":checked") === true ? "SI" : "NO"
        });
    });

    for (let i in listapersonas) {
        // Solo necesito almacenar los que marcaron SI
        if (listapersonas[i].requisito === "SI") {
            //No debe sobrepasar el cupo
            cont = cont + 1;
            if (cont <= document.getElementById("txtCupo").value) {
                $("#modal_vistaprevia").modal({show: true});
                clasificados.push({
                    idcandidato: listapersonas[i].idcandidato,
                    candidato: listapersonas[i].candidato,
                    requisito: listapersonas[i].requisito
                });
            } else {
                $.confirm({
                    title: "Cupo lleno!",
                    content: "Cantidad permitda " + document.getElementById("txtCupo").value,
                    buttons: {
                        OK: {
                            action: function () {
                                $("#modal_vistaprevia").modal("hide");
                            }
                        }
                    }
                });
                return false;
            }

        }
    }

    evaluacion = {
        "idpostulacion": document.getElementById("txtIdPostulacion").value,
        "detalle": clasificados
    }

    jsonCabDet = JSON.stringify(evaluacion); //Convierte a json
    jsonDet = JSON.stringify(clasificados);
//    console.log(jsonDet);

    //cargar tabla
    for (let i in clasificados) {
        $("#tblPrevio").append($(`<tr>`).append($(`<td>${clasificados[i].idcandidato}</td>
                   <td>${clasificados[i].candidato}</td>                
                 <td>${clasificados[i].requisito}</td>`)));
    }

    return jsonCabDet;
}

function guardar() {
    let admCabDet = vistaPrevia();
    __ajax("../../validaciones/evaluacion_postulante/persistir.php", {"array": admCabDet})
            .done((res) => {
                console.log(res);
                ocultarFormulario();
            })
            .fail((res) => {
                console.log(res);
            });
}

function generar() {
    $("#tbody_previo").empty();
//    console.log(admCabDet);    
    vistaPrevia();
}

function obtenerCabDetalle() {
    var listapersonas = [];
    var evaluacion,
            jsonCabDet;
    $("#tbody_asignados tr").each(function (index, elem) {
        listapersonas.push({
            idcandidato: $(this).find('td').eq(0).html(),
            requisito: $(this).find('td').eq(3).find('input').is(":checked") === true ? "SI" : "NO"
        });
    });

    evaluacion = {
        "idpostulacion": document.getElementById("txtIdPostulacion").value,
        "detalle": listapersonas
    }

    jsonCabDet = JSON.stringify(evaluacion); //Convierte a json

    return jsonCabDet;
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
    } else if (respuesta === 'true') {
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

