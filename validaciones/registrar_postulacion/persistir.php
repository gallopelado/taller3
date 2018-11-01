<?php
include "../../controlador/PostulacionControlador.php";

$op = PostulacionControlador::analizarNulos($_POST["op"]);
$idpostulacion = PostulacionControlador::analizarNulos($_POST["idpostulacion"]);
$idministerio = PostulacionControlador::analizarNulos($_POST["idcomite"]);
$descripcion = PostulacionControlador::analizarNulos($_POST["descri_postulacion"]);
$vacancia = PostulacionControlador::analizarNulos($_POST["vacancias"]);
$documento = null;
$idcargo = PostulacionControlador::analizarNulos($_POST["idcargo"]);
$iniciopostulacion = PostulacionControlador::analizarNulos($_POST["iniciopostu"]);
$finpostulacion = PostulacionControlador::analizarNulos($_POST["finpostu"]);
$estado= PostulacionControlador::analizarNulos($_POST["estado"]);

//echo "opcion ".$op."\n";
//echo "idpostulacion ".$idpostulacion."\n" ;
//echo "idcomite ".$idministerio."\n" ;
//echo "descri_postulacion ".$descripcion ."\n";
//echo "vacancias ".$vacancia ."\n";
//echo "documento ".$documento."\n" ;
//echo "idcargo ".$idcargo ."\n";
//echo "iniciopostu ".$iniciopostulacion."\n";
//echo "finpostu ".$finpostulacion."\n";
//echo "estado ".$estado."\n";

return PostulacionControlador::persistir($op, $idpostulacion, $idministerio, $descripcion, $documento, $vacancia,
          $idcargo, $iniciopostulacion, $finpostulacion, $estado); 
?>
