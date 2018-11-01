$(document).ready(function () {
    Grilla();
    cargarCombo();
    ocultos();
    buscarDescripcion();
  });

  function Grilla() {
      $.ajax({
          url: '../../validaciones/barrios/mostrarBarrio.php',
          data: 1,
          type: 'POST',
          success: function (resp) {
              // alert(json_ciudad);
              $.each(resp, function (indice, item) {
                  $("#tblNac").append($('<tr>').append($('<td>' + item.id + '</td>' +
                          '<td>' + item.barrio + '</td>'+'<td>' + item.ciudad + '</td>'+
                          '<td><button type="button" class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#myModal" onclick="modificar('+item.id+','+"'"+item.barrio+"'"+', '+"'"+item.idciudad+"'"+')">Modificar</button>'+' '+'<button type="button" class="btn btn-outline btn-danger btn-sm" onclick="eliminar('+item.id+')">Eliminar</button></td>'
                        )));
              });
          },
          error: function () {
              alert('No se pudo obtener ultimo valor en la tabla...!!!');
          }
      });
  }

  function cargarCombo() {
    $.ajax({
        url: '../../validaciones/ciudades/comboCiudad.php',
        data: 1,
        type: 'POST',
        success: function (resp) {
            $.each(resp, function (indice, item) {
              $("#cboCiudad").append("<option value= \"" + item.ciu_cod + "\"> " + item.ciu_descri + "</option>");
            });
        },
        error: function () {
            alert('No se pudo obtener ultimo valor...!!!');
        }
    });
  }

  function Guardar() {
    datosJSON = {op:'a', id: $('#id').val(), descripcion: $('#descripcion').val().trim(), idciudad:$('#cboCiudad').val()};
    $.ajax({
        url: '../../validaciones/barrios/registroBarrio.php',
        data: datosJSON,
        type: 'POST',
        success: function (resp) {
           $('#tabla_body').empty();
          Grilla();
          limpiar();
          alertaExito();
        },
        error: function () {
            alert('Error');
        }
    });
  }

  function clickGuardar() {
    $('#btnGuardar').click(function () {
      // camposValidar();
      if(camposValidar()){
        Guardar();
        limpiar();
        $('#myModal').modal('hide');
      }else {
        alertaVacio();
        $('#descripcion').focus();
        $('#descripcion').css('border-color','red');
      }
    });
  }

  function modificar(id, descripcion, idciudad) {
    $('#id').val(id);
    $('#descripcion').val(descripcion);
    $('#cboCiudad').val(idciudad);
    $('#btnGuardar').hide();
    $('#btnMod').show();
  }

  function clickMod() {
    var vid = $('#id').val().trim();
    var vdescri = $('#descripcion').val().trim();
    var vidciudad = $('#cboCiudad').val();

    if(camposValidar()){
      datos = {"op":"m","id":vid, "descripcion":vdescri, "idciudad": vidciudad};
      $.ajax({
          url: '../../validaciones/barrios/registroBarrio.php',
          data: datos,
          type: 'POST',
          success: function (resp) {
             $('#tabla_body').empty();
            Grilla();
            limpiar();
            alertaExito();
            // alert('Exito');
          },
          error: function () {
              alert('Error');
          }
      });
      $('#myModal').modal('hide');
    }else {
      alertaVacio();
      $('#descripcion').focus();
      $('#descripcion').css('border-color','red');
    }

  }

  function eliminar(id) {
    datosJSON = { op:'b', id:id, descripcion:'eliminar', idciudad:null};
    $.ajax({
        url: '../../validaciones/barrios/registroBarrio.php',
        data: datosJSON,
        type: 'POST',
        success: function (resp) {
          if(resp == 'exito'){
            $('#tabla_body').empty();
            Grilla();
            limpiar();
            alertaBaja();
          }else if(resp == '23503') {
            alertaReferencia();
          }
        },
        error: function () {
            alert('Error');
        }
    });
  }

  function ocultos() {
    $('#btnMod, #divid, #alertExito, #alertBaja, #cargando, #alertVacio, #alertReferenciada').hide();
  }

  function nuevo() {
    $('#btnNueva').click(function(){
        limpiar();
        $('#descripcion').focus();
        $('#descripcion').css('border-color','');
        $('#btnGuardar').show();
        $('#btnMod').hide();
    });
  }

  function limpiarCampoModal() {
    $('#btnModalBuscar').click(function () {
      $('#buscar').val('');
    });
  }

  function limpiar() {
    $('#id, #descripcion').val("");
  }

  function alertaExito() {
    $('#alertExito').fadeIn(3000);
    $('#alertExito').fadeOut(8000);
  }

  function alertaBaja() {
    $('#alertBaja').fadeIn(3000);
    $('#alertBaja').fadeOut(8000);
  }

  function alertaVacio() {
    $('#alertVacio').fadeIn(3000);
    $('#alertVacio').fadeOut(8000);
  }

  function alertaReferencia() {
    $('#alertReferenciada').fadeIn(3000);
    $('#alertReferenciada').fadeOut(8000);
  }

  function camposValidar() {
    if($('#descripcion').val().trim() == ''){
      return false;
    }else{
      var descri = $('#descripcion').val().trim();
      return true;
    }
  }

  function buscarDescripcion() {
    $('#buscar').keyup(function () {
      datos = {descripcion:$('#buscar').val()};
      $('#cargando').show();
      $.ajax({
          url: '../../validaciones/barrios/buscarBarrio.php',
          data: datos,
          type: 'POST',
          success: function (resp) {
             // alert(resp);
             $('#tabla_buscar_body').empty();
             $.each(resp, function (indice, item) {
                 $("#tblBusqueda").append($('<tr>').append($('<td>' + item.id + '</td>' +
                         '<td>' + item.barrio + '</td>'+'<td>' + item.ciudad + '</td>'+
                         '<td><button type="button" class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#myModal" onclick="modificar('+item.id+','+"'"+item.barrio+"'"+', '+"'"+item.idciudad+"'"+')" data-dismiss="modal">Modificar</button>'+' '+'<button type="button" class="btn btn-outline btn-danger btn-sm" onclick="eliminar('+item.id+')">Eliminar</button></td>'
                       )));
             });
             $('#cargando').show();
             $('#cargando').fadeOut(5000);
          },
          error: function () {
              alert('Error');
          }
      });
    });
  }
