<?php

include '../../controlador/MinisterioControlador.php';
// echo get_include_path();
// echo "<br>".__DIR__;
header('Content-type: application/json');

// CiudadControlador::prueba();
$ministerio = MinisterioControlador::obtenerMinisterio();
return print json_encode($ministerio);

?>
