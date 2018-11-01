<?php

include '../../controlador/PersonaControlador.php';

header('Content-type: application/json');

$id = $_POST['idpersona'];

$persona = PersonaControlador::obtenerPersonatelefono($id);

return print json_encode($persona);

?>
