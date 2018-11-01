<?php

include '../../controlador/EvaluacionPostulanteControlador.php';

header('Content-type: application/json');

$idpostulacion = $_POST["idpostulacion"];
$lista = EvaluacionPostulanteControlador::getListaAdmitidos($idpostulacion);

return print json_encode($lista);

?>
