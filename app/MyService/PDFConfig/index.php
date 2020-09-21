<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require('FPDI/vendor/setasign/fpdf/fpdf.php');
require_once('FPDI/vendor/setasign/fpdi/src/autoload.php');


$cName      = strtoupper("White Web Infotech");
        $orderData  = [
            "price_line"    => "COD : Rs. 500.00",
            "order_id"      => "ORDER ID : #235",
            "pin_code"      => "395006",
            "customer_name" => strtoupper("Dhameliya Savan"),
            "mobile_no"     => "8469036235",
            "a_mobile_no"   => "8469036235"
        ];


        $height=150; // Height of Current Page
        $width=148; // Width of Current Page
        $pdf = new FPDF('P','mm',[$width,$height]); // paper size

        /******  CREATE NEW PAGE & SET FONT SIZE *******/
        $pdf->AddPage(); // create new page
        $pdf->SetFont('Arial','B',20); /*set font to arial, bold, 14pt*/
        $pdf->SetDrawColor(001);

        /******  PAGE BORDER *******/
        $edge=1.5; // Gap between line and border , change this value
        $pdf->SetLineWidth(0.5); // width
        $pdf->Line($edge, $edge,$width-$edge,$edge); // Horizontal line at top
        $pdf->Line($edge, $height-$edge,$width-$edge,$height-$edge); // Horizontal line at bottom
        $pdf->Line($edge, $edge,$edge,$height-$edge); // Vetical line at left
        $pdf->Line($width-$edge, $edge,$width-$edge,$height-$edge); // Vetical line at Right


        /******  DRAW DASH LINE NO : 1 *******/
        $CDLINE = 15;
        $pdf->SetLineWidth(0.5); // width
        // left- padding , top-left-point(start height point), width, top-right-point(end height point)
        $pdf->Line(1.5,$CDLINE,$width-1.8,$CDLINE);

        /******  DRAW DASH LINE NO : 2 *******/
        $FDD_LINE = 30;
        $pdf->SetLineWidth(0.2);
        $pdf->SetDash(1,1); // dash size, dash gap size
        $pdf->Line(1.5,$FDD_LINE,$width-1.8,$FDD_LINE);

        /******  DRAW DASH LINE NO : 3 *******/
        $SDD_LINE = 40;
        $pdf->Line(1.5,$SDD_LINE,$width-1.8,$SDD_LINE);

        /******  DRAW NORMAL LINE NO : 1 *******/
        $FDN_LINE = 90;
        $pdf->Line(1.5, $FDN_LINE,$width-1.4, $FDN_LINE);

        /******  DRAW NORMAL LINE NO : 2 *******/
        $SDN_LINE = 110;
        $pdf->Line(1.5, $SDN_LINE,$width-1.4, $SDN_LINE);

        /******  DRAW NORMAL LINE NO : 3 *******/
        $TDN_LINE = 130;
        // $pdf->SetLineWidth(0.3);
        $pdf->Line(1.5, $TDN_LINE,$width-1.4, $TDN_LINE);

        /******  DRAW NORMAL LINE NO : 4 *******/
        $pdf->Line(73, 130,73,140);

        /******  DRAW NORMAL LINE NO : 5 *******/
        $pdf->Line(102, 80,102,90);

        /******  DRAW NORMAL LINE NO : 6*******/
        $FDN_LINE = 80;
        $pdf->Line(102, $FDN_LINE,$width-1.4, $FDN_LINE);

        /******  DRAW NORMAL LINE NO : 7 *******/
        $TDN_LINE = 140;
        $pdf->Line(1.5, $TDN_LINE,$width-1.4, $TDN_LINE);

        // $pdf->SetXY(5, 8);
        // $pdf->Write(1,$cName);

        $pdf->SetFont('Arial','B',14);
        $pdf->MultiCell(0,-3, $cName , $border=0, $align='C', $fill=false);

        $pdf->SetFont('Arial','B',16);
        $pdf->MultiCell(0,33, $orderData['price_line'] , $border=0, $align='R', $fill=false);
        $pdf->SetFont('Arial','',12);
        $pdf->Text(5,36.5,$orderData['order_id']);
        $pdf->Text(5,46,$orderData['customer_name']);
        $pdf->SetFont('Arial','B',12);
        $pdf->Text(115,86.5,$orderData['pin_code']);
        $pdf->SetFont('Arial','',8.6);
        $pdf->Text(5,52,"ADDRESS");
        $pdf->Text(5,95,"NEAR BY LANDMARK");
        $pdf->Text(5,115,"NEAR BY STREET");

        $pdf->SetFont('Arial','B',12);
        $pdf->Text(5,136.3,"8469036235");
        $pdf->Text(76,136.3,"8469036235");

        $pdf->SetFont('Arial','',10);
        $pdf->Text(5,145.3,"PRODUCT : 2548,26598,7821");

        $pdf->Output();


// Output our new pdf into a file
// F = Write local file
// I = Send to standard output (browser)
// D = Download file
// S = Return PDF as a string



// use setasign\Fpdi\Fpdi;
// use setasign\Fpdi\PdfReader;

// require('vendor/setasign/fpdf/fpdf.php');
// require_once('vendor/setasign/fpdi/src/autoload.php');

// $pdf = new Fpdi();
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell(40,10,'Hello World!');
// $pdf->Output();

// $pagecount = $pdf->setSourceFile("../x1.pdf");
// for($i=0; $i<$pagecount; $i++){
//     $pdf->AddPage();
//     $tplidx = $pdf->importPage($i+1, '/MediaBox');
//     $pdf->useTemplate($tplidx, 10, 10, 200);
// }

// $pagecount = $pdf->setSourceFile("../x2.pdf");
// for($i=0; $i<$pagecount; $i++){
//     $pdf->AddPage();
//     $tplidx = $pdf->importPage($i+1, '/MediaBox');
//     $pdf->useTemplate($tplidx, 10, 10, 200);
// }

// $pdf->Output();

// $pdf->SetDrawColor(000);
        // $pdf->DashedRect(5,0,$width,0);
        // $pdf->SetDash(5,5); //5mm on, 5mm off
        // $pdf->Line(5,0,$width,0);
        // $pdf->SetLineWidth(0.5);
        // $pdf->Line(20,25,190,25);
        // $pdf->SetLineWidth(0.8);
        // $pdf->SetDash(4,2); //4mm on, 2mm off
        // $pdf->Rect(20,30,170,20);
        // $pdf->SetDash(); //restores no dash
        // $pdf->Line(20,55,190,55);

        // $pdf->Cell(71 ,10,'',0,0);
        // $pdf->Cell(59 ,5,'Invoice',0,0);
        // $pdf->Cell(59 ,10,'',0,1);



        // $pdf->SetFont('Arial','',10);

        // $pdf->Cell(130 ,5,'Near DAV',0,0);
        // $pdf->Cell(25 ,5,'Customer ID:',0,0);
        // $pdf->Cell(34 ,5,'0012',0,1);

        // $pdf->Cell(130 ,5,'Delhi, 751001',0,0);
        // $pdf->Cell(25 ,5,'Invoice Date:',0,0);
        // $pdf->Cell(34 ,5,'12th Jan 2019',0,1);

        // $pdf->Cell(130 ,5,'',0,0);
        // $pdf->Cell(25 ,5,'Invoice No:',0,0);
        // $pdf->Cell(34 ,5,'ORD001',0,1);


        // $pdf->SetFont('Arial','B',15);
        // $pdf->Cell(130 ,5,'Bill To',0,0);
        // $pdf->Cell(59 ,5,'',0,0);
        // $pdf->SetFont('Arial','B',10);
        // $pdf->Cell(189 ,10,'',0,1);



        // $pdf->Cell(50 ,10,'',0,1);

        // $pdf->SetFont('Arial','B',10);
        // /*Heading Of the table*/
        // $pdf->Cell(10 ,6,'Sl',1,0,'C');
        // $pdf->Cell(80 ,6,'Description',1,0,'C');
        // $pdf->Cell(23 ,6,'Qty',1,0,'C');
        // $pdf->Cell(30 ,6,'Unit Price',1,0,'C');
        // $pdf->Cell(20 ,6,'Sales Tax',1,0,'C');
        // $pdf->Cell(25 ,6,'Total',1,1,'C');/*end of line*/
        // /*Heading Of the table end*/
        // $pdf->SetFont('Arial','',10);
        //     for ($i = 0; $i <= 10; $i++) {
        //         $pdf->Cell(10 ,6,$i,1,0);
        //         $pdf->Cell(80 ,6,'HP Laptop',1,0);
        //         $pdf->Cell(23 ,6,'1',1,0,'R');
        //         $pdf->Cell(30 ,6,'15000.00',1,0,'R');
        //         $pdf->Cell(20 ,6,'100.00',1,0,'R');
        //         $pdf->Cell(25 ,6,'15100.00',1,1,'R');
        //     }


        // $pdf->Cell(118 ,6,'',0,0);
        // $pdf->Cell(25 ,6,'Subtotal',0,0);
        // $pdf->Cell(45 ,6,'151000.00',1,1,'R');
// $pdf->SetFont('Arial','',13);
        // $pdf->SetXY(5, 19.5);
        // $pdf->Write(1,$orderData['price_line']);

        // $pdf->SetFont('Arial','B',13);
        // $pdf->SetXY(5, 30);
        // $pdf->Write(1,$orderData['order_id']);

        // $pdf->SetFont('Arial','B',14);
        // $pdf->SetXY(4, 85.5);
        // // $pdf->Write(0,$orderData['pin_code']);
        // $pdf->Cell( 129, 0, $orderData['pin_code'], 0, 0, 'R' );

        // $pdf->SetFont('Arial','B',13);
        // $pdf->SetXY(4, 40);
        // $pdf->Write(1,$orderData['customer_name']);


        // $pdf->SetFont('Arial','',10);

        // $pdf->SetXY(4, 47);
        // $pdf->Write(1,"ADDRESS");

        // $pdf->SetXY(4, 94);
        // $pdf->Write(1,"NEAR BY LANDMARK");

        // $pdf->SetXY(4, 114);
        // $pdf->Write(1,"NEAR BY STREET");

        // // $pdf->SetXY(4, 0);
        // $pdf->Cell(10,120,'Title',0,0,'C');
