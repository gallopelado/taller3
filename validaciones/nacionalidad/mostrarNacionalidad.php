<?php

include '../../controlador/NacionalidadControlador.php';
// echo get_include_path();
// echo "<br>".__DIR__;
header('Content-type: application/json');

// CiudadControlador::prueba();
$nacionalidad = NacionalidadControlador::obtenerNacionalidad();
return print json_encode($nacionalidad);

?>
