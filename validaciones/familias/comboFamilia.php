<?php

include '../../controlador/FamiliaControlador.php';
// echo get_include_path();
// echo "<br>".__DIR__;
header('Content-type: application/json');

// CiudadControlador::prueba();
$familia = FamiliaControlador::obtenerAllFamilia();
return print json_encode($familia);

?>
