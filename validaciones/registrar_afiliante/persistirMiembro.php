<?php

include "../../controlador/AfilianteControlador.php";

$op = AfilianteControlador::analizarNulos($_POST["op"]);
$idmiembro = AfilianteControlador::analizarNulos($_POST["idmiembro"]);
$idpersona = AfilianteControlador::analizarNulos($_POST["idpersona"]);
$razon_admision = AfilianteControlador::analizarNulos($_POST["razonalta"]);
$clase_social = AfilianteControlador::analizarNulos($_POST["clasificacionsocial"]);
$estado_membresia = AfilianteControlador::analizarNulos($_POST["estadomembresia"]);
$fecha_converso = AfilianteControlador::analizarNulos($_POST["fechaconversion"]);
$padres_miembros = AfilianteControlador::analizarNulos($_POST["padresmiembros"]);
$asistia_otra_iglesia = AfilianteControlador::analizarNulos($_POST["asistiaotraiglesia"]);
$otra_iglesia = AfilianteControlador::analizarNulos($_POST["otraiglesia"]);
$idiniciador = AfilianteControlador::analizarNulos($_POST["idiniciador"]);
$forma_contacto = AfilianteControlador::analizarNulos($_POST["formacontacto"]);
$es_miembro_conyuge = AfilianteControlador::analizarNulos($_POST["conyugemiembro"]);
$idconyuge = AfilianteControlador::analizarNulos($_POST["idconyuge"]);
$nrohijos = AfilianteControlador::analizarNulos($_POST["numerohijos"]);
$observacion = AfilianteControlador::analizarNulos($_POST["observacion"]);
$miefechasalida = null;

//echo $op."\n";
//echo $idmiembro."\n";
//echo $idpersona."\n";
//echo $razon_admision."\n";
//echo $clase_social."\n";
//echo $estado_membresia."\n";
//echo $fecha_converso."\n";
//echo $padres_miembros."\n";
//echo $asistia_otra_iglesia."\n";
//echo $otra_iglesia."\n";
//echo $idiniciador."\n";
//echo $forma_contacto."\n";
//echo $es_miembro_conyuge."\n";
//echo $idconyuge."\n";
//echo $nrohijos."\n";
//echo $observacion."\n";
//echo $miefechasalida."\n";

if ($rs = AfilianteControlador::persistir($op, $idmiembro, $idpersona, $razon_admision, $clase_social, $estado_membresia, $fecha_converso, $padres_miembros, $asistia_otra_iglesia, $otra_iglesia, $idiniciador, $forma_contacto, $es_miembro_conyuge, $idconyuge, $nrohijos, $observacion, $miefechasalida)) {
    echo json_encode($rs);
} else {
    return json_encode($rs);
}
?>
