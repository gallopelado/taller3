<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php"; 
require PDF ."fpdf/fpdf.php"; //Rutas del orto con php
//require "fpdf/fpdf.php";

class PDF extends FPDF {
    
    function Header() {
        global $title;
        $this->Image(PDF."logo.jpg", 5, 4, 30);
        $this->SetFont("Arial", "B", 15);
        $this->Cell(30);
        $this->Cell(120, 10, $title, 0, 0, "C");
        
        $this->Ln(20);
    }
    
    function Footer() {
        $this->SetY(-15);
        $this->SetFont("Arial", "I", 8);
        $this->Cell(0, 10, "Pagina ".$this->PageNo()."/{nb}", 0, 0, "C");
    }
}

?>
