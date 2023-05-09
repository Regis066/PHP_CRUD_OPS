<?php
ob_start();
require_once "connection.php";
require_once "fpdf/fpdf.php";
$result = "SELECT * FROM clients ORDER BY id";
$sql = $conne->query($result);

$pdf = new FPDF(); 
$pdf->AddPage(); 
$pdf->SetFont('Arial','B',12); 

while ($row = $sql->fetch_object()) { 
  $id = $row->id;
  $name = $row->name;
  $phone = $row->phone;  
  $email = $row->email;
  $address = $row->address;

  $pdf->Cell(20,10,$id,1);
  $pdf->Cell(40,10,$name,1);
  $pdf->Cell(40,10,$phone,1);
  $pdf->Cell(80,10,$email,1);
  $pdf->Cell(40,10,$address,1); 
  $pdf->Ln();
} 

ob_end_clean();
$pdf->Output();
exit(); 
?>
