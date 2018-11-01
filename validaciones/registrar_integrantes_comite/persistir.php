<?php

include "../../controlador/IntegranteComiteControlador.php";

$op = IntegranteComiteControlador::analizarNulos($_POST["op"]);
$idcomitecab = IntegranteComiteControlador::analizarNulos($_POST["idcomitecab"]);
$idministerio = IntegranteComiteControlador::analizarNulos($_POST["idministerio"]);
$idlider = IntegranteComiteControlador::analizarNulos($_POST["idlider"]);
$idsuplente = IntegranteComiteControlador::analizarNulos($_POST["idsuplente"]);
$descripcion = IntegranteComiteControlador::analizarNulos($_POST["descripcion"]);
$obs = IntegranteComiteControlador::analizarNulos($_POST["obs"]);

return IntegranteComiteControlador::persistir($op, $idcomitecab, $idministerio, $idlider, $idsuplente, $descripcion, $obs);
