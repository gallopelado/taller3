<?php

include '../../controlador/PostulacionControlador.php';

header('Content-type: application/json');

$lista = PostulacionControlador::getListaPostulacion();

return print json_encode($lista);

?>
