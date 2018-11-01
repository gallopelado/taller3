<?php

include '../../controlador/BarrioControlador.php';

header('Content-type: application/json');

// CiudadControlador::prueba();
$barrio = BarrioControlador::obtenerTodoBarrio();
return print json_encode($barrio);

?>