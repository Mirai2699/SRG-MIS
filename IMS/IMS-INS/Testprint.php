<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
	// Logo
	$this->Image('../../Resources/images/PUP/blackline.png',14,30,150);
	$this->Image('../../Resources/images/PUP/QCOSASheader.png',10,10,110);
	// Line break
	$this->Ln(100);

	
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(80);
	
	// Line break
	$this->Ln(20);
}

// Page footer
function Footer()
{   $this->Image('../../Resources/images/PUP/QCOSASheader.png',10,10,110);
	// Position at 1.5 cm from bottom
	$this->SetY(-15);

	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// // Page number
	// $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
	$pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();
?>
