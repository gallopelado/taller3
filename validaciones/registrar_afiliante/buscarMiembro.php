<?php

include '../../controlador/AfilianteControlador.php';

header('Content-type: application/json');

$idmiembro = $_POST["idmiembro"];
//echo "desde php ".$idmiembro;
$lista = AfilianteControlador::buscarMiembro($idmiembro);
//
return print json_encode($lista);

?>
