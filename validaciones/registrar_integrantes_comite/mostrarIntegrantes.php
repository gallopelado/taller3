<?php

include '../../controlador/IntegranteComiteControlador.php';

header('Content-type: application/json');

$idcomitecab = $_POST["idcomitecab"];
$lista = IntegranteComiteControlador::getListaIntegrantesComite($idcomitecab);

return print json_encode($lista);

?>