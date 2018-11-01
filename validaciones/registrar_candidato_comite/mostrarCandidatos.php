<?php

include '../../controlador/CandidatoControlador.php';

header('Content-type: application/json');

$lista = CandidatoControlador::getListaCandidatos();

return print json_encode($lista);

?>
