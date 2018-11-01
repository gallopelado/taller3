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
$title = "Reporte Persona por fecha";
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->Cell(140, 10,utf8_decode("Período: ").$fechainicio."   a   ".$fechafin,1,1,"C");
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(10, 6, "Nro", 1, 0, "C", 1);
$pdf->Cell(70, 6, "Persona", 1, 0, "C", 1);
$pdf->Cell(30, 6, "Fecha de ingreso", 1, 0, "C", 1);
$pdf->Cell(30, 6, "Fecha de salida", 1, 1, "C", 1);

try {
    $query = "SELECT hp.hisp_id idhistorico, 
    hp.per_id idpersona,pe.per_nombre||' '||pe.per_apellidop||' '||pe.per_apellidom persona, 
    hp.fechaingreso::date fechaingreso, hp.fechasalida, hp.motivo_salida
    FROM historico_persona hp
    join personas pe on hp.per_id = pe.per_id
    where hp.fechaingreso::date   
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
            $pdf->Cell(70, 6, $rs["persona"], 1, 0, "C");
            $pdf->Cell(30, 6, $rs["fechaingreso"], 1, 0, "C");
            $pdf->Cell(30, 6, $rs["fechasalida"], 1, 1, "C");
        }
        $pdf->Output(); //Si agregamos D se descarga auto, 
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
} finally {
    $cnx = null;
}
?>
