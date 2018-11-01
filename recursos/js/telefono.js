$(document).ready(function () {
    Grilla();
    cargarCombo();
    ocultos();
    buscarDescripcion();
  });

  // Expresiones regulares, cosas geniales
  var expRegNombre = /^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ\s]+$/;
  var expRegApellido = /^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ\s]+$/;
  var expRegDireccion = /^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ\s]+$/;
  var expRegEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
  var expRegSweb = /^(http|https|ftp)+\:+\/\/+(www\.|)+[a-z0-9\-\.]+([a-z\.]|)+\.[a-z]{2,4}$/i;
  var expRegTel = /^([0-9]\s*)*$/;

  function Grilla() {
      $.ajax({
          url: '../../validaciones/telefono/mostrarTelefono.php',
          data: 1,
          type: 'POST',
          success: function (resp) {
              $.each(resp, function (indice, item) {
                  $("#tblNac").append($('<tr>').append($('<td>' + item.id + '</td>' +
                          '<td>' +item.tipo+'</td>'+'<td>' +'<p class="text-success">'+ item.telefono +'</p>'+ '</td>'+
                          '<td>' + item.nombre +" "+item.apellidop+" "+item.apellidom+'</td>'+
                          '<td>'+' '+'<button type="button" class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#myModal" onclick="modificar('+item.id+","+"'"+
                          item.tipo+"'"+','+"'"+ item.telefono+"'"+','+"'"+ item.idpersona+"'"+')">Modificar</button>'+' '+'<button type="button" class="btn btn-outline btn-danger btn-sm" onclick="eliminar('+item.id+')">Eliminar</button></td>'
                        )));
              });
          },
          error: function () {
              alert('No se pudo obtener ultimo valor en la tabla...!!!');
          }
      });
  }

  function cargarCombo() {
    comboTipotelefono();
    comboPersona();
  }

  function comboTipotelefono() {
    $.ajax({
      url: '../../validaciones/enums/mostrarEnum.php',
      data: {entidad:'tipotelefono'},
      type: 'POST',
      success: function (resp) {
          $.each(resp, function (indice, item) {
            $("#tipotelefono").append("<option value= \"" + item.descripcion + "\"> " + item.descripcion + "</option>");
          });
      },
      error: function () {
          alert('No se pudo obtener ultimo valor...!!!');
      }
    });
  }

  function comboPersona() {
    $.ajax({
      url: '../../validaciones/persona/comboPersona.php',
      data: 1,
      type: 'POST',
      success: function (resp) {
          $.each(resp, function (indice, item) {
            $("#persona").append("<option value= \"" + item.id + "\"> " + item.nombres+" "+item.apellidop+" "+item.apellidom+ "</option>");
          });
      },
      error: function () {
          alert('No se pudo obtener ultimo valor...!!!');
      }
    });
  }

  function Guardar() {
    datosJSON = { op            :'a',
                  id            :0,
                  telefono      :$('#telefono').val().trim(),
                  tipo          :$('#tipotelefono').val(),
                  idpersona     :$('#persona').val()
                };
    $.ajax({
        url: '../../validaciones/telefono/registroTelefono.php',
        data: datosJSON,
        type: 'POST',
        success: function (resp) {
          if(resp == 'exito') {
            $('#tabla_body').empty();
            Grilla();
            limpiar();
            alertaExito();
          }else {
            alert('Error');
          }
        },
        error: function () {
            alert('Error');
        }
    });
  }

  function clickGuardar() {
    if(camposValidar()){
      Guardar();
      limpiar();
      $('#myModal').modal('hide');
    }
  }

  function modificar(id, tipo, numero, idpersona) {
    $('#id').val(id);
    $('#telefono').val(numero);
    $('#tipotelefono').val(tipo);
    $('#persona').val(idpersona);

    $('#btnGuardar').hide();
    $('#btnMod').show();
  }

  function clickMod() {
    if(camposValidar()){
      datosJSON = { op            :'m',
                    id            :$('#id').val(),
                    telefono      :$('#telefono').val().trim(),
                    tipo          :$('#tipotelefono').val(),
                    idpersona     :$('#persona').val()
                  };
      $.ajax({
          url: '../../validaciones/telefono/registroTelefono.php',
          data: datosJSON,
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

  function eliminar(idtel) {
    datosJSON = { op            :'b',
                  id            :idtel,
                  telefono      :'321',
                  tipo          :'FAX',
                  idpersona     :'32165'
                };
    $.ajax({
        url: '../../validaciones/telefono/registroTelefono.php',
        data: datosJSON,
        type: 'POST',
        success: function (resp) {
          if(resp == 'exito'){
            $('#tabla_body').empty();
            Grilla();
            limpiar();
            alertaBaja();
          }else{
            alertaReferencia();
            // alert('Error');
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
       /*  $('#descripcion').focus();
        $('#descripcion').css('border-color',''); */
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
    $('#id, #telefono').val('');
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

  function alertaDinamico(texto) {
    $('#alertReferenciada').text(texto);
    $('#alertReferenciada').fadeIn(3000);
    $('#alertReferenciada').fadeOut(8000);
  }
  function avisoTexto(id,texto) {
    $('#av'+id).text(texto);
    $('#av'+id).fadeIn(3000);
    $('#av'+id).fadeOut(8000);
  }

  function camposValidar() {
    var nombre = $('#telefono').val();
    if(nombre.trim() == ''){
      avisoTexto('Telefono', 'El campo telefono no debe quedar vacio');
      $('#telefono').focus();
      return false;
    }
    return true;
  }

  function buscarDescripcion() {
    $('#buscar').keyup(function () {
      datos = {descripcion:$('#buscar').val()};
      $('#cargando').show();
      $.ajax({
          url: '../../validaciones/telefono/buscarTelefono.php',
          data: datos,
          type: 'POST',
          success: function (resp) {
             // data-dismiss="modal"
             // $("#tblBusqueda")
             $('#tabla_buscar_body').empty();
             $.each(resp, function (indice, item) {
               $("#tblBusqueda").append($('<tr>').append($('<td>' + item.id + '</td>' +
                       '<td>' +item.tipo+'</td>'+'<td>' +'<p class="text-success">'+ item.telefono +'</p>'+ '</td>'+
                       '<td>' + item.nombre +" "+item.apellidop+" "+item.apellidom+'</td>'+
                       '<td>'+' '+'<button type="button" class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#myModal" onclick="modificar('+item.id+","+"'"+
                       item.tipo+"'"+','+"'"+ item.telefono+"'"+','+"'"+ item.idpersona+"'"+')" data-dismiss="modal">Modificar</button>'+' '+'<button type="button" class="btn btn-outline btn-danger btn-sm" onclick="eliminar('+item.id+')" data-dismiss="modal">Eliminar</button></td>'
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
