<?php

include '../../controlador/NacionalidadControlador.php';

header('Content-type: application/json');

// CiudadControlador::prueba();
$nacionalidad = NacionalidadControlador::obtenerAllNacionalidad();
return print json_encode($nacionalidad);

?>
