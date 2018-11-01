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
          url: '../../validaciones/familias/mostrarFamilia.php',
          data: 1,
          type: 'POST',
          success: function (resp) {
              // alert(json_ciudad);
              $.each(resp, function (indice, item) {
                  $("#tblNac").append($('<tr>').append($('<td>' + item.id + '</td>' +
                          '<td>' + item.nombre + '</td>'+'<td>' + item.ciudad + '</td>'+
                          '<td><button type="button" class="btn btn-outline btn-primary btn-sm" onclick="verRegistro('+"'"+
                          item.nombre+"'"+','+"'"+ item.ciudad+"'"+','+"'"+ item.calle+"'"+','+"'"+ item.codigopostal+"'"+','+"'"+
                          item.telefono+"'"+','+"'"+item.origen+"'"+')">Ver</button>'+' '+'<button type="button" class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#myModal" onclick="modificar('+item.id+","+"'"+
                          item.nombre+"'"+','+"'"+ item.idciudad+"'"+','+"'"+ item.idcalle+"'"+','+"'"+ item.codigopostal+"'"+','+"'"+
                          item.telefono+"'"+','+"'"+item.idorigen+"'"+')">Modificar</button>'+' '+'<button type="button" class="btn btn-outline btn-danger btn-sm" onclick="eliminar('+item.id+')">Eliminar</button></td>'
                        )));
              });
          },
          error: function () {
              alert('No se pudo obtener ultimo valor en la tabla...!!!');
          }
      });
  }

  function verRegistro(nombre, ciudad, calle, codpostal, telefono, origen) {
    $('#panelCentral, #tablaResultados').hide();
    $('#verReg').show();

    $('#lblnombre').text(nombre);
    $('#lblciudad').text(ciudad);
    $('#lblcalle').text(calle);
    $('#lbltelefono').text(telefono);
    $('#lblorigen').text(origen);
    $('#lblpostal').text(codpostal);
  }

  function volverMenu() {
    $('#verReg').hide();
    $('#panelCentral, #tablaResultados').show();
  }

  function cargarCombo() {
    comboCiudad();
    comboOrigen();
    comboCalle();
  }

  function comboCiudad() {
    $.ajax({
      url: '../../validaciones/ciudades/comboCiudad.php',
      data: 1,
      type: 'POST',
      success: function (resp) {
          $.each(resp, function (indice, item) {
            $("#cbociudad").append("<option value= \"" + item.ciu_cod + "\"> " + item.ciu_descri + "</option>");
          });
      },
      error: function () {
          alert('No se pudo obtener ultimo valor...!!!');
      }
    });
  }

  function comboOrigen() {
    $.ajax({
      url: '../../validaciones/ciudades/comboCiudad.php',
      data: 1,
      type: 'POST',
      success: function (resp) {
          $.each(resp, function (indice, item) {
            $("#cboorigen").append("<option value= \"" + item.ciu_cod + "\"> " + item.ciu_descri + "</option>");
          });
      },
      error: function () {
          alert('No se pudo obtener ultimo valor...!!!');
      }
    });
  }

  function comboCalle() {
    $.ajax({
      url: '../../validaciones/calles/comboCalle.php',
      data: 1,
      type: 'POST',
      success: function (resp) {
          $.each(resp, function (indice, item) {
            $("#cbocalle").append("<option value= \"" + item.id + "\"> " + item.calle + "</option>");
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
                  nombre        :$('#nombre').val().trim(),
                  cbodireccion  :$('#cbocalle').val(),
                  cbociudad     :$('#cbociudad').val(),
                  codpostal     :$('#postal').val().trim(),
                  telefono      :$('#telefono').val().trim(),
                  cboorigen     :$('#cboorigen').val()
                };
    $.ajax({
        url: '../../validaciones/familias/registroFamilia.php',
        data: datosJSON,
        type: 'POST',
        success: function (resp) {
          //alert(resp);
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

  function modificar(id, nombre, idciudad, idcalle, codpostal, telefono, origen) {
    $('#id').val(id);
    $('#nombre').val(nombre);
    $('#cbociudad').val(idciudad);
    $('#cbocalle').val(idcalle);
    $('#postal').val(codpostal);
    $('#telefono').val(telefono);
    $('#cboorigen').val(origen);

    $('#btnGuardar').hide();
    $('#btnMod').show();
  }

  function clickMod() {
    if(camposValidar()){
      datosJSON = { op            :'m',
                    id            :$('#id').val(),
                    nombre        :$('#nombre').val().trim(),
                    cbodireccion  :$('#cbocalle').val(),
                    cbociudad     :$('#cbociudad').val(),
                    codpostal     :$('#postal').val().trim(),
                    telefono      :$('#telefono').val().trim(),
                    cboorigen     :$('#cboorigen').val()
                  };
      $.ajax({
          url: '../../validaciones/familias/registroFamilia.php',
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

  function eliminar(idfamilia) {
    datosJSON = { op            :'b',
                  id            :idfamilia,
                  nombre        :"asd",
                  cbodireccion  :1,
                  cbociudad     :1,
                  codpostal     :1,
                  telefono      :"asd",
                  cboorigen     :1
                };
    $.ajax({
        url: '../../validaciones/familias/registroFamilia.php',
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
          }
        },
        error: function () {
            alert('Error');
        }
    });
  }

  function ocultos() {
    $('#btnMod, #divid, #alertExito, #alertBaja, #cargando, #alertVacio, #alertReferenciada, #verReg').hide();
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
    $('#id, #nombre, #ruc, #capacidad, #tel01, #tel02, #email, #paweb, #fpage, #latitud, #longitud').val('');
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
    var nombre = $('#nombre').val();
    if(nombre.trim() == ''){
      avisoTexto('Nombre', 'El campo nombre no debe quedar vacio');
      $('#nombre').focus();
      return false;
    }else if(!expRegNombre.exec(nombre)) {
      avisoTexto('Nombre', 'El campo nombre no acepta numeros');
      $('#nombre').focus();
      return false;
    }
    return true;
  }

  function buscarDescripcion() {
    $('#buscar').keyup(function () {
      datos = {descripcion:$('#buscar').val()};
      $('#cargando').show();
      $.ajax({
          url: '../../validaciones/familias/buscarFamilia.php',
          data: datos,
          type: 'POST',
          success: function (resp) {
             // alert(resp);
             $('#tabla_buscar_body').empty();
             $.each(resp, function (indice, item) {
               $("#tblBusqueda").append($('<tr>').append($('<td>' + item.id + '</td>' +
                       '<td>' + item.nombre + '</td>'+'<td>' + item.ciudad + '</td>'+
                       '<td><button type="button" class="btn btn-outline btn-primary btn-sm" onclick="verRegistro('+"'"+
                       item.nombre+"'"+','+"'"+ item.ciudad+"'"+','+"'"+ item.calle+"'"+','+"'"+ item.codigopostal+"'"+','+"'"+
                       item.telefono+"'"+','+"'"+item.origen+"'"+')" data-dismiss="modal">Ver</button>'+' '+'<button type="button" class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#myModal" onclick="modificar('+item.id+","+"'"+
                       item.nombre+"'"+','+"'"+ item.idciudad+"'"+','+"'"+ item.idcalle+"'"+','+"'"+ item.codigopostal+"'"+','+"'"+
                       item.telefono+"'"+','+"'"+item.idorigen+"'"+')" data-dismiss="modal">Modificar</button>'+' '+'<button type="button" class="btn btn-outline btn-danger btn-sm" onclick="eliminar('+item.id+')" data-dismiss="modal">Eliminar</button></td>'
                     )));
                    // data-dismiss="modal"
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
