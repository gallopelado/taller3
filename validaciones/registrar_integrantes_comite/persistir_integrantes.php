<?php

include "../../controlador/IntegranteComiteControlador.php";

$op = IntegranteComiteControlador::analizarNulos($_POST["op"]);
$idcomitecabecera = IntegranteComiteControlador::analizarNulos($_POST["idcomitecabecera"]);
$idcandidato = IntegranteComiteControlador::analizarNulos($_POST["idcandidato"]);
$idcargo = IntegranteComiteControlador::analizarNulos($_POST["idcargo"]);
$ob = IntegranteComiteControlador::analizarNulos($_POST["obs"]);
$entrenamiento = IntegranteComiteControlador::analizarNulos($_POST["entrenamiento"]);

return IntegranteComiteControlador::persistirIntegrantes($op, $idcomitecabecera, $idcandidato, $idcargo, $ob, $entrenamiento);

//datos = {
//        op: op,
//        idcomitecabecera: document.getElementById("txtIdCab").value,
//        idcandidato: document.getElementById("txtIdIntegrante").value,
//        idcargo: document.getElementById("optCargo").value,
//        obs: document.getElementById("txtOb").value,
//        entrenamiento: $("#chkEntrenamiento").is(":checked") === true ? true : false
//    }