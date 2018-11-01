<?php

include '../../controlador/ProfesionControlador.php';

header('Content-type: application/json');

// CiudadControlador::prueba();
$profesion = ProfesionControlador::obtenerAllProfesion();
return print json_encode($profesion);

?>
