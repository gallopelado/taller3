$(document).ready(function () {
    Grilla();
    cargarCombo();
    ocultos();
    datepicker();
    validaEstadoPersonal();
    // buscarDescripcion();
});

// Expresiones regulares, cosas geniales
var expRegNombre = /^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ\s]+$/;
var expRegApellido = /^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ\s]+$/;
var expRegDireccion = /^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ\s]+$/;
var expRegEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
var expRegSweb = /^(http|https|ftp)+\:+\/\/+(www\.|)+[a-z0-9\-\.]+([a-z\.]|)+\.[a-z]{2,4}$/i;
var expRegTel = /^([0-9]\s*)*$/;

/**************************************/
/**** para poner a spanish el calendario**/
$.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);

/***********************************/
function datepicker() {
    var todayDate = new Date().getDate();
    $('#fechanac').datepicker({
        // locale : 'es',
        // format : 'LL',
        yearRange: "1920:2018",
        currentText: 'Now',
        dateFormat: 'dd-mm-yy',
        minDate: new Date('1920,1-1,1'),
        changeMonth: true,
        changeYear: true,
        maxDate: new Date(new Date().setDate(todayDate))
    });
    $('#fsalida').datepicker({
        locale: 'es',
        format: 'LL',
        minDate: new Date('1920,1-1,1'),
        changeMonth: true,
        changeYear: true,
        maxDate: new Date(new Date().setDate(todayDate))
    });
    $("#salida, #fechanac").keypress(function (evt) {
        return false;
    });
}

function Grilla() {
    $.ajax({
        url: '../../validaciones/persona/mostrarPersona.php',
        data: 1,
        type: 'POST',
        success: function (resp) {
            $.each(resp, function (indice, item) {
                $("#tblPersonas").append($('<tr>').append($('<td>' + item.id + '</td>' +
                        '<td>' + item.nombres + ' ' + item.apellidop + ' ' + item.apellidom + '</td>' + '<td>' + item.ci + '</td>' +
                        '<td><button type="button" class="ver btn btn-outline btn-primary btn-sm" onclick="verRegistro(' + item.id + ",'" +
                        item.nombres + " " + item.apellidop + " " + item.apellidom + "'" + ',' + "'" + item.familia + "'" + ',' + "'" +
                        item.relacionfamiliar + "'" + ',' + "'" + item.sexo + "'" + ',' + "'" + item.calle + "'" + ',' + "'" + item.ciudad + "'" + ',' +
                        (item.codigopostal == "" ? null : item.codigopostal) + ',' + "'" + item.barrio + "'" + ',' + "'" + item.estadopersonal + "'" + ',' + "'" + (item.email == '' ? null : item.email) + "'" + ',' +
                        "'" + item.fechanac + "'" + ', ' + "'" + item.lugarnacimiento + "'" + ', ' + "'" + item.ecivil + "'" + ', ' + "'" + item.nacionalidad + "'" + ', ' + item.ci + ', ' + "'" + item.profesion + "'" + ', ' +
                        "'" + (item.lugarestudio == '' ? null : item.lugarestudio) + "'" + ', ' + "'" + (item.puesto == '' ? null : item.puesto) + "'" + ', ' + "'" + (item.tiposangre == '' ? null : item.tiposangre) + "'" + ', ' +
                        "'" + (item.alergia == "" ? null : item.alergia) + "'" + ', ' + "'" + (item.capacidades == '' ? null : item.capacidades) + "'" + ')">Ver</button>' + ' ' + '<button type="button" class="modificar btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#myModal" onclick="recuperadatos(' + item.id + ",'" +
                        item.nombres + "'" + ',' + "'" + item.idfamilia + "'" + ',' + "'" + item.apellidop + "'" + ',' + "'" + item.apellidom + "'" + ',' + "'" +
                        item.relacionfamiliar + "'" + ',' + "'" + item.sexo + "'" + ',' + "'" + item.idcalle + "'" + ',' + "'" + item.idciudad + "'" + ',' +
                        (item.codigopostal == "" ? null : item.codigopostal) + ',' + item.idbarrio + ',' + "'" + item.estadopersonal + "'" + ',' + "'" + (item.email == '' ? null : item.email) + "'" + ',' +
                        "'" + item.fechanac + "'" + ', ' + "'" + item.lugarnacimiento + "'" + ', ' + "'" + item.ecivil + "'" + ', ' + item.idnac + ', ' + item.ci + ', ' + item.idprofesion + ', ' +
                        "'" + (item.lugarestudio == '' ? null : item.lugarestudio) + "'" + ', ' + "'" + (item.puesto == '' ? null : item.puesto) + "'" + ', ' + "'" + (item.tiposangre == '' ? null : item.tiposangre) + "'" + ', ' +
                        "'" + (item.alergia == "" ? null : item.alergia) + "'" + ', ' + "'" + (item.capacidades == '' ? null : item.capacidades) + "'" + ')">Modificar</button></td>'
                        ))).ready(() => {
                    obtenerPrivilegios();
                });
            });
        },
        error: function () {
            alert('No se pudo obtener ultimo valor en la tabla...!!!');
        }
    });
//    obtenerPrivilegios();
}

function verRegistro(id, persona, familia, relacfamiliar,
        sexo, calle, ciudad, codpostal, barrio, estpersonal, email, fechanac, lugarnac,
        ecivil, nacionalidad, ci, profesion, lugarestudio, puesto, tiposangre,
        alergia, capacidades) {
    $('#rowBotones, #rowResultados').hide();
    $('#verReg').show();

    $('#lblpersona').text(persona);
    $('#lblfamilia').text(familia);
    $('#lblrelacionfamiliar').text(relacfamiliar);
    $('#lblsexo').text(sexo);
    $('#lbldireccion').text(calle);
    $('#lblciudad').text(ciudad);
    $('#lblpostal').text(codpostal);
    $('#lblbarrio').text(barrio);
    $('#lblestadopers').text(estpersonal);
    $('#lblemail').text(email);
    $('#lblfechanac').text(fechanac);
    $('#lbllugarnac').text(lugarnac);
    $('#lblecivil').text(ecivil);
    $('#lblnac').text(nacionalidad);
    $('#lblcedula').text(ci);
    $('#lblprofesion').text(profesion);
    $('#lbllugartrabajo').text(lugarestudio);
    $('#lblpuesto').text(puesto);
    $('#lbltipsangre').text(tiposangre);
    $('#lblalergias').text(alergia);
    $('#lblcapacidades').text(capacidades);
    // $('#').text();
    datos = {idpersona: id}
    $.ajax({
        url: '../../validaciones/persona/mostrarFotoPersona.php',
        data: datos,
        type: 'POST',
        success: function (resp) {
            $.each(resp, function (indice, item) {
                // console.log(item.foto);
                if (item.foto !== null) {
                    $('#lblfoto').html('<img src="data:image/jpeg; base64,' + item.foto + '" alt="fotouser" width="250" heigth="250">');
                } else {
                    $('#lblfoto').html('<p class="fa fa-photo">No subiste ninguna foto</p>');
                }
            });
        },
        error: function () {
            alert('Error');
        }
    });
}

function volverMenu() {
    $('#verReg').hide();
    // $('#panelCentral, #tablaResultados').show();
    $('#rowBotones, #rowResultados').show();
    $('#grupoFormulario, #operaciones').hide();
}

function telefonoPersona(id) {
    $.ajax({
        url: '../../validaciones/persona/mostrarPersonaTelefono.php',
        data: {idpersona: id},
        type: 'POST',
        success: function (resp) {
            $('#tbody_telefonos').empty();
            $.each(resp, function (indice, item) {
                $("#telefonos").append($('<tr>').append($('<td>' + item.tipo + '</td>' +
                        '<td>' + item.telefono + '</td></tr>'
                        )));
            });
        },
        error: function () {
            alert('No se pudo obtener ultimo valor en la tabla...!!!');
        }
    });
}

function cargarCombo() {
    comboCiudad();
    comboBarrio();
    comboCalle();
    comboFamilia();
    comboEstadoPersonal();
    comboRelacionFamiliar();
    comboEstadoCivil();
    comboNacionalidad();
    comboProfesion();
}

function comboCiudad() {
    $.ajax({
        url: '../../validaciones/ciudades/comboCiudad.php',
        data: 1,
        type: 'POST',
        success: function (resp) {
            $.each(resp, function (indice, item) {
                $("#ciudad").append("<option value= \"" + item.ciu_cod + "\"> " + item.ciu_descri + "</option>");
            });
        },
        error: function () {
            alert('No se pudo obtener ultimo valor...!!!');
        }
    });
}

function comboNacionalidad() {
    $.ajax({
        url: '../../validaciones/nacionalidad/comboNacionalidad.php',
        data: 1,
        type: 'POST',
        success: function (resp) {
            $.each(resp, function (indice, item) {
                $("#nacionalidad").append("<option value= \"" + item.nac_id + "\"> " + item.nac_descri + "</option>");
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
                $("#barrio").append("<option value= \"" + item.id + "\"> " + item.barrio + "</option>");
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
                $("#direccion").append("<option value= \"" + item.id + "\"> " + item.calle + "</option>");
            });
        },
        error: function () {
            alert('No se pudo obtener ultimo valor...!!!');
        }
    });
}

function comboFamilia() {
    $.ajax({
        url: '../../validaciones/familias/comboFamilia.php',
        data: 1,
        type: 'POST',
        success: function (resp) {
            $.each(resp, function (indice, item) {
                $("#familia").append("<option value= \"" + item.id + "\"> " + item.nombre + "</option>");
            });
        },
        error: function () {
            alert('No se pudo obtener ultimo valor...!!!');
        }
    });
}

function comboEstadoPersonal() {
    datos = {entidad: 'estadopersonal'}
    $.ajax({
        url: '../../validaciones/enums/mostrarEnum.php',
        data: datos,
        type: 'POST',
        success: function (resp) {
            $.each(resp, function (indice, item) {
                $("#estadopersonal").append("<option value= \"" + item.descripcion + "\"> " + item.descripcion + "</option>");
            });
        },
        error: function () {
            alert('No se pudo obtener ultimo valor...!!!');
        }
    });
}

function comboRelacionFamiliar() {
    datos = {entidad: 'relacionfamiliar'}
    $.ajax({
        url: '../../validaciones/enums/mostrarEnum.php',
        data: datos,
        type: 'POST',
        success: function (resp) {
            $.each(resp, function (indice, item) {
                $("#relacionfamiliar").append("<option value= \"" + item.descripcion + "\"> " + item.descripcion + "</option>");
            });
        },
        error: function () {
            alert('No se pudo obtener ultimo valor...!!!');
        }
    });
}

function comboEstadoCivil() {
    datos = {entidad: 'estadocivil'}
    $.ajax({
        url: '../../validaciones/enums/mostrarEnum.php',
        data: datos,
        type: 'POST',
        success: function (resp) {
            $.each(resp, function (indice, item) {
                $("#estadocivil").append("<option value= \"" + item.descripcion + "\"> " + item.descripcion + "</option>");
            });
        },
        error: function () {
            alert('No se pudo obtener ultimo valor...!!!');
        }
    });
}

function comboProfesion() {
    $.ajax({
        url: '../../validaciones/profesion/comboProfesion.php',
        data: 1,
        type: 'POST',
        success: function (resp) {
            $.each(resp, function (indice, item) {
                $("#profesion").append("<option value= \"" + item.id + "\"> " + item.profesion + "</option>");
            });
        },
        error: function () {
            alert('No se pudo obtener ultimo valor...!!!');
        }
    });
}

function validaEstadoPersonal() {
    $('#estadopersonal').click(function () {
        var estadopersonal = $('#estadopersonal').val();
        if (estadopersonal !== 'NO-CONGREGA') {
            //no mostrar campos
            $('#divestadopersonal').fadeOut(1000);
        } else {
            //mostrar campos
            $('#divestadopersonal').fadeIn(2000);
        }
    });
}

// Esta funcion guarda los datos
function Guardar() {
    // Colectar datos del formulario
    var op = 'a';
    //Seccion 1
    var vid = $('#id').val();
    var vnombres = $('#nombres').val();
    var vapepaterno = $('#apellidoPaterno').val();
    var vapematerno = $('#apellidoMaterno').val();
    var vfamilia = $('#familia').val();
    var vrelacionfamiliar = $('#relacionfamiliar').val();
    if ($('#optM').is(':checked')) {
        var vsexo = $('#optM').val();
    } else {
        var vsexo = $('#optF').val();
    }
    var vdireccion = $('#direccion').val();
    var vciudad = $('#ciudad').val();
    var vcodpostal = $('#codigopostal').val();
    var vbarrio = $('#barrio').val();
    var vestadoper = $('#estadopersonal').val();
    var fechasalida = $('#fsalida').val();
    var motivosalida = $('#msalida').val();
    //Seccion 3
    var vemail = $('#email').val();
    var vfechanac = $('#fechanac').val();
    var vlugarnac = $('#lugarnac').val();
    var vestadocivil = $('#estadocivil').val();
    var vnacionalidad = $('#nacionalidad').val();
    var vci = $('#cedula').val();
    var foto = $('#foto').prop('files')[0] == undefined ? null : $('#foto').prop('files')[0];
    //Seccion 4
    var vprofesion = $('#profesion').val();
    var vlugartrab = $('#lugarestudio').val();
    var vpuesto = $('#puesto').val();
    var vtipsangre = $('#tipsangre').val();
    var valergia = $('#alergias').val();
    var vcapdif = $('#capacidades').val();


    // Creamos el objeto FormData y relacionamos los datos colectados
    var form_data = new FormData();

    form_data.append('op', op);
    form_data.append('id', vid);
    // Seccion 1
    form_data.append('nombres', vnombres);
    form_data.append('apellidoPaterno', vapepaterno);
    form_data.append('apellidoMaterno', vapematerno);
    form_data.append('familia', vfamilia);
    form_data.append('relacionfamiliar', vrelacionfamiliar);
    form_data.append('sexo', vsexo);
    form_data.append('direccion', vdireccion);
    form_data.append('ciudad', vciudad);
    form_data.append('codigopostal', vcodpostal);
    form_data.append('barrio', vbarrio);
    form_data.append('estadopersonal', vestadoper);
    form_data.append('fechasalida', fechasalida);
    form_data.append('motivosalida', motivosalida);
    // seccion 3
    form_data.append('email', vemail);
    form_data.append('fechanac', vfechanac);
    form_data.append('lugarnac', vlugarnac);
    form_data.append('estadocivil', vestadocivil);
    form_data.append('nacionalidad', vnacionalidad);
    form_data.append('cedula', vci);
    form_data.append('foto', foto);
    //Seccion 4
    form_data.append('profesion', vprofesion);
    form_data.append('lugartrabajo', vlugartrab);
    form_data.append('puesto', vpuesto);
    form_data.append('tipsangre', vtipsangre);
    form_data.append('alergias', valergia);
    form_data.append('capacidades', vcapdif);

    // Para ver lo que acarrea en consola el objeto form_data
    // console.log('----Seccion 1----');
    // console.log(form_data.getAll('nombres'));
    // console.log(form_data.getAll('apellidoPaterno'));
    // console.log(form_data.getAll('apellidoMaterno'));
    // console.log(form_data.getAll('familia'));
    // console.log(form_data.getAll('relacionfamiliar'));
    // console.log(form_data.getAll('sexo'));
    // console.log(form_data.getAll('direccion'));
    // console.log(form_data.getAll('ciudad'));
    // console.log(form_data.getAll('codigopostal'));
    // console.log(form_data.getAll('barrio'));
    // console.log(form_data.getAll('estadopersonal'));
    // console.log('----Seccion 3----');
    // console.log(form_data.getAll('email'));
    // console.log(form_data.getAll('fechanac'));
    // console.log(form_data.getAll('lugarnac'));
    // console.log(form_data.getAll('estadocivil'));
    // console.log(form_data.getAll('nacionalidad'));
    // console.log(form_data.getAll('cedula'));
    console.log(form_data.getAll('foto'));
    // console.log('----Seccion 4----');
    // console.log(form_data.getAll('profesion'));
    // console.log(form_data.getAll('lugartrabajo'));
    // console.log(form_data.getAll('puesto'));
    // console.log(form_data.getAll('tipsangre'));
    // console.log(form_data.getAll('alergias'));
    // console.log(form_data.getAll('capacidades'));

    $.ajax({
        url: '../../validaciones/persona/registroPersona.php',
        data: form_data,
        type: 'POST',
        processData: false,
        contentType: false,
        success: function (resp) {
            //alert(resp);
            if (resp == 'exito') {
                $('#tabla_body').empty();
                Grilla();
                // limpiar();
                alertaExito();
                // alert('Exito');
            } else {
                alert('Error');
            }

        },
        error: function () {
            alert('Error');
        }
    });
}

function clickGuardar() {
    if (camposValidar()) {
        Guardar();
        limpiar();
        volverMenu();
    }
}

// Esta funcion llena el formulario
function recuperadatos(id, nombres, idfamilia, apellidop, apellidom, relacfamiliar,
        sexo, idcalle, idciudad, codpostal, idbarrio, estpersonal, email, fechanac, lugarnac,
        ecivil, idnac, ci, idprofesion, lugarestudio, puesto, tiposangre, alergia, capacidades) {
    $('#id').val(id);
    $('#nombres').val(nombres);
    $('#familia').val(idfamilia);
    $('#apellidoPaterno').val(apellidop);
    $('#apellidoMaterno').val(apellidom);
    $('#relacionfamiliar').val(relacfamiliar);
    if (sexo === 'MASCULINO') {
        $('#optM').prop('checked', true);
        $('#optF').prop('checked', false);
    } else if (sexo === 'FEMENINO') {
        $('#optF').prop('checked', true);
        $('#optM').prop('checked', false);
    }
    $('#direccion').val(idcalle);
    $('#ciudad').val(idciudad);
    $('#codigopostal').val(codpostal);
    $('#barrio').val(idbarrio);
    $('#estadopersonal').val(estpersonal);
    $('#email').val(email == 'null' ? '' : email);
    $('#fechanac').val(fechanac);
    $('#lugarnac').val(lugarnac);
    $('#estadocivil').val(ecivil);
    $('#nacionalidad').val(idnac);
    $('#cedula').val(ci);
    $('#profesion').val(idprofesion);
    $('#lugarestudio').val(lugarestudio);
    $('#puesto').val(puesto);
    $('#tipsangre').val(tiposangre);
    $('#alergias').val(alergia);
    $('#capacidades').val(capacidades);
    $('#foto').val('');

    formMod();//muestra el formulario y desaparece otros elementos
    telefonoPersona(id);
    // El lindo ajax
    datos = {idpersona: id}
    $.ajax({
        url: '../../validaciones/persona/mostrarFotoPersona.php',
        data: datos,
        type: 'POST',
        success: function (resp) {
            $.each(resp, function (indice, item) {
                // console.log(item.foto);
                if (item.foto !== null) {
                    $('#cajaimagen').html('<img src="data:image/jpeg; base64,' + item.foto + '" alt="fotouser" width="250" heigth="250">');
                } else {
                    $('#cajaimagen').html('<p class="fa fa-photo">No subiste ninguna foto</p>');
                }
            });
        },
        error: function () {
            alert('Error');
        }
    });
}

function actualizaImagen() {
    // El lindo ajax
    var vid = $('#id').val();
    var foto = $('#foto').prop('files')[0] == undefined ? null : $('#foto').prop('files')[0];
    var datos_form = new FormData();

    datos_form.append('id', vid);
    datos_form.append('foto', foto);
    // console.log(form_data.getAll('foto'));
    $.ajax({
        url: '../../validaciones/persona/actualizaFoto.php',
        data: datos_form,
        type: 'POST',
        processData: false,
        contentType: false,
        success: function (res) {
            $('#foto').val('');
            $('#avBotonesimagen').fadeIn(2000);
            $('#avBotonesimagen').text('Actualizacion correcta');
            $('#avBotonesimagen').fadeOut(6000);
            datos = {idpersona: vid}
            $.ajax({
                url: '../../validaciones/persona/mostrarFotoPersona.php',
                data: datos,
                type: 'POST',
                success: function (resp) {
                    $.each(resp, function (indice, item) {
                        // console.log(item.foto);
                        if (item.foto !== null) {
                            $('#cajaimagen').html('<img src="data:image/jpeg; base64,' + item.foto + '" alt="fotouser" width="250" heigth="250">');
                        } else {
                            $('#cajaimagen').html('<p class="fa fa-photo">No subiste ninguna foto</p>');
                        }
                    });
                },
                error: function () {
                    alert('Error');
                    $('#avBotonesimagen').fadeIn(2000);
                    $('#avBotonesimagen').text('Actualizacion incorrecta');
                    $('#avBotonesimagen').fadeIn(6000);
                }
            });
        },
        error: function (res) {
            console.log(res);
            alert('Error ' + res);
        }
    });
}

function eliminaImagen() {
    // El lindo ajax
    var vid = $('#id').val();
    var datos_form = new FormData();
    datos_form.append('id', vid);
    $.ajax({
        url: '../../validaciones/persona/eliminaFoto.php',
        data: datos_form,
        type: 'POST',
        processData: false,
        contentType: false,
        success: function (res) {
            $('#avBotonesimagen').fadeIn(2000);
            $('#avBotonesimagen').text('Eliminacion correcta');
            $('#avBotonesimagen').fadeOut(6000);
            datos = {idpersona: vid}
            $.ajax({
                url: '../../../validaciones/persona/mostrarFotoPersona.php',
                data: datos,
                type: 'POST',
                success: function (resp) {
                    $.each(resp, function (indice, item) {
                        // console.log(item.foto);
                        if (item.foto !== null) {
                            $('#cajaimagen').html('<img src="data:image/jpeg; base64,' + item.foto + '" alt="fotouser" width="250" heigth="250">');
                        } else {
                            $('#cajaimagen').html('<p class="fa fa-photo">No subiste ninguna foto</p>');
                        }
                    });
                },
                error: function () {
                    $('#avBotonesimagen').fadeIn(2000);
                    $('#avBotonesimagen').text('Eliminacion incorrecta');
                    $('#avBotonesimagen').fadeOut(6000);
                    alert('Error');
                }
            });
        },
        error: function (res) {
            console.log(res);
            alert('Error ' + res);
        }
    });
}

function clickModificar() {
    if (camposValidar()) {
        Modificar();
        limpiar();
        volverMenu();
    }
}

// Esta funcion realiza la modificacion
function Modificar() {
    // Colectar datos del formulario
    var op = 'm';
    //Seccion 1
    var vid = $('#id').val();
    var vnombres = $('#nombres').val();
    var vapepaterno = $('#apellidoPaterno').val();
    var vapematerno = $('#apellidoMaterno').val();
    var vfamilia = $('#familia').val();
    var vrelacionfamiliar = $('#relacionfamiliar').val();
    if ($('#optM').is(':checked')) {
        var vsexo = $('#optM').val();
    } else {
        var vsexo = $('#optF').val();
    }
    var vdireccion = $('#direccion').val();
    var vciudad = $('#ciudad').val();
    var vcodpostal = $('#codigopostal').val();
    var vbarrio = $('#barrio').val();
    var vestadoper = $('#estadopersonal').val();
    var fechasalida = $('#fsalida').val();
    var motivosalida = $('#msalida').val();
    //Seccion 3
    var vemail = $('#email').val();
    var vfechanac = $('#fechanac').val();
    var vlugarnac = $('#lugarnac').val();
    var vestadocivil = $('#estadocivil').val();
    var vnacionalidad = $('#nacionalidad').val();
    var vci = $('#cedula').val();
    var fotouser = null;
    //Seccion 4
    var vprofesion = $('#profesion').val();
    var vlugartrab = $('#lugarestudio').val();
    var vpuesto = $('#puesto').val();
    var vtipsangre = $('#tipsangre').val();
    var valergia = $('#alergias').val();
    var vcapdif = $('#capacidades').val();


    // Creamos el objeto FormData y relacionamos los datos colectados
    var form_data = new FormData();

    form_data.append('op', op);
    form_data.append('id', vid);
    // Seccion 1
    form_data.append('nombres', vnombres);
    form_data.append('apellidoPaterno', vapepaterno);
    form_data.append('apellidoMaterno', vapematerno);
    form_data.append('familia', vfamilia);
    form_data.append('relacionfamiliar', vrelacionfamiliar);
    form_data.append('sexo', vsexo);
    form_data.append('direccion', vdireccion);
    form_data.append('ciudad', vciudad);
    form_data.append('codigopostal', vcodpostal);
    form_data.append('barrio', vbarrio);
    form_data.append('estadopersonal', vestadoper);
    form_data.append('fechasalida', fechasalida);
    form_data.append('motivosalida', motivosalida);
    // seccion 3
    form_data.append('email', vemail);
    form_data.append('fechanac', vfechanac);
    form_data.append('lugarnac', vlugarnac);
    form_data.append('estadocivil', vestadocivil);
    form_data.append('nacionalidad', vnacionalidad);
    form_data.append('cedula', vci);
    form_data.append('foto', foto);
    //Seccion 4
    form_data.append('profesion', vprofesion);
    form_data.append('lugartrabajo', vlugartrab);
    form_data.append('puesto', vpuesto);
    form_data.append('tipsangre', vtipsangre);
    form_data.append('alergias', valergia);
    form_data.append('capacidades', vcapdif);

    $.ajax({
        url: '../../validaciones/persona/registroPersona.php',
        data: form_data,
        type: 'POST',
        processData: false,
        contentType: false,
        success: function (resp) {
            //alert(resp);
            if (resp == 'exito') {
                $('#tabla_body').empty();
                Grilla();
                limpiar();
                alertaExito();
                // alert('Exito');
            } else {
                alert('Error');
            }

        },
        error: function () {
            alert('Error');
        }
    });
}

function eliminar(id) {
    datosJSON = {op: 'b',
        id: id,
        nombre: "asd",
        ruc: "asd",
        capacidad: 2,
        telefono1: "asd",
        telefono2: "asd",
        email: "asd",
        pagweb: "asd",
        fanpage: "asd",
        latitud: 33,
        longitud: 33,
        cbociudad: 1,
        cbobarrio: 1,
        cbocalle: 1
    };
    $.ajax({
        url: '../../validaciones/sede/registroSede.php',
        data: datosJSON,
        type: 'POST',
        success: function (resp) {
            if (resp == 'exito') {
                $('#tabla_body').empty();
                Grilla();
                limpiar();
                alertaBaja();
            } else {
                alertaReferencia();
            }
        },
        error: function () {
            alert('Error');
        }
    });
}

function ocultos() {
    $('#btnMod, #divid, #alertExito, #alertBaja, #cargando, #alertVacio, #alertReferenciada,' +
            '#verReg , #divestadopersonal, #grupoFormulario, #operaciones, #divid').hide();
    $('#sector2').addClass('disabled');
    $('#enlace2').removeAttr('data-toggle');
}

function nuevo() {
    limpiar();
    $('#grupoFormulario, #operaciones, #btnGuardar').show(); // Muestra el formulario y botones
    $('#rowBotones, #rowResultados, #btnModificar').hide(); // Esconde elementos de tabla y botones de entrada
    // Bloquea la seccion 2
    $('.nav-tabs a[href="#seccion1"]').tab('show')
    $('#sector2').addClass('disabled');
    $('#enlace2').removeAttr('data-toggle');
}

function formMod() {
    $('#grupoFormulario, #operaciones, #btnModificar').show(); // Muestra el formulario y botones
    $('#rowBotones, #rowResultados, #btnGuardar').hide(); // Esconde elementos de tabla y botones de entrada
    // Activa la seccion 2
    $('#sector2').removeClass('disabled');
    $('#sector2').addClass('Active');
    $('#enlace2').attr('data-toggle', 'tab');
}

function limpiarCampoModal() {
    $('#btnModalBuscar').click(function () {
        $('#buscar').val('');
    });
}

function limpiar() {
    $('#id, #nombres, #apellidoPaterno, #apellidoMaterno, #codigopostal, #fsalida, ' +
            '#msalida, #foto, #email, #fechanac, #lugarnac, #cedula, #lugarestudio, ' +
            '#puesto, #tipsangre, #alergias, #capacidades, #fsalida, #msalida').val('');
    $('#cajaimagen').html('');
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
function avisoTexto(id, texto) {
    $('#av' + id).text(texto);
    $('#av' + id).fadeIn(3000);
    $('#av' + id).fadeOut(8000);
}

function camposValidar() {
    var nombre = $('#nombres').val().trim();
    if (nombre === '' && nombre !== null) {
        $('.nav-tabs a[href="#seccion1"]').tab('show')
        avisoTexto('Nombres', 'El campo nombre no debe quedar vacio');
        $('#nombres').focus();
        //$('#divnombre').addClass('has-error');
        return false;
    }

    var apellidom = $('#apellidoMaterno').val();
    if (apellidom.trim() == '') {
        $('.nav-tabs a[href="#seccion1"]').tab('show')
        avisoTexto('Apellidomaterno', 'El Apellido materno no debe quedar vacio');
        $('#apellidoMaterno').focus();
        return false;
    }

    var cedula = $('#cedula').val();
    if (cedula.trim() == '') {
        $('.nav-tabs a[href="#seccion3"]').tab('show')
        avisoTexto('Cedula', 'La cedula no debe quedar vacia');
        $('#cedula').focus();
        return false;
    }

    var email = $('#email').val();
    if (email.trim() == '') {
        //return true;
    } else if (!expRegEmail.exec(email)) {
        $('.nav-tabs a[href="#seccion3"]').tab('show')
        avisoTexto('Email', 'El campo email es incorrecto');
        $('#email').focus();
        return false;
    }

    var fechanac = $('#fechanac').val();
    if (fechanac.trim() == '') {
        $('.nav-tabs a[href="#seccion3"]').tab('show')
        avisoTexto('Fechanac', 'El campo fecha de nacimiento esta vacio');
        $('#fechanac').focus();
        return false;
    }

    var codigop = $('#codigopostal').val().trim();
    if (codigop === '' && codigop !== null) {
        $('#codigopostal').val('')
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
    $('#buscar').val('');
    $('#buscar').keyup(function () {
        datos = {descripcion: $('#buscar').val()};
        $('#cargando').show();
        $.ajax({
            url: '../../validaciones/persona/buscarPersona.php',
            data: datos,
            type: 'POST',
            success: function (resp) {
                // alert(resp);                
                $('#tabla_buscar_body').empty();
                $.each(resp, function (indice, item) {

                    $("#tblBusqueda").append($('<tr>').append($('<td>' + item.id + '</td>' +
                            '<td>' + item.nombres + ' ' + item.apellidop + ' ' + item.apellidom + '</td>' + '<td>' + item.ci + '</td>' +
                            '<td><button type="button" class="ver btn btn-outline btn-primary btn-sm" onclick="verRegistro(' + item.id + ",'" +
                            item.nombres + " " + item.apellidop + " " + item.apellidom + "'" + ',' + "'" + item.familia + "'" + ',' + "'" +
                            item.relacionfamiliar + "'" + ',' + "'" + item.sexo + "'" + ',' + "'" + item.calle + "'" + ',' + "'" + item.ciudad + "'" + ',' +
                            (item.codigopostal == "" ? null : item.codigopostal) + ',' + "'" + item.barrio + "'" + ',' + "'" + item.estadopersonal + "'" + ',' + "'" + (item.email == '' ? null : item.email) + "'" + ',' +
                            "'" + item.fechanac + "'" + ', ' + "'" + item.lugarnacimiento + "'" + ', ' + "'" + item.ecivil + "'" + ', ' + "'" + item.nacionalidad + "'" + ', ' + item.ci + ', ' + "'" + item.profesion + "'" + ', ' +
                            "'" + (item.lugarestudio == '' ? null : item.lugarestudio) + "'" + ', ' + "'" + (item.puesto == '' ? null : item.puesto) + "'" + ', ' + "'" + (item.tiposangre == '' ? null : item.tiposangre) + "'" + ', ' +
                            "'" + (item.alergia == "" ? null : item.alergia) + "'" + ', ' + "'" + (item.capacidades == '' ? null : item.capacidades) + "'" + ')" data-dismiss="modal">Ver</button>' + ' ' + '<button type="button" class="modificar btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#myModal" onclick="recuperadatos(' + item.id + ",'" +
                            item.nombres + "'" + ',' + "'" + item.idfamilia + "'" + ',' + "'" + item.apellidop + "'" + ',' + "'" + item.apellidom + "'" + ',' + "'" +
                            item.relacionfamiliar + "'" + ',' + "'" + item.sexo + "'" + ',' + "'" + item.idcalle + "'" + ',' + "'" + item.idciudad + "'" + ',' +
                            (item.codigopostal == "" ? null : item.codigopostal) + ',' + item.idbarrio + ',' + "'" + item.estadopersonal + "'" + ',' + "'" + (item.email == '' ? null : item.email) + "'" + ',' +
                            "'" + item.fechanac + "'" + ', ' + "'" + item.lugarnacimiento + "'" + ', ' + "'" + item.ecivil + "'" + ', ' + item.idnac + ', ' + item.ci + ', ' + item.idprofesion + ', ' +
                            "'" + (item.lugarestudio == '' ? null : item.lugarestudio) + "'" + ', ' + "'" + (item.puesto == '' ? null : item.puesto) + "'" + ', ' + "'" + (item.tiposangre == '' ? null : item.tiposangre) + "'" + ', ' +
                            "'" + (item.alergia == "" ? null : item.alergia) + "'" + ', ' + "'" + (item.capacidades == '' ? null : item.capacidades) + "'" + ')" data-dismiss="modal">Modificar</button></td>'
                            ))).ready(() => {
                        obtenerPrivilegios();
                    });

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

//Obtener privilegios
function obtenerPrivilegios() {
    __ajax("../../validaciones/gestionar_sesiones/obtenerPermisos.php", {nombre_pagina: "personas"})
            .done((res) => {
                let lista = JSON.parse(res);
//                console.log(lista);
                for (let i in lista) {
//                console.log(lista[i].leer);
                    if (lista[i].borrar === true) {
//                    $(".eliminar").prop("disabled", false);
                        $(".eliminar").show();
                    } else {
//                    $(".eliminar").prop("disabled", true);
                        $(".eliminar").hide();
                    }

                    if (lista[i].editar === true) {
//                    $(".modificar").prop("disabled", false);
                        $(".modificar").show();
                    } else {
//                    $(".modificar").prop("disabled", true);                    
                        $(".modificar").hide();
                    }

                    if (lista[i].insertar === true) {
//                    $(".nuevo").prop("disabled", false);
                        $(".nuevo").show();
                    } else {
//                    $(".nuevo").prop("disabled", true);
                        $(".nuevo").hide();
                    }

                    if (lista[i].leer === true) {
//                    $(".ver").prop("disabled", false);
                        $(".ver").show();
                    } else {
//                    $(".ver").prop("disabled", true);
                        $(".ver").hide();
                    }
                }
            })
            .fail((res) => {
                console.log(res);
            });
}

function __ajax(url, data) {
    var ajax = $.ajax({
        "url": url,
        "method": "POST",
        "data": data
    })
    return ajax;
}