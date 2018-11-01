<?php

include '../../controlador/FichaBautismoControlador.php';

header('Content-type: application/json');

$lista = FichaBautismoControlador::obtenerListaPastores();

return print $lista;

?>
