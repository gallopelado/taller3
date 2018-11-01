$(function () {
  // cargarTabla();
  listar_persona();
  oculto();
  comboRequisitos();
  datepicker();
});

function oculto() {
  $('.alert, #panelFormularioRegistro, #panelBotones, #panelListaRequisitos, #verReg').hide();
}

function mostrarFormulario() {
  $('#panelFormularioRegistro, #panelBotones, #panelListaRequisitos').fadeIn();
  $('#panelListaPersonas').fadeOut();
}

function ocultarFormulario() {
  $('#panelFormularioRegistro, #panelBotones, #panelListaRequisitos').fadeOut();
  $('#panelListaPersonas').fadeIn();
}

function cargarTabla() {
  __ajax('../../validaciones/persona/mostrarAllPersona.php','')
  .done(function (info) {
    //console.log(info);
    for(i in info) {
      $("#tblPersona")
      .append($('<tr>')
      .append($(`<td>${info[i].id}</td>
        <td>${info[i].nombres} ${info[i].apellidop} ${info[i].apellidom}</td>
        <td>${info[i].ci}</td>
        <td><button type="button" class="btn btn-primary">Ver</button>
        <button type="button" class="btn btn-primary">Asignar</button></td>`)));
    }
  });
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

function listar_persona() {
  var table = $('#tblPersona').DataTable({
    'destroy':true,
    "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
    'ajax': {
      'method': 'POST',
      'url': '../../validaciones/persona/mostrarAllPersona.php'
    },
    'columns': [
      {'data':'id'},
      {'data':'persona'},
      {'data':'ci'},
      {'defaultContent': '<button type="button" class="ver btn btn-primary" onclick="">Ver</button>'+' '+'<button type="button" class="asignar btn btn-primary" onclick="mostrarFormulario()">Asignar</button>'}
    ],
    'language':idioma_spanish
  });
  obtener_data_asignar('#tblPersona', table);
  obtener_data_visor('#tblPersona', table);
}

var obtener_data_asignar = function(tbody, table) {
  $(tbody).on('click', 'button.asignar', function () {
    let data = table.row($(this).parents('tr')).data();
    // console.log(data);
    let idpersona = $('#txtIdPersona').val(data.id),
        persona = $('#txtPersona').val(data.persona),
        ci = $('#txtCi').val(data.ci);
    cargaRequisitos();
    $('#btnGuardar').prop('disabled', false);
    $('#btnModificar').prop('disabled', true);
  });
}

var obtener_data_visor = function(tbody, table) {
  $(tbody).on('click', 'button.ver', function () {
    let data = table.row($(this).parents('tr')).data();
    // console.log(data);
    let persona = $('#lblpersona').text(data.persona),
        cedula = $('#lblcedula').text(data.ci),
        idpersona = data.id;
    $('#verReg').fadeIn();
    $('#panelListaPersonas').fadeOut();
    visorHistorico(idpersona);
    // $('#btnGuardar').prop('disabled', false);
    // $('#btnModificar').prop('disabled', true);
  });
}
function volverMenu(){
  $('#verReg').fadeOut();
  $('#panelListaPersonas').fadeIn();
}

function visorHistorico(id) {
  __ajax('../../validaciones/gestionar_historico_afiliante/mostrarRequisitos.php', {idpersona:id})
  .done(function (info) {
    $('#tbodyVisorRequisito').empty();
    if(info) {
      $('#tblVisorRequisitos').show();
      for(i in info) {
        $('#tblVisorRequisitos')
        .append($('<tr>')
        .append($(`<td>${info[i].idrequisito}</td>
                  <td>${info[i].requisito}</td>
                  <td>${info[i].estado}</td>
                  <td>${info[i].fechacompletado}</td>
                  </tr>`)));
      }
      //recuperar requisito
      // recuperaRequisito();
    } else {
      $('#tblVisorRequisitos').hide();
    }
  });
}

var cargaRequisitos = function() {
  let data = {"idpersona":$('#txtIdPersona').val()};
  __ajax('../../validaciones/gestionar_historico_afiliante/mostrarRequisitos.php', data)
  .done(function (info) {
    $('#tbodyRequisito').empty();
    if(info) {
      $('#panelListaRequisitos').show();
      $('#alertBaja').hide();
      for(i in info) {
        $('#tblRequisitos')
        .append($('<tr>')
        .append($(`<td>${info[i].idrequisito}</td>
                  <td>${info[i].requisito}</td>
                  <td>${info[i].estado}</td>
                  <td>
                  <button type="button" class="btn btn-primary" id="btnRecuperar" onclick="recuperaRequisito(${info[i].idrequisito}, '${info[i].requisito}', '${info[i].estado}', '${info[i].fechacompletado}', '${info[i].modificable}')">Modificar Registro?</button>
                  </td>
                  </tr>`)));
      }
      //recuperar requisito
      // recuperaRequisito();
    } else {
      $('#panelListaRequisitos').hide();
      $('#alertBaja').text('No posee requisitos').show();
      $('#alertBaja').fadeOut(6000);
    }
  });
}

var comboRequisitos = function() {
  __ajax('../../validaciones/requisitos/mostrarRequisitosSinCartas.php', '')
  .done(function (info){
    for(i in info) {
        console.log(info);
      $('#optRequisito')
      .append(`<option value="${info[i].idrequisito}">${info[i].requisito}</option>`);
    }
  });
}

var recuperaRequisito = function(id, requisito, estado, fecha, modificable) {
  $('#btnGuardar').prop('disabled', true);
  $('#btnModificar').prop('disabled', false);
  switch (requisito) {
    case 'CARTA DE BAUTISMO':
      //mostrar mensaje
      break;
    case 'CARTA DE TESTIMONIO':
    //mostrar mensaje
    break;
    case 'CARTA DE TRANSFERENCIA':
    //mostrar mensaje
    break;
    case 'CARTA DE RECOMENDACIÓN':
    //mostrar mensaje
    break;
    default:
    //Codigo
    $('#optRequisito').val(id);
    $('#txtRequisitoAnt').val(id); //obtengo este id
    $('#txtFechaCompletado').val(fecha);
    if(estado === 'SI') {
      $('#rdbCompletadoSi').prop('checked', true);
      $('#rdbCompletadoNo').prop('checked', false);
    } else {
      $('#rdbCompletadoSi').prop('checked', false);
      $('#rdbCompletadoNo').prop('checked', true);
    }
  }
}

var guardar = function(){
  var vestado;
  if($('#rdbCompletadoSi').is(':checked')){
    vestado = $('#rdbCompletadoSi').val();
  } else {
    vestado = $('#rdbCompletadoNo').val();
  }
  var datos = {
    op:'a',
    idpersona: $('#txtIdPersona').val(),
    idrequisito: $('#optRequisito').val(),
    fecha: $('#txtFechaCompletado').val(),
    estado: vestado,
    antidrequisito: 0
  }
  //console.log(datos);
  //limpiarFormulario();
  //Validar formulario
  if(validarFormulario()){
    // Se procede a guardar
    $.ajax({
      url:'../../validaciones/gestionar_historico_afiliante/persistirHistorico.php',
      data:datos,
      type:'POST',
      success: function(res) {
        if(res === '23505'){
          $('#alertReferenciada').text('Ya esta registrado');
          $('#alertReferenciada').show();
          $('#alertReferenciada').fadeOut(5000);
        }else {
          $('#alertReferenciada').text('Registro exitoso');
          $('#alertReferenciada').show();
          $('#alertReferenciada').fadeOut(8000);
          cargaRequisitos(); //Refresca la lista de requisitos
          //cerrar el formulario
        }
      },
      error: function(res) {
        console.log('Error');
      }
    });
  }
  //Cerrar el formulario luego de limpiar
}

var modificar = function() {
  if(validarFormulario()){
    var vestado;
    if($('#rdbCompletadoSi').is(':checked')){
      vestado = $('#rdbCompletadoSi').val();
    } else {
      vestado = $('#rdbCompletadoNo').val();
    }
    let datos = {
      op:'m',
      idpersona: $('#txtIdPersona').val(),
      idrequisito: $('#optRequisito').val(),
      fecha: $('#txtFechaCompletado').val(),
      estado: vestado,
      antidrequisito: $('#txtRequisitoAnt').val()
    }
    __ajax('../../validaciones/gestionar_historico_afiliante/persistirHistorico.php', datos)
    .done(function(res){
      if(res === '23505'){
        $('#alertReferenciada').text('Ya esta registrado');
        $('#alertReferenciada').show();
        $('#alertReferenciada').fadeOut(5000);
      }else {
        $('#alertReferenciada').text('Registro exitoso');
        $('#alertReferenciada').show();
        $('#alertReferenciada').fadeOut(8000);
        cargaRequisitos(); //Refresca la lista de requisitos
        //cerrar el formulario
      }
    })
    .fail(function(res){
      alert('Error ' + res);
    })
    .always(function(res){
      console.log('Completado modificar');
    });
  }
}

$.datepicker.regional['es'] = {
  closeText: 'Cerrar',
  prevText: '<Ant',
  nextText: 'Sig>',
  currentText: 'Hoy',
  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
  dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
  weekHeader: 'Sm',
  dateFormat: 'dd/mm/yy',
  firstDay: 1,
  isRTL: false,
  showMonthAfterYear: false,
  yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);

function datepicker(){
  var todayDate = new Date().getDate();
  $('#txtFechaCompletado').datepicker({
    // locale : 'es',
    // format : 'LL',
    yearRange: "1920:2018",
    currentText: 'Now',
    dateFormat: 'dd-mm-yy',
    minDate : new Date('1920,1-1,1'),
    changeMonth: true,
    changeYear: true,
    maxDate: new Date(new Date().setDate(todayDate))
  });
}

var validarFormulario = function() {
  let requisito = $('#optRequisito').val();
  if(requisito === '' || requisito === null) {
    avisoTexto('Requisito', 'No debe quedar vacio');
    $('#optRequisito').focus();
    return false;
  }
  let fecha = $('#txtFechaCompletado').val();
  if(fecha === '' || fecha === null){
    avisoTexto('Fecha', 'No debe quedar vacio');
    $('#txtFechaCompletado').focus();
    return false;
  }
  return true;
}

function avisoTexto(id,texto) {
  $('#av'+id).text(texto);
  $('#av'+id).fadeIn(3000);
  $('#av'+id).fadeOut(8000);
}


var limpiarFormulario = function() {
  $('#txtIdPersona').val('');
  $('#txtPersona').val('');
  $('#txtCi').val('');
  $('#txtFechaCompletado').val('');
}
let idioma_spanish = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
