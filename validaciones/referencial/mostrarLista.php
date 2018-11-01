<?php

include '../../controlador/ReferencialControlador.php';

header('Content-type: application/json');

$entidad = $_POST["entidad"];
//echo "Recibido ".$entidad;

$lista = ReferencialControlador::getLista($entidad);

return print json_encode($lista);

?>