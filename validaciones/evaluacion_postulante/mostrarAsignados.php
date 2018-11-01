<?php

include '../../controlador/PostulacionCandidatoControlador.php';

header('Content-type: application/json');

$id = $_POST["id"];
//echo "PHP recibio ".$id;
$lista = PostulacionCandidatoControlador::getListaAsignados($id);

return print json_encode($lista);

?>
