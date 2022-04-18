<?php
require('../fpdf/fpdf.php');
include('../engine/dbh.inc.php');

//$mysqli = new mysqli('localhost', 'root', '', 'registration');

$pdf = new FPDF();
///var_dump(get_class_methods($pdf));

$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,10,'Date:'.date('d-m-Y').'',0,"R");
$pdf->Ln(15);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Vendors',0,1,"");
$pdf->SetFont('Arial','',12);
$pdf->Cell(10,8,'No.',1);
$pdf->Cell(36,8,'vendor name',1);
$pdf->Cell(36,8,'vendor mobile no',1);
$pdf->Cell(50,8,'vendor email',1);
$pdf->Cell(33,8,'vendor Location',1);

$statement = $pdo->prepare("SELECT vendor.*,area.Area_name  FROM vendor INNER JOIN area ON area.Area_id=vendor.location");
$statement->execute();
$vendors = $statement->fetchAll(PDO::FETCH_ASSOC);
$no=0;
foreach($vendors as $vendor){
    $no=$no+1;
	$pdf->Ln(8);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(10,8,$no,1);
	$pdf->Cell(36,8,$vendor['vendor_name'],1);
	$pdf->Cell(36,8,$vendor['vendor_mobile_no'],1);
	$pdf->Cell(50,8,$vendor['vendor_email'],1);
    $pdf->Cell(33,8,$vendor['Area_name'],1);
}
$pdf->Output();
?>