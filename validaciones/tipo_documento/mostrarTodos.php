<?php

include '../../controlador/TipoDocumentoControlador.php';
header('Content-type: application/json');

$obj = TipoDocumentoControlador::obtenerTodas();
return print json_encode($obj);

?>
