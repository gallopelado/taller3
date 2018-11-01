<?php

include '../../controlador/EvaluacionPostulanteControlador.php';

header('Content-type: application/json');

$idcabe = $_POST["idcabe"];
$lista = EvaluacionPostulanteControlador::getDesplegarPostulacion($idcabe);

return print json_encode($lista);

?>
