<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php";
include DAO_PATH . "Conexion.php";
//include PDF ."fpdf/fpdf.php";
include PDF . "plantilla.php";

$cnx = Conexion::conectar();
//$fechainicio = "2018-01-01";
//$fechafin = "2018-06-30";
$fechainicio = $_GET["txtinicio"];
$fechafin = $_GET["txtfin"];
$cont = 0;
$pdf = new PDF();
$pdf->SetTitle("Reporte");
$title = "Reporte Miembros por fecha";
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->Cell(140, 10,utf8_decode("Período: ").$fechainicio."   a   ".$fechafin,1,1,"C");
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(10, 6, "Nro", 1, 0, "C", 1);
$pdf->Cell(70, 6, "Miembro", 1, 0, "C", 1);
$pdf->Cell(30, 6, "Fecha", 1, 0, "C", 1);
$pdf->Cell(30, 6, "Salida", 1, 1, "C", 1);

try {
    $query = "SELECT mi.mie_id, mi.per_id, pe.per_nombre||' '||pe.per_apellidop||' '||pe.per_apellidom miembro,
    mi.razon_admi, mi.clasi_social, mi.est_membresia, mi.fecha_converso, mi.fechainicio_membresia, 
    mi.padres_miembro, mi.asistia_otra_iglesia, mi.otra_iglesia, mi.iniciador_id, forma_contacto, esmiembroconyuge, 
    conyuge_id, nrohijos, observacion, mie_fechasalida::date
    FROM miembros mi 
    join personas pe on mi.per_id = pe.per_id
    where mi.fechainicio_membresia   
    between :fechainicio and :fechafin";

    $resultado = $cnx->prepare($query);
    $resultado->bindParam(":fechainicio", $fechainicio);
    $resultado->bindParam(":fechafin", $fechafin);
    $resultado->execute();

    if ($resultado) {
        $pdf->SetFont("Arial", "", 10);
        while ($rs = $resultado->fetch(PDO::FETCH_ASSOC)) {
//            echo $rs["ciu_cod"]." ".$rs["ciu_descri"]."<br>";
            $cont++;
            $pdf->Cell(10, 6, $cont, 1, 0, "C");
            $pdf->Cell(70, 6, $rs["miembro"], 1, 0, "C");
            $pdf->Cell(30, 6, $rs["fechainicio_membresia"], 1, 0, "C");
            $pdf->Cell(30, 6, $rs["mie_fechasalida"], 1, 1, "C");
        }
        $pdf->Output(); //Si agregamos D se descarga auto, 
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
} finally {
    $cnx = null;
}
?>
