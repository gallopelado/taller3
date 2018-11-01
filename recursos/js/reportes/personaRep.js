$(function () {
    datepicker();
    $("#btnRepTotal").click(function () {
        mostrarReporteTotal();
    });
    $("#btnRepFecha").click(function () {
        generar();
    });
    $("#btnRepFechaLimpiar").click(function () {
        limpiar();
    });
});

// Funcion optimizada para todos
function __ajax(url, data) {
    var ajax = $.ajax({
        'method': 'POST',
        'url': url,
        'data': data
    })
    return ajax;
}


function mostrarReporteTotal() {
    window.open("http://localhost/iec_copia/validaciones/reportes/persona/mostrarReporteTotal.php");
}

function armarDatos() {
    let datos = {
        fechainicio: document.getElementById("txtFechaInicio").value,
        fechafin: document.getElementById("txtFechaFin").value
    }
    return datos;
}

function validar() {
    if (document.getElementById("txtFechaInicio").value === "") {
        $("#txtFechaInicio").focus();
        return false;
    }
    if (document.getElementById("txtFechaFin").value === "") {
        $("#txtFechaFin").focus();
        return false;
    }
    return true;
}

function limpiar() {
    $("#txtFechaInicio, #txtFechaFin").val("");
}

function generar() {
    if(validar()) {
        let txtinicio = document.getElementById("txtFechaInicio").value;
        let txtfin = document.getElementById("txtFechaFin").value;
        console.log(armarDatos());
        window.open(`http://localhost/iec_copia/validaciones/reportes/persona/mostrarReportePorFecha.php?txtinicio="${document.getElementById("txtFechaInicio").value}"&txtfin="${document.getElementById("txtFechaFin").value}"`);
    }
}

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

function datepicker() {
    var todayDate = new Date().getDate();
    $('#txtFechaInicio, #txtFechaFin').datepicker({
        // locale : 'es',
        // format : 'LL',
        yearRange: "1920:2018",
        currentText: 'Now',
        dateFormat: 'dd-mm-yy',
        //minDate: new Date(new Date().setDate(todayDate)),
        //minDate : new Date('1920,1-1,1'),
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        showOn: "button",
        buttonImage: "http://localhost/iec_copia/recursos/dist/images/calendar.gif",
        buttonImageOnly: true,
        buttonText: "Select date"
                //maxDate: new Date(new Date().setDate(todayDate))    
    });
}