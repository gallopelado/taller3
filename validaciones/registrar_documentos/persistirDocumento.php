<?php
include "../../controlador/RegistrarDocumentoControlador.php";

$op = $_POST["op"];
$id = $_POST["id"];
$idpersona = $_POST["idpersona"];
$idtipodocumento = $_POST["idtipodocumento"];
$observacion = $_POST["observacion"];
// echo $op." ,idPersona= ".$idpersona.", idTipoDocumento= " . $idtipodocumento ." Obs= ".$observacion;
RegistrarDocumentoControlador::persistir($op, $id, $idpersona, $idtipodocumento, $observacion);

?>
