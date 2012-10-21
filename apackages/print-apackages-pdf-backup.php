<?php 
include("../partials/wrapper-functions.php");
include("../partials/database-connect-old-nice-way.inc.php"); 
require_once('../tcpdf/config/lang/eng.php'); 
require_once('../tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default header data
// $pdf->SetHeaderData("", "дойилг");

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 9, '', true);

// set some text to print
   //$tmp_pages = select_all_packages();
   $materials_no_size = select_a_materials_no_size();
   $materials_size = select_a_materials_size();


while($row = mysql_fetch_assoc($materials_no_size)) {
	$html = file_get_contents("http://localhost/apackages/print-apackage-output.php?material_id=".$row['id']);
		// add a page
	$pdf->AddPage();
		// Print text using writeHTMLCell()
	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
}

while($row = mysql_fetch_assoc($materials_size)) {
	$html = file_get_contents("http://localhost/apackages/print-apackage-output.php?material_id=".$row['id']);
		// add a page
	$pdf->AddPage();
		// Print text using writeHTMLCell()
	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
}


//Close and output PDF document
$pdf->Output('apackages.pdf', 'I');
//============================================================+
// END OF FILE                                                
//============================================================+
