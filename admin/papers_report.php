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
$pdf->Cell(0,10,'Newspaper',0,1,"");
$pdf->SetFont('Arial','',12);
$pdf->Cell(10,8,'No.',1);
$pdf->Cell(36,8,'Vendor Name',1);
$pdf->Cell(36,8,'Paper name',1);
$pdf->Cell(80,8,'Paper Headline',1);


$statement = $pdo->prepare("SELECT newspapers.*,vendor.vendor_name  FROM newspapers INNER JOIN vendor ON vendor.vendor_id=newspapers.newspapers_vendor_id");
$statement->execute();
$papers = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($papers as$i=>$paper){
    $no=$i+1;
	$pdf->Ln(8);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(10,8,$no,1);
    $pdf->Cell(36,8,$paper['vendor_name'],1);
	$pdf->Cell(36,8,$paper['newspapers_Name'],1);
	$pdf->Cell(80,8,$paper['newspapers_Headline'],1);
}
$pdf->Output();
?>