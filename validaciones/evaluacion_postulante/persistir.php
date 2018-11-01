<?php

include "../../datos/Conexion.php";
//include "../../controlador/PostulacionCandidatoControlador.php";

$data = json_decode($_POST["array"], true);

$cnx = Conexion::conectar(); //inicio de conexion
$afectado;

try {
    $cnx->beginTransaction();
    //insertar cabecera
    $query = "INSERT INTO admitidos_cabecera
    (pos_id, fecha_creacion, estado)
    VALUES(:idpostulacion, (select current_date), 'PROCESADO') RETURNING admicabe_id";
    $resultado = $cnx->prepare($query);
    $idpostulacion = $data["idpostulacion"];
    $resultado->bindParam(":idpostulacion", $idpostulacion);
    if ($resultado->execute()) {
        $idRecuperado = $cnx->lastInsertId();
        //insertar detalle
        $q = "INSERT INTO admitidos_detalle
        (admicabe_id, candi_id)
        VALUES(:admicabe, :idcandidato);";
        $r = $cnx->prepare($q);
        foreach ($data["detalle"] as $value) {
            if ($value["requisito"] === "SI") {
                $idcandidato = $value["idcandidato"];
                $r->bindParam("admicabe", $idRecuperado);
                $r->bindParam(":idcandidato", $idcandidato);
                $afectado = $r->execute();
            }
            
            if ($afectado === false) {
                $cnx->rollBack();
                return false;
            }
        }
    } else {
        $cnx->rollBack();
        return false;
    }
    if ($afectado) {
        $cnx->commit();
    }
    return true;
} catch (Exception $exc) {
    $cnx->rollBack();
    echo $exc->getMessage();
    return false;
} finally {
    $cnx = null;
}


//print_r($data["detalle"]);
//echo var_dump($data);
//echo var_dump($data["detalle"]);
//print_r("idpostulacion " . $data["idpostulacion"] . "\n");
//echo $idpostulacion = $data["idpostulacion"];
//foreach ($data["detalle"] as $value) {
//    print_r("idcandidato =" . $value["idcandidato"] . ", requisito " . $value["requisito"] . "\n");        
//}
?>
