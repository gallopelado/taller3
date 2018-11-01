<?php

include '../../controlador/AfilianteControlador.php';

header('Content-type: application/json');

$lista = AfilianteControlador::obtenerListaMiembros();

return print json_encode($lista);

?>
