<?php
include "../../controlador/HistoricoAfilianteControlador.php";

$op = $_POST["op"];
$idpersona = $_POST["idpersona"];
$idrequisito = $_POST["idrequisito"];
$estado = $_POST["estado"];
$fecha = $_POST["fecha"];
$ant_idrequisito = $_POST["antidrequisito"];
// echo $op." ".$idpersona." nuevo requisito=".$idrequisito." ".$estado." ".$fecha." requisito anterior=".$ant_idrequisito;
HistoricoAfilianteControlador::persistir($op, $idpersona, $idrequisito,
$estado, $fecha, $ant_idrequisito);

?>
