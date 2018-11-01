<?php

include '../../controlador/PersonaControlador.php';

header('Content-type: application/json');

$persona = PersonaControlador::obtenerTodoPersona();

return print json_encode($persona);

?>
