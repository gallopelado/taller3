<?php

include '../../controlador/FichaBautismoControlador.php';

header('Content-type: application/json');

$idpersona = $_POST["idpersona"];
$documentos = FichaBautismoControlador::cargaDocumentos($idpersona);

return print json_encode($documentos);

?>
