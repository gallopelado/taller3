$(function () {
    ocultos();
    $("#btnIniciaSesion").click(function () {
        enviarDatos();
    });
});

function ocultos() {
    $(".alert").hide();
}
function __ajax(url, data) {
    var ajax = $.ajax({
        "url": url,
        "method": "POST",
        "data": data
    })
    return ajax;
}

function validar() {
    if (document.getElementById("nick").value === "") {
        return false;
    }
    if (document.getElementById("clave").value === "") {
        return false;
    }
    return true;
}

function enviarDatos() {
    if (!validar()) {
        $("#nick").focus();
        $("#alertBaja").text("Error en el logueo. Revisar");
        $("#alertBaja").fadeIn();
        $("#alertBaja").fadeOut(10000);
    } else {
        __ajax("../validaciones/gestionar_sesiones/revisarUsuario.php", {nick: document.getElementById("nick").value, clave: document.getElementById("clave").value})
                .done(function (res) {
//                    console.log(res);
                    if (res.estado == "true") {
                        console.log("redirigiendo");
                        window.location.href = "../index.php";//redireccion luego de la validacion exitosa
                    } else {
                        console.log(res);
                        $("#alertBaja").text("Error en el logueo. Revisar");
                        $("#alertBaja").fadeIn();
                        $("#alertBaja").fadeOut(10000);
                    }
                })
                .fail(function (res) {
                    console.log(res);
                });
    }
}