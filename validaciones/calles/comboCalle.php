<?php

include '../../controlador/CalleControlador.php';
// echo get_include_path();
// echo "<br>".__DIR__;
header('Content-type: application/json');

// CiudadControlador::prueba();
$calle = CalleControlador::obtenerTodoCalle();
return print json_encode($calle);

?>
