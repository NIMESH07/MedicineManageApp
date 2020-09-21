<?php

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require('vendor/setasign/fpdf/fpdf.php');
require_once('vendor/setasign/fpdi/src/autoload.php');

$pdf = new Fpdi();
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell(40,10,'Hello World!');
// $pdf->Output();

$pagecount = $pdf->setSourceFile("../x1.pdf");  
for($i=0; $i<$pagecount; $i++){
    $pdf->AddPage();  
    $tplidx = $pdf->importPage($i+1, '/MediaBox');
    $pdf->useTemplate($tplidx, 10, 10, 200); 
}

$pagecount = $pdf->setSourceFile("../x2.pdf");  
for($i=0; $i<$pagecount; $i++){
    $pdf->AddPage();  
    $tplidx = $pdf->importPage($i+1, '/MediaBox');
    $pdf->useTemplate($tplidx, 10, 10, 200); 
}

$pdf->Output();
?>
