$(function () {
  listar_persona();
  oculto();
  datepicker();
});

function oculto() {
  $('.alert, #panelFormularioRegistro, #panelBotones, #panelListaRequisitos, #verReg').hide();
  // $('.alert').hide();
}

function mostrarFormulario() {
  $('#panelFormularioRegistro, #panelBotones, #panelListaRequisitos').fadeIn();
  $('#panelListaPersonas').fadeOut();
}

function ocultarFormulario() {
  $('#panelFormularioRegistro, #panelBotones, #panelListaRequisitos').fadeOut();
  $('#panelListaPersonas').fadeIn();
  limpiarFormulario();
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

// Manejo de los buscadores
function listar_tutor1_buscador() {
  var table = $('#tbltutor1').DataTable({
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
      {'defaultContent': '<button type="button" class="asignar btn btn-success" onclick="" data-dismiss="modal">Elegir</button>'}
    ],
    'language':idioma_spanish
  });
  seleccionTutor1('#tbltutor1', table);
}

function listar_tutor2_buscador() {
  var table = $('#tbltutor2').DataTable({
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
      {'defaultContent': '<button type="button" class="asignar btn btn-success" onclick="" data-dismiss="modal">Elegir</button>'}
    ],
    'language':idioma_spanish
  });
  seleccionTutor2('#tbltutor2', table);
}

function listar_pastor_buscador() {
  var table = $('#tblPastor').DataTable({
    'destroy':true,
    "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
    'ajax': {
      'method': 'POST',
      'url': '../../validaciones/registrar_fbautismo/mostrarListaPastores.php'
    },
    'columns': [
      {'data':'idpersona'},
      {'data':'persona'},
      {'data':'cedula'},
      {'defaultContent': '<button type="button" class="asignar btn btn-success" onclick="" data-dismiss="modal">Elegir</button>'}
    ],
    'language':idioma_spanish
  });
  seleccionPastor('#tblPastor', table);
}

var seleccionTutor1 = function(tbody, table) {
  $(tbody).on('click', 'button.asignar', function () {
    let data = table.row($(this).parents('tr')).data();
    let idpersona = $('#txtIdTutor1').val(data.id),
        persona = $('#txtTutor1').val(data.persona);
  });
}

var seleccionTutor2 = function(tbody, table) {
  $(tbody).on('click', 'button.asignar', function () {
    let data = table.row($(this).parents('tr')).data();
    let idpersona = $('#txtIdTutor2').val(data.id),
        persona = $('#txtTutor2').val(data.persona);
  });
}

var seleccionPastor = function(tbody, table) {
  $(tbody).on('click', 'button.asignar', function () {
    let data = table.row($(this).parents('tr')).data();
    let idpersona = $('#txtIdPastor').val(data.idpersona),
        persona = $('#txtPastor').val(data.persona);
  });
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
      {'defaultContent': '<button type="button" class="ver btn btn-primary" onclick="">Ver</button>'+' '+
      '<button type="button" class="asignar btn btn-primary" onclick="mostrarFormulario()">Asignar</button>'+' '+
      '<button type="button" class="modificar btn btn-primary" onclick="mostrarFormulario()">Modificar</button>'}
    ],
    'language':idioma_spanish
  });
  obtener_data_asignar('#tblPersona', table);
  obtener_data_visor('#tblPersona', table);
}

var obtener_data_asignar = function(tbody, table) {
  $(tbody).on('click', 'button.asignar', function () {
    let data = table.row($(this).parents('tr')).data();
    let idpersona = $('#txtIdPersona').val(data.id),
        persona = $('#txtPersona').val(data.persona),
        ci = $('#txtCi').val(data.ci);
    // cargaDocumentos();
    // limpiarFormulario();
    // $('#optTipoDocumento').prop('disabled', false);//Habilita el comboTipoDocumento
    $('#btnGuardar').prop('disabled', false);
    $('#btnModificar').prop('disabled', true);
  });
  $(tbody).on('click', 'button.modificar', function () {
    let data = table.row($(this).parents('tr')).data();
    let idpersona = $('#txtIdPersona').val(data.id),
        persona = $('#txtPersona').val(data.persona),
        ci = $('#txtCi').val(data.ci);
        cargaFicha();
        $('#btnGuardar').prop('disabled', true);
        $('#btnModificar').prop('disabled', false);
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
    visorDocumentos(idpersona);
    $('#btnGuardar').prop('disabled', false);
    $('#btnModificar').prop('disabled', true);
  });
}

function volverMenu(){
  $('#verReg').fadeOut();
  $('#panelListaPersonas').fadeIn();
}

function visorDocumentos(id) {
  __ajax('../../validaciones/registrar_fbautismo/mostrarDocumentos.php', {idpersona:id})
  .done(function (info) {
    if(info) {
      $('#lblfecha').text('');
      $('#lbltutor1').text('');
      $('#lbltutor2').text('');
      $('#lblpastor').text('');
      $('#tblVisorRequisitos').show();
      for(i in info) {
        $('#lblfecha').text(info[i].fechabautizo);
        $('#lbltutor1').text(info[i].tutor1);
        $('#lbltutor2').text(info[i].tutor2);
        $('#lblpastor').text(info[i].pastor);
      }
    } else {
      $('#tblVisorRequisitos').hide();
      $('#lblfecha').text('');
      $('#lbltutor1').text('');
      $('#lbltutor2').text('');
      $('#lblpastor').text('');
    }
  });
}

function limpiarFicha() {
  $('#txtId').val('');
  $('#txtFecha').val('');
  $('#txtIdTutor1').val('');
  $('#txtTutor1').val('');
  $('#txtIdTutor2').val('');
  $('#txtTutor2').val('');
  $('#txtIdPastor').val('');
  $('#txtPastor').val('');
}

var cargaFicha = function() {
  let data = {"idpersona":$('#txtIdPersona').val()};
  __ajax('../../validaciones/registrar_fbautismo/mostrarDocumentos.php', data)
  .done(function (info) {
    if(info) {
      $('#panelListaRequisitos').show();
      limpiarFicha();
      for(i in info) {
        $('#txtId').val(info[i].idbautismo);
        $('#txtFecha').val(info[i].fechabautizo);
        $('#txtIdTutor1').val(info[i].idtutor1);
        $('#txtTutor1').val(info[i].tutor1);
        $('#txtIdTutor2').val(info[i].idtutor2);
        $('#txtTutor2').val(info[i].tutor2);
        $('#txtIdPastor').val(info[i].idpastor);
        $('#txtPastor').val(info[i].pastor);
      }
      //recuperar requisito
      // recuperaRequisito();
    } else {
      // Muestra un mensaje de las personas que no tienen documentos
      $('#panelListaRequisitos').show();
      limpiarFicha();
      $('#panelListaRequisitos').hide();
      $('#alertBaja').text('No posee documentos registrados').show();
      $('#alertBaja').fadeOut(6000);
    }
  });
}

var recuperaDocumento = function(id, observacion, iddocumento) {
  $('#btnGuardar').prop('disabled', true);
  $('#btnModificar').prop('disabled', false);
  //Codigo
  $('#txtId').val(iddocumento);
  $('#optTipoDocumento').val(id);
  $('#optTipoDocumento').prop('disabled', true);//Deshabilita comboTipoDocumento
  $('#txtObs').val(observacion);
}

var guardar = function(){
  //Mensaje de confirmacion
  var result = confirm('Desea guardar ?');
  if(result == true) {
    //limpiarFormulario();
    //Validar formulario
    if(validarFormulario()){
      //Recoleccion de datos
      let datos = {
        op:'a',
        idbautismo:$('#txtId').val()==''?null:$('#txtId').val(),
        idpersona: $('#txtIdPersona').val(),
        fechabautismo: $('#txtFecha').val(),
        idtutor1: $('#txtIdTutor1').val()==''?null:$('#txtIdTutor1').val(),
        idtutor2: $('#txtIdTutor2').val()==''?null:$('#txtIdTutor1').val(),
        idpastor: $('#txtIdPastor').val(),
      }
      // Se procede a guardar
      $.ajax({
        url:'../../validaciones/registrar_fbautismo/persistirFichaBautismo.php',
        data:datos,
        type:'POST',
        success: function(res) {
          console.log(res);
          if(res === '23505'){
            $('#alertReferenciada').text('Ya esta registrado');
            $('#alertReferenciada').show();
            $('#alertReferenciada').fadeOut(5000);
          }else if(res === 'P0001'){
            $('#alertReferenciada').text('Ya existe este registro');
            $('#alertReferenciada').show();
            $('#alertReferenciada').fadeOut(5000);
          }else {
            $('#alertReferenciada').text('Registro exitoso');
            $('#alertReferenciada').show();
            $('#alertReferenciada').fadeOut(8000);
            // cargaDocumentos(); //Refresca la lista de documentos
            //cerrar el formulario
          }
        },
        error: function(res) {
          console.log('Error ' + res);
        }
      });
      limpiarFormulario();
    }
  } else { //else del mensaje confirm
    alert('Usted ha cancelado');
  }
}

var modificar = function() {
  //Mensaje de confirmacion
  var result = confirm('Desea modificar');
  if(result == true) {
    if(validarFormulario()){
      //Recoleccion de datos
      let datos = {
        op:'m',
        idbautismo:$('#txtId').val()==''?null:$('#txtId').val(),
        idpersona: $('#txtIdPersona').val(),
        fechabautismo: $('#txtFecha').val(),
        idtutor1: $('#txtIdTutor1').val(),
        idtutor2: $('#txtIdTutor2').val(),
        idpastor: $('#txtIdPastor').val(),
      }
      // console.log(datos);
      __ajax('../../validaciones/registrar_fbautismo/persistirFichaBautismo.php', datos)
      .done(function(res){
        if(res === '23505'){
          $('#alertReferenciada').text('Ya esta registrado');
          $('#alertReferenciada').show();
          $('#alertReferenciada').fadeOut(5000);
        }else if(res === 'P0001'){
          $('#alertReferenciada').text('Ya existe este registro');
          $('#alertReferenciada').show();
          $('#alertReferenciada').fadeOut(5000);
        }else {
          $('#alertReferenciada').text('Registro exitoso');
          $('#alertReferenciada').show();
          $('#alertReferenciada').fadeOut(8000);
          // cargaDocumentos(); //Refresca la lista de documentos
          //cerrar el formulario
        }
      })
      .fail(function(res){
        alert('Error ' + res);
      })
      .always(function(res){
        console.log('Completado modificar');
      });
      limpiarFormulario();
    }
  } else {
    alert('Usted ha cancelado');
  }

}

var validarFormulario = function() {
  let idpersona = $('#txtIdPersona'),
      fechabautismo = $('#txtFecha'),
      idtutor1 = $('#txtIdTutor1'),
      idtutor2 = $('#txtIdTutor2'),
      idpastor = $('#txtIdPastor');

  if(idpersona.val() === '' || idpersona.val() === null) {
    avisoTexto('IdPersona', 'No debe quedar vacio');
    idpersona.focus();
    return false;
  }

  if(fechabautismo.val() === '' || fechabautismo.val() === null) {
    avisoTexto('fechabautismo', 'No debe quedar vacio');
    fechabautismo.focus();
    return false;
  }

  if(idtutor1.val() === '' || idtutor1.val() === null) {
    avisoTexto('idtutor1', 'No debe quedar vacio');
    idtutor1.focus();
    return false;
  }

  if(idtutor2.val() === '' || idtutor2.val() === null) {
    avisoTexto('idtutor2', 'No debe quedar vacio');
    idtutor2.focus();
    return false;
  }

  if(idpastor.val() === '' || idpastor.val() === null) {
    avisoTexto('idpastor', 'No debe quedar vacio');
    idpastor.focus();
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
  let id = $('#txtId').val(''),
      idpersona = $('#txtIdPersona').val(''),
      persona = $('#txtPersona').val(''),
      fechabautismo = $('#txtFecha').val(''),
      idtutor1 = $('#txtIdTutor1').val(''),
      tutor1 = $('#txtTutor1').val(''),
      idtutor2 = $('#txtIdTutor2').val(''),
      tutor2 = $('#txtTutor2').val(''),
      idpastor = $('#txtIdPastor').val(''),
      pastor = $('#txtPastor').val('');
}

//Idioma spanish para el datatable
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

//Manejo del datepicker
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
  $('#txtFecha').datepicker({
    // locale : 'es',
    // format : 'LL',
    yearRange: "1920:2018",
    currentText: 'Now',
    dateFormat: 'dd-mm-yy',
    minDate : new Date('1920,1-1,1'),
    changeMonth: true,
    changeYear: true,
    //maxDate: new Date(new Date().setDate(todayDate))
  });
}
