$(function () {
  listar_persona();
  oculto();
  comboTipoDocumento();
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
    let idpersona = $('#txtIdPersona').val(data.id),
        persona = $('#txtPersona').val(data.persona),
        ci = $('#txtCi').val(data.ci);
    cargaDocumentos();
    limpiarFormulario();
    $('#optTipoDocumento').prop('disabled', false);//Habilita el comboTipoDocumento
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
  __ajax('../../validaciones/registrar_documentos/mostrarDocumentos.php', {idpersona:id})
  .done(function (info) {
    $('#tbodyVisorRequisito').empty();
    if(info) {      
      $('#tblVisorRequisitos').show();
      for(i in info) {
        $('#tblVisorRequisitos')
        .append($('<tr>')
        .append($(`<td>${info[i].idtipodocumento}</td>
                  <td>${info[i].descritipo}</td>
                  <td>${info[i].fechacreacion}</td>
                  <td>${info[i].obs}</td>
                  </tr>`)));
      }
      //recuperar requisito
      // recuperaRequisito();
    } else {
      $('#tblVisorRequisitos').hide();
    }
  });
}

var cargaDocumentos = function() {
  let data = {"idpersona":$('#txtIdPersona').val()};
  __ajax('../../validaciones/registrar_documentos/mostrarDocumentos.php', data)
  .done(function (info) {
    $('#tbodyDocumentos').empty();
    if(info) {
      $('#panelListaRequisitos').show();
      for(i in info) {
        $('#tblDocumentos')
        .append($('<tr>')
        .append($(`<td>${info[i].idtipodocumento}</td>
                  <td>${info[i].descritipo}</td>
                  <td>${info[i].fechacreacion}</td>
                  <td>
                  <button type="button" class="btn btn-primary" id="btnRecuperar" onclick="recuperaDocumento(${info[i].idtipodocumento}, '${info[i].obs}',${info[i].iddocumento} )">Modificar Registro?</button>
                  </td>
                  </tr>`)));
      }
      //recuperar requisito
      // recuperaRequisito();
    } else {
      // Muestra un mensaje de las personas que no tienen documentos
      $('#panelListaRequisitos').hide();
      $('#alertBaja').text('No posee documentos registrados').show();
      $('#alertBaja').fadeOut(6000);
    }
  });
}

var comboTipoDocumento = function() {
  __ajax('../../validaciones/tipo_documento/mostrarTodos.php', '')
  .done(function (info){
    for(i in info) {
      $('#optTipoDocumento')
      .append(`<option value="${info[i].idtipodocumento}">${info[i].descripcion}</option>`);
    }
  })
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
    let datos = {
      op:'a',
      id:$('#txtId').val()==''?null:$('#txtId').val(),
      idpersona: $('#txtIdPersona').val(),
      idtipodocumento: $('#optTipoDocumento').val(),
      observacion: $('#txtObs').val()
    }
    // console.log(datos);
    //limpiarFormulario();
    //Validar formulario
    if(validarFormulario()){
      // Se procede a guardar
      $.ajax({
        url:'../../validaciones/registrar_documentos/persistirDocumento.php',
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
            cargaDocumentos(); //Refresca la lista de documentos
            //cerrar el formulario
          }
        },
        error: function(res) {
          console.log('Error');
        }
      });
    }
    limpiarFormulario();
  } else {
    alert('Usted ha cancelado');
  }
}

var modificar = function() {
  //Mensaje de confirmacion
  var result = confirm('Desea modificar');
  if(result == true) {
    if(validarFormulario()){
      var datos = {
        op:'m',
        id:$('#txtId').val()==''?null:$('#txtId').val(),
        idpersona: $('#txtIdPersona').val(),
        idtipodocumento: $('#optTipoDocumento').val(),
        observacion: $('#txtObs').val()
      }
      console.log(datos);
      __ajax('../../validaciones/registrar_documentos/persistirDocumento.php', datos)
      .done(function(res){
        if(res === '23505'){
          $('#alertReferenciada').text('Ya esta registrado');
          $('#alertReferenciada').show();
          $('#alertReferenciada').fadeOut(5000);
        }else {
          $('#alertReferenciada').text('Registro exitoso');
          $('#alertReferenciada').show();
          $('#alertReferenciada').fadeOut(8000);
          cargaDocumentos(); //Refresca la lista de requisitos
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
  let tipoDocumento = $('#optTipoDocumento').val();
  if(tipoDocumento === '' || tipoDocumento === null) {
    avisoTexto('TipoDocumento', 'No debe quedar vacio');
    $('#optTipoDocumento').focus();
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
  $('#txtObs').val('');
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
