<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php";
include DAO_PATH . "Conexion.php";

$cnx = Conexion::conectar();

try {
    $query = "REINDEX DATABASE iglesia_iec;";

    $resultado = $cnx->prepare($query);    
    $resultado->execute(); 
    
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
} finally {
    $cnx = null;
}