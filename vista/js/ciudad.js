$(document).ready(function () {
  // alert('Probando');
  GrillaCiudad();
  clickGuardar();
  $('#btnMod').hide();
  $('#btnNueva').click(function(){
      limpiar();
      $('#btnGuardar').show();
      $('#btnMod').hide();
  });
  // clickMod();
});

// function armarJSON(banderaOperacion) {
//     datosJSON = {
//         //"cadena": "Juan"
//         op: banderaOperacion,
//         id: $('#id').val(),
//         descripcion: $('#descripcion').val()
//     }
// }

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
    // armarJSON('a');
    datosJSON = {op:'a', id: $('#id').val(), descripcion: $('#descripcion').val()}
    console.log(datosJSON.op+' '+datosJSON.id+' '+datosJSON.descripcion);
    $.ajax({
        url: '../../../validaciones/registroCiudad.php',
        data: datosJSON,
        type: 'POST',
        success: function (resp) {
           $('#tabla_ciudad_body').empty();
          GrillaCiudad();
          limpiar();
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
    ABMciudades('a');
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
  var vid = $('#id').val();
  var vdescri = $('#descripcion').val();
  datos = {"op":"m","id":vid, "descripcion":vdescri};
  // console.log(datos.op+' '+datos.id+' '+datos.descripcion);
  $.ajax({
      url: '../../../validaciones/registroCiudad.php',
      data: datos,
      type: 'POST',
      success: function (resp) {
         $('#tabla_ciudad_body').empty();
        GrillaCiudad();
        limpiar();
        // alert('Exito');
      },
      error: function () {
          alert('Error');
      }
  });
}

function limpiar() {
  $('#id, #descripcion').val("");
}
