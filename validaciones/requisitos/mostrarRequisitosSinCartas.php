<?php
include '../../controlador/RequisitoControlador.php';
header('Content-type: application/json');

$requisito = RequisitoControlador::obtenerRequisitoSinCartas();

return print json_encode($requisito);

?>
