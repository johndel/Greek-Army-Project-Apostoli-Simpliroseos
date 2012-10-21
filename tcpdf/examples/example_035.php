<?php
//============================================================+
// File name   : example_035.php
// Begin       : 2008-07-22
// Last Update : 2010-08-08
//
// Description : Example 035 for TCPDF class
//               Line styles with cells and multicells
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               Manor Coach House, Church Hill
//               Aldershot, Hants, GU12 4RQ
//               UK
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Line styles with cells and multicells
 * @author Nicola Asuni
 * @since 2008-03-04
 */

require_once('../config/lang/eng.php');
require_once('../tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);





$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 16);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'Example of SetLineStyle() method', '', 0, 'L', true, 0, false, false, 0);

$pdf->Ln();

$pdf->SetFillColor(255,255,128);
$pdf->SetTextColor(0,0,128);

$text="DUMMY";

$pdf->Cell(0, 0, $text, 1, 1, 'L', 1, 0);

$pdf->Ln();

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

$pdf->MultiCell(30, 5, $text, 1, 'C', 1, 0);
$pdf->MultiCell(30, 5, $text, 0, 'C', 1, 0);
$pdf->MultiCell(30, 5, "sdfdsh", 1, 'C', 0, 0);
$pdf->MultiCell(30, 5, $text, 1, 'C', 1, 0);


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_035.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
