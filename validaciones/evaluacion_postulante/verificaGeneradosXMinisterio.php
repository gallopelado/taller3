<?php

include '../../controlador/EvaluacionPostulanteControlador.php';

header('Content-type: application/json');

$ministerio = $_POST["ministerio"];
$lista = EvaluacionPostulanteControlador::getListaAdmitidosMinisterio($ministerio);

return print json_encode($lista);

?>
