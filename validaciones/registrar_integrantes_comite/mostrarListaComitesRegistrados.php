<?php

include '../../controlador/IntegranteComiteControlador.php';

header('Content-type: application/json');

$lista = IntegranteComiteControlador::getListaComitesRegistrados();

return print json_encode($lista);

?>