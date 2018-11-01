<?php

include '../../controlador/CandidatoControlador.php';

header('Content-type: application/json');
$idcandidato = $_POST["idcandidato"];
$lista = CandidatoControlador::getListaCandidatosById($idcandidato);

return print json_encode($lista);

?>
