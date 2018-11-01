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
          url: '../../validaciones/sede/mostrarSede.php',
          data: 1,
          type: 'POST',
          success: function (resp) {
              // alert(json_ciudad);
              $.each(resp, function (indice, item) {
                  $("#tblNac").append($('<tr>').append($('<td>' + item.id + '</td>' +
                          '<td>' + item.nombre + '</td>'+'<td>' + item.ciudad + '</td>'+
                          '<td><button type="button" class="btn btn-outline btn-primary btn-sm" onclick="verRegistro('+"'"+
                          item.nombre+"'"+','+"'"+ item.ruc+"'"+','+"'"+ item.capacidad+"'"+','+"'"+ item.telefono1+"'"+','+"'"+
                          item.telefono2+"'"+','+"'"+item.email+"'"+','+"'"+ item.pagweb+"'"+','+"'" +item.fanpage+"'"+','+"'"+
                          item.latitud+"'"+','+"'"+ item.longitud+"'"+','+"'"+ item.ciudad+"'"+','+"'" +item.barrio+"'"+','+"'" +
                          item.calle+"'"+')">Ver</button>'+' '+'<button type="button" class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#myModal" onclick="modificar('+item.id+",'"+
                          item.nombre+"'"+','+"'"+ item.ruc+"'"+','+"'"+ item.capacidad+"'"+','+"'"+ item.telefono1+"'"+','+"'"+
                          item.telefono2+"'"+','+"'"+item.email+"'"+','+"'"+ item.pagweb+"'"+','+"'" +item.fanpage+"'"+','+
                          item.latitud+','+ item.longitud+','+ item.idciudad+',' +item.idbarrio+','+
                          item.idcalle+')">Modificar</button>'+' '+'<button type="button" class="btn btn-outline btn-danger btn-sm" onclick="eliminar('+item.id+')">Eliminar</button></td>'
                        )));
              });
          },
          error: function () {
              alert('No se pudo obtener ultimo valor en la tabla...!!!');
          }
      });
  }

  function verRegistro(nombre, ruc, capacidad, telefono1, telefono2, email, pagweb, fanpage, latitud, longitud, ciudad, barrio, calle) {
    $('#panelCentral, #tablaResultados').hide();
    $('#verReg').show();

    $('#lblnombre').text(nombre);
    $('#lblruc').text(ruc);
    $('#lblcapacidad').text(capacidad);
    $('#lbltel01').text(telefono1);
    $('#lbltel02').text(telefono2);
    $('#lblemail').text(email);
    $('#lblpagweb').text(pagweb);
    $('#lblfpage').text(fanpage);
    $('#lbllatitud').text(latitud);
    $('#lbllongitud').text(longitud);
    $('#lblciudad').text(ciudad);
    $('#lblbarrio').text(barrio);
    $('#lblcalle').text(calle);
  }

  function volverMenu() {
    $('#verReg').hide();
    $('#panelCentral, #tablaResultados').show();
  }

  function cargarCombo() {
    comboCiudad();
    comboBarrio();
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

  function comboBarrio() {
    $.ajax({
      url: '../../validaciones/barrios/comboBarrio.php',
      data: 1,
      type: 'POST',
      success: function (resp) {
          $.each(resp, function (indice, item) {
            $("#cbobarrio").append("<option value= \"" + item.id + "\"> " + item.barrio + "</option>");
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
    datosJSON = { op          :'a',
                  id          :0,
                  nombre      :$('#nombre').val().trim(),
                  ruc         :$('#ruc').val().trim(),
                  capacidad   :$('#capacidad').val(),
                  telefono1   :$('#tel01').val().trim(),
                  telefono2   :$('#tel02').val().trim(),
                  email       :$('#email').val().trim(),
                  pagweb      :$('#paweb').val().trim(),
                  fanpage     :$('#fpage').val().trim(),
                  latitud     :$('#latitud').val(),
                  longitud    :$('#longitud').val(),
                  cbociudad   :$('#cbociudad').val(),
                  cbobarrio   :$('#cbobarrio').val(),
                  cbocalle   :$('#cbocalle').val()
                };
    $.ajax({
        url: '../../validaciones/sede/registroSede.php',
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

  function modificar(id, nombre, ruc, capacidad, telefono1, telefono2, email, pagweb, fanpage, latitud, longitud, idciudad, idbarrio, idcalle) {
    $('#id').val(id);
    $('#nombre').val(nombre);
    $('#ruc').val(ruc);
    $('#capacidad').val(capacidad);
    $('#tel01').val(telefono1);
    $('#tel02').val(telefono2=='null'?'':telefono2);
    $('#email').val(email=='null'?'':email);
    $('#paweb').val(pagweb=='null'?'':pagweb);
    $('#fpage').val(fanpage=='null'?'':fanpage);
    $('#latitud').val(latitud);
    $('#longitud').val(longitud);
    $('#cbociudad').val(idciudad);
    $('#cbobarrio').val(idbarrio);
    $('#cbocalle').val(idcalle);

    $('#btnGuardar').hide();
    $('#btnMod').show();
  }

  function clickMod() {
    if(camposValidar()){
      datosJSON = { op          :'m',
                    id          :$('#id').val(),
                    nombre      :$('#nombre').val().trim(),
                    ruc         :$('#ruc').val().trim(),
                    capacidad   :$('#capacidad').val(),
                    telefono1   :$('#tel01').val().trim(),
                    telefono2   :$('#tel02').val().trim(),
                    email       :$('#email').val().trim(),
                    pagweb      :$('#paweb').val().trim(),
                    fanpage     :$('#fpage').val().trim(),
                    latitud     :$('#latitud').val(),
                    longitud    :$('#longitud').val(),
                    cbociudad   :$('#cbociudad').val(),
                    cbobarrio   :$('#cbobarrio').val(),
                    cbocalle   :$('#cbocalle').val()
                  };
      $.ajax({
          url: '../../validaciones/sede/registroSede.php',
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

  function eliminar(id) {
    datosJSON = { op          :'b',
                  id          :id,
                  nombre      :"asd",
                  ruc         :"asd",
                  capacidad   :2,
                  telefono1   :"asd",
                  telefono2   :"asd",
                  email       :"asd",
                  pagweb      :"asd",
                  fanpage     :"asd",
                  latitud     :33,
                  longitud    :33,
                  cbociudad   :1,
                  cbobarrio   :1,
                  cbocalle    :1
                };
    $.ajax({
        url: '../../validaciones/sede/registroSede.php',
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
    }

    var ruc = $('#ruc').val();
    if(ruc.trim() == ''){
      avisoTexto('Ruc', 'El campo ruc no debe quedar vacio');
      $('#ruc').focus();
      return false;
    }else if(ruc.length < 5){
      avisoTexto('Ruc', 'El campo ruc debe tener mas de 5 caracteres');
      $('#ruc').focus();
      return false;
    }

    var capacidad = $('#capacidad').val();
    if(capacidad.trim() == ''){
      avisoTexto('Capacidad', 'El campo capacidad no debe quedar vacio');
      $('#capacidad').focus();
      return false;
    }

    var telefono1 = $('#tel01').val();
    if(telefono1.trim() == ''){
      avisoTexto('Telefono1', 'El campo Telefono1 no debe quedar vacio');
      $('#tel01').focus();
      return false;
    }

    var email = $('#email').val();
    if(email.trim() == ''){
      return true;
    }else if(!expRegEmail.exec(email)) {
      avisoTexto('Email', 'El campo email no es correcto');
      $('#email').focus();
      return false;
    }

    var paweb = $('#paweb').val();
    if(paweb.trim() == ''){
      return true;
    }else if(!expRegSweb.exec(paweb)){
      avisoTexto('Pagweb', 'El campo web no es correcto, recuerde http://www.ejemplo.com');
      $('#paweb').focus();
      return false;
    }

    var fanpage = $('#fpage').val();
    if(fanpage.trim() == ''){
      return true;
    }else if(!expRegSweb.exec(fanpage)){
      avisoTexto('Fanpage', 'El campo Fan page no es correcto, recuerde http://www.ejemplo.com');
      $('#paweb').focus();
      return false;
    }

    return true;
  }

  //No permite escribir letras con onkeypress.
  function validarNumericos(e) {
    var key = e.keyCode || e.which;
    var teclado = String.fromCharCode(key);
    var numero = "0123456789";
    var especiales = "8-37-38-46";
    teclado_especial = false;
    for (var i in especiales) {
      if (key == especiales[i]) {
        teclado_especial = true;
      }
      if (numero.indexOf(teclado) == -1 && !teclado_especial) {
        return false;
      }
    }
  }

  function buscarDescripcion() {
    $('#buscar').keyup(function () {
      datos = {descripcion:$('#buscar').val()};
      $('#cargando').show();
      $.ajax({
          url: '../../validaciones/sede/buscarSede.php',
          data: datos,
          type: 'POST',
          success: function (resp) {
             // alert(resp);
             $('#tabla_buscar_body').empty();
             $.each(resp, function (indice, item) {
              $("#tblBusqueda").append($('<tr>').append($('<td>' + item.id + '</td>' +
                      '<td>' + item.nombre + '</td>'+'<td>' + item.ciudad + '</td>'+
                      '<td><button type="button" class="btn btn-outline btn-primary btn-sm" onclick="verRegistro('+"'"+
                      item.nombre+"'"+','+"'"+ item.ruc+"'"+','+"'"+ item.capacidad+"'"+','+"'"+ item.telefono1+"'"+','+"'"+
                      item.telefono2+"'"+','+"'"+item.email+"'"+','+"'"+ item.pagweb+"'"+','+"'" +item.fanpage+"'"+','+"'"+
                      item.latitud+"'"+','+"'"+ item.longitud+"'"+','+"'"+ item.ciudad+"'"+','+"'" +item.barrio+"'"+','+"'" +
                      item.calle+"'"+')" data-dismiss="modal">Ver</button>'+' '+'<button type="button" class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#myModal" onclick="modificar('+item.id+",'"+
                      item.nombre+"'"+','+"'"+ item.ruc+"'"+','+"'"+ item.capacidad+"'"+','+"'"+ item.telefono1+"'"+','+"'"+
                      item.telefono2+"'"+','+"'"+item.email+"'"+','+"'"+ item.pagweb+"'"+','+"'" +item.fanpage+"'"+','+
                      item.latitud+','+ item.longitud+','+ item.idciudad+',' +item.idbarrio+','+
                      item.idcalle+')" data-dismiss="modal">Modificar</button>'+' '+'<button type="button" class="btn btn-outline btn-danger btn-sm" onclick="eliminar('+item.id+')" data-dismiss="modal">Eliminar</button></td>'
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
