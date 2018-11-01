<?php

include '../../controlador/RegistrarDocumentoControlador.php';

header('Content-type: application/json');

$idpersona = $_POST["idpersona"];
$documentos = RegistrarDocumentoControlador::cargaDocumentos($idpersona);

return print json_encode($documentos);

?>
