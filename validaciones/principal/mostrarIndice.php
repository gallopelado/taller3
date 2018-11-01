<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php";
include DAO_PATH . "Conexion.php";

$cnx = Conexion::conectar();

try {
    $query = "SELECT 
    nspname AS schemaname,relname,reltuples::integer 
    FROM pg_class C 
    LEFT JOIN pg_namespace N ON (N.oid = C.relnamespace) 
    WHERE 
    nspname NOT IN ('pg_catalog', 'information_schema') AND 
    relkind='r' 
    ORDER BY reltuples desc";

    $resultado = $cnx->prepare($query);    
    $resultado->execute();
    
    if($resultado) {
        while($rs = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $data["data"][] = $rs;
        }
        echo json_encode($data);
    } 
    
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
} finally {
    $cnx = null;
}