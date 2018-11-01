<?php
include "../../controlador/FichaBautismoControlador.php";

$op = $_POST["op"];
$bauid = $_POST["idbautismo"];
$baufecha = $_POST["fechabautismo"];
$idpadre = $_POST["idtutor1"];
$idmadre = $_POST["idtutor2"];
$perid = $_POST['idpersona'];
$pastorid = $_POST['idpastor'];
// echo $op." ,bauid= ".$bauid.", fecha= " . $baufecha ." tutor1= ".$idpadre.", tutor2= ".
// $idmadre.", persona= ".$perid.", pastorid= ".$pastorid;
FichaBautismoControlador::persistir($op, $bauid, $baufecha, $idpadre, $idmadre, $perid, $pastorid);

?>
