<?php

include '../../controlador/PostulacionCandidatoControlador.php';

header('Content-type: application/json');

//Ejecutar el control de fechas
//echo "PHP ".$hola = $_POST["i"];
return PostulacionCandidatoControlador::analizaFecha();



?>
