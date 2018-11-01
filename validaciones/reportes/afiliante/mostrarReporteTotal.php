<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php"; 
include DAO_PATH ."Conexion.php";
//include PDF ."fpdf/fpdf.php";
include PDF ."plantilla.php";

$cnx = Conexion::conectar();
$cont = 0;
$pdf = new PDF();
$pdf->SetTitle("Reporte");
$title ="Reporte Total Miembros";
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont("Arial", "B", 15);
$pdf->Cell(20, 6, "Nro", 1, 0, "C", 1);
$pdf->Cell(70, 6, "Miembro", 1, 0, "C", 1);
$pdf->Cell(50, 6, "Estado", 1, 0, "C", 1);
$pdf->Cell(20, 6, "Fecha", 1, 0, "C", 1);
$pdf->Cell(20, 6, "Salida", 1, 1, "C", 1);

try {
    $query = "SELECT mi.mie_id, mi.per_id, pe.per_nombre||' '||pe.per_apellidop||' '||pe.per_apellidom miembro,
    mi.razon_admi, mi.clasi_social, mi.est_membresia, mi.fecha_converso, mi.fechainicio_membresia, 
    mi.padres_miembro, mi.asistia_otra_iglesia, mi.otra_iglesia, mi.iniciador_id, forma_contacto, esmiembroconyuge, 
    conyuge_id, nrohijos, observacion, mie_fechasalida::date
    FROM miembros mi 
    join personas pe on mi.per_id = pe.per_id;";

    $resultado = $cnx->prepare($query);
    $resultado->execute();
    
    if ($resultado) {
        $pdf->SetFont("Arial", "", 10);
        while ($rs = $resultado->fetch(PDO::FETCH_ASSOC)) {
//            echo $rs["ciu_cod"]." ".$rs["ciu_descri"]."<br>";
            $cont++;
            $pdf->Cell(20, 6, $cont, 1, 0, "C");
            $pdf->Cell(70, 6, $rs["miembro"], 1, 0, "C");
            $pdf->Cell(50, 6, $rs["est_membresia"], 1, 0, "C");
            $pdf->Cell(20, 6, $rs["fechainicio_membresia"], 1, 0, "C");
            $pdf->Cell(20, 6, $rs["mie_fechasalida"], 1, 1, "C");
        }
        $pdf->Output();//Si agregamos D se descarga auto, 
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
} finally {
    $cnx = null;
}

?>
