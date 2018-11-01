<?php

include '../../controlador/BarrioControlador.php';
// echo get_include_path();
// echo "<br>".__DIR__;
header('Content-type: application/json');

// CiudadControlador::prueba();
$barrio = BarrioControlador::obtenerBarrio();
return print json_encode($barrio);

?>
