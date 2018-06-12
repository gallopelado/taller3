$(document).ready(function () {
  // alert('Probando');
  // $('#tblBusqueda').hide();
  GrillaCiudad();
  clickGuardar();
  $('#btnMod, #divid').hide();
  $('#myModal').on('show.bs.modal', function() {
    $(this).find('input[type="text"]').focus();
  });
  $('#btnNueva').click(function(){
      // $('#myModal').modal('show');
      limpiar();
      $('#descripcion').focus();
      $('#descripcion').css('border-color','');
      $('#btnGuardar').show();
      $('#btnMod').hide();
  });
  buscarDescripcion();
  limpiarCampoModal();
  $('#alertExito, #alertBaja, #cargando, #alertVacio').hide();
});

function GrillaCiudad() {
    // armarJSON(1);
    $.ajax({
        url: '../../../validaciones/CiudadCode.php',
        data: 1,
        type: 'POST',
        success: function (json_ciudad) {
            // alert(json_ciudad);
            $.each(json_ciudad, function (indice, ciudad) {
                $("#tblCiudad").append($('<tr>').append($('<td>' + ciudad.ciu_cod + '</td>' +
                        '<td>' + ciudad.ciu_descri + '</td>'+
                        '<td><button type="button" class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#myModal" onclick="modificar('+ciudad.ciu_cod+','+"'"+ciudad.ciu_descri+"'"+')">Modificar</button>'+' '+'<button type="button" class="btn btn-outline btn-danger btn-sm" onclick="eliminar('+ciudad.ciu_cod+')">Eliminar</button></td>'
                      )));
            });
        },
        error: function () {
            alert('No se pudo obtener ultimo valor en la tabla...!!!');
        }
    });
}

// var op = '';
function ABMciudades(op) {
  switch(op) {
    case 'a':
    datosJSON = {op:'a', id: $('#id').val(), descripcion: $('#descripcion').val().trim()}
    console.log(datosJSON.op+' '+datosJSON.id+' '+datosJSON.descripcion);
    $.ajax({
        url: '../../../validaciones/registroCiudad.php',
        data: datosJSON,
        type: 'POST',
        success: function (resp) {
           $('#tabla_ciudad_body').empty();
          GrillaCiudad();
          limpiar();
          alertaExito();
          // alert('Exito');
        },
        error: function () {
            alert('Error');
        }
    });
    break;
  }
}

function clickGuardar() {
  $('#btnGuardar').click(function () {
    // camposValidar();
    if(camposValidar()){
      ABMciudades('a');
      $('#myModal').modal('hide');
      // alert($('#descripcion').val());
      // $('#descripcion').css('border-color','blue');
    }else {
      alertaVacio();
      // alert('Campo descripcion vacio');
      // $('#myModal').modal('hide');
      $('#descripcion').focus();
      $('#descripcion').css('border-color','red');
      // ABMciudades('a');
    }
  });
}

function eliminar(id) {
  datosJSON = { op:'b', id:id, descripcion:'eliminar'};
  // console.log(datosJSON.id +' '+datosJSON.op+' '+datosJSON.descripcion);
  $.ajax({
      url: '../../../validaciones/registroCiudad.php',
      data: datosJSON,
      type: 'POST',
      success: function (resp) {
         $('#tabla_ciudad_body').empty();
        GrillaCiudad();
        limpiar();
        alertaBaja();
        // alert('Exito');
      },
      error: function () {
          alert('Error');
      }
  });
}

function modificar(id, descripcion) {
  $('#id').val(id);
  $('#descripcion').val(descripcion);
  $('#btnGuardar').hide();
  $('#btnMod').show();
  // // console.log(id+' '+descripcion);
}

function clickMod() {
  // alert('Modificar');
  var vid = $('#id').val().trim();
  var vdescri = $('#descripcion').val().trim();

  if(camposValidar()){
    datos = {"op":"m","id":vid, "descripcion":vdescri};
    $.ajax({
        url: '../../../validaciones/registroCiudad.php',
        data: datos,
        type: 'POST',
        success: function (resp) {
           $('#tabla_ciudad_body').empty();
          GrillaCiudad();
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

function limpiar() {
  $('#id, #descripcion').val("");
}

function buscarDescripcion() {
  $('#btnBuscar').click(function () {
    datos = {descripcion:$('#buscar').val()};
    // alert('Palabra ingresada= ' + datos.palabra);
    $.ajax({
        url: '../../../validaciones/buscarCiudad.php',
        data: datos,
        type: 'POST',
        success: function (resp) {
           // alert(resp);
           $('#tabla_buscar_body').empty();
           $.each(resp, function (indice, ciudad) {
               $("#tblBusqueda").append($('<tr>').append($('<td>' + ciudad.ciu_cod + '</td>' +
                       '<td>' + ciudad.ciu_descri + '</td>'+
                       '<td><button type="button" class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#myModal" onclick="modificar('+ciudad.ciu_cod+','+"'"+ciudad.ciu_descri+"'"+')">Modificar</button>'+' '+'<button type="button" class="btn btn-outline btn-danger btn-sm" onclick="eliminar('+ciudad.ciu_cod+')">Eliminar</button></td>'
                     )));
           });
        },
        error: function () {
            alert('Error');
        }
    });
  });
  $('#buscar').keyup(function () {
    datos = {descripcion:$('#buscar').val()};
    $('#cargando').show();
    $.ajax({
        url: '../../../validaciones/buscarCiudad.php',
        data: datos,
        type: 'POST',
        success: function (resp) {
           // alert(resp);
           $('#tabla_buscar_body').empty();
           $.each(resp, function (indice, ciudad) {
               $("#tblBusqueda").append($('<tr>').append($('<td>' + ciudad.ciu_cod + '</td>' +
                       '<td>' + ciudad.ciu_descri + '</td>'+
                       '<td><button type="button" class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#myModal" onclick="modificar('+ciudad.ciu_cod+','+"'"+ciudad.ciu_descri+"'"+')" data-dismiss="modal">Modificar</button>'+' '+'<button type="button" class="btn btn-outline btn-danger btn-sm" onclick="eliminar('+ciudad.ciu_cod+')">Eliminar</button></td>'
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

function limpiarCampoModal() {
  $('#btnModalBuscar').click(function () {
    $('#buscar').val('');
  });
}

function alertaExito() {
  // alert('Operacion exitosa');
  $('#alertExito').fadeIn(3000);
  $('#alertExito').fadeOut(8000);
}
function alertaBaja() {
  // alert('Operacion exitosa');
  $('#alertBaja').fadeIn(3000);
  $('#alertBaja').fadeOut(8000);
}
function alertaVacio() {
  // alert('Operacion exitosa');
  $('#alertVacio').fadeIn(3000);
  $('#alertVacio').fadeOut(8000);
}

function camposValidar() {
  if($('#descripcion').val().trim() == ''){
    return false;
  }else{
    var descri = $('#descripcion').val().trim();
    return true;
  }
}
