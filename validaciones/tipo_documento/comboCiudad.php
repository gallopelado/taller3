<?php

include '../../controlador/CiudadControlador.php';

header('Content-type: application/json');

// CiudadControlador::prueba();
$ciudad = CiudadControlador::obtenerTodasCiudad();
return print json_encode($ciudad);

?>