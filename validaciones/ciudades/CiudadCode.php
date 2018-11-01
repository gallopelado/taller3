<?php
session_start();
include '../../controlador/CiudadControlador.php';

header('Content-type: application/json');

// CiudadControlador::prueba();
$ciudad = CiudadControlador::obtenerCiudad();
return print json_encode($ciudad);

?>
