<?php

include '../../controlador/EnumControlador.php';

header('Content-type: application/json');

$enum = EnumControlador::obtenerEnum($_POST['entidad']);

return print json_encode($enum);

?>
