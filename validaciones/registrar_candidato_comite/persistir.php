<?php
include "../../controlador/CandidatoControlador.php";

$op = CandidatoControlador::analizarNulos($_POST["op"]);
$idcandidato = CandidatoControlador::analizarNulos($_POST["idcandidato"]);
$idmiembro = CandidatoControlador::analizarNulos($_POST["idmiembro"]);
$cualidades = CandidatoControlador::analizarNulos($_POST["cualidades"]);
$actitudes = CandidatoControlador::analizarNulos($_POST["actitudes"]);
$antecedentes = CandidatoControlador::analizarNulos($_POST["antecedentes"]);
$fecha = CandidatoControlador::analizarNulos($_POST["fecha"]);
$servir = CandidatoControlador::analizarNulos($_POST["servir"]);

//echo "opcion ".$op."\n";
//echo "idcandidato ".$idcandidato."\n" ;
//echo "idmiembro ".$idmiembro."\n" ;
//echo "cualidades ".$cualidades ."\n";
//echo "actitudes ".$actitudes ."\n";
//echo "antecedentes ".$antecedentes."\n" ;
//echo "fecha ".$fecha ."\n";
//echo "servir ".$servir."\n";

return CandidatoControlador::persistir($op, $idcandidato, $idmiembro,$cualidades, $actitudes, $antecedentes, $fecha, $servir);

?>
