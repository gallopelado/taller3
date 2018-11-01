<?php

include '../../controlador/PostulacionControlador.php';

header('Content-type: application/json');

$lista = PostulacionControlador::getListaPostulacionGeneral();

return print json_encode($lista);

?>
