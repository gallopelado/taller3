<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php";
include CONTROLADOR_PATH . "PermisoControlador.php";

header('Content-type: application/json');

//$lista["data"] = [];
//if(isset($_POST["idgrupo"])) {
    $idgrupo = $_POST["idgrupo"];
    $lista = PermisoControlador::getPermisos($idgrupo);
    return print json_encode($lista);
//} else {
//    return print json_encode($lista["data"] = ["vacio"]);
//}

