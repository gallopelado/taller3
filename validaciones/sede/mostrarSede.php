<?php

include '../../controlador/SedeControlador.php';
// echo get_include_path();
// echo "<br>".__DIR__;
header('Content-type: application/json');

// CiudadControlador::prueba();
$sede = SedeControlador::obtenerSede();
return print json_encode($sede);

?>
