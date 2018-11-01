<?php

include '../../controlador/PostulacionControlador.php';

header('Content-type: application/json');

$lista = PostulacionControlador::getListaPostulacionGeneralCerradas();

return print json_encode($lista);

?>
