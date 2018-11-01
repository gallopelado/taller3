<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php"; 
include DAO_PATH ."Conexion.php";
//include PDF ."fpdf/fpdf.php";
include PDF ."plantilla.php";

$cnx = Conexion::conectar();
$cont = 0;
$pdf = new PDF();
$pdf->SetTitle("Reporte");
$title ="Reporte Total Personas Registradas";
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont("Arial", "B", 15);
$pdf->Cell(20, 6, "Nro", 1, 0, "C", 1);
$pdf->Cell(150, 6, "Persona", 1, 1, "C", 1);

try {
    $query = "SELECT id, nombres, apellidop, apellidom, sexo, ci, fechanac, ecivil,
        estadopersonal, idciudad, ciudad, idnac, nacionalidad, idbarrio, barrio, idcalle,
        calle, email, idprofesion, profesion, idfamilia, familia, relacionfamiliar,
        lugarnacimiento, lugarestudio, puesto, tiposangre, alergia, capacidades, codigopostal
        FROM public.v_todo_personas";

    $resultado = $cnx->prepare($query);
    $resultado->execute();
    
    if ($resultado) {
        $pdf->SetFont("Arial", "", 10);
        while ($rs = $resultado->fetch(PDO::FETCH_ASSOC)) {
//            echo $rs["ciu_cod"]." ".$rs["ciu_descri"]."<br>";
            $cont++;
            $pdf->Cell(20, 6, $cont, 1, 0, "C");
            $pdf->Cell(150, 6, $rs["nombres"]." ".$rs["apellidop"]." ".$rs["apellidom"], 1, 1, "C");
        }
        $pdf->Output();//Si agregamos D se descarga auto, 
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
} finally {
    $cnx = null;
}

?>
