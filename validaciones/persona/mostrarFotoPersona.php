<?php

include '../../controlador/PersonaControlador.php';

header('Content-type: application/json');



$id = $_POST['idpersona'];

$persona = PersonaControlador::obtenerFoto($id);

return print json_encode($persona);

?>
