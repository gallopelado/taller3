<?php

include '../../controlador/MinisterioControlador.php';
header('Content-type: application/json');

$lista = MinisterioControlador::listaMinisterio();
return print json_encode($lista);

?>
