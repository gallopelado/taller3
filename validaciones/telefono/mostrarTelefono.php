<?php

include '../../controlador/TelefonoControlador.php';

header('Content-type: application/json');

$telefono = TelefonoControlador::obtenerTelefono();
return print json_encode($telefono);

?>
