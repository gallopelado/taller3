<?php

include '../../controlador/HistoricoAfilianteControlador.php';
// echo get_include_path();
// echo "<br>".__DIR__;
header('Content-type: application/json');

$id = $_POST["idpersona"];
$requisitos = HistoricoAfilianteControlador::cargaRequisitos($id);

return print json_encode($requisitos);

?>
