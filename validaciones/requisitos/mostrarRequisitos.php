<?php
include '../../controlador/RequisitoControlador.php';
header('Content-type: application/json');

$requisito = RequisitoControlador::obtenerRequisito();

return print json_encode($requisito);

?>
