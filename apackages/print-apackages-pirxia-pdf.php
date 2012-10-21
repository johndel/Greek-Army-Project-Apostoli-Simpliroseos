<?php 
include("../partials/wrapper-functions.php");
include("../partials/database-connect-old-nice-way.inc.php"); 
require_once('../tcpdf/config/lang/eng.php'); 
require_once('../tcpdf/tcpdf.php');

$base_name = "http://".$_SERVER['SERVER_NAME']."/";

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default header data
// $pdf->SetHeaderData("", "ΔΟΚΙΜΗ");

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
	$subunit = subunit($_GET['subunit']);
   //$pdf->AddPage();

$pinakas_number = 0;
$page_number = 1;

$total_pages = round((mysql_num_rows($materials_no_size) / 9)) + round(mysql_num_rows($materials_size)/2);
while($row = mysql_fetch_assoc($materials_no_size)) {
	$pinakas_number = $pinakas_number + 1;
	$html = $html.file_get_contents($base_name."apackages/pirxia/print/print-apackage-output.php?subunit=".$subunit['id']."&material_id=".$row['id']."&pinakas=".$pinakas_number);

	if(((($pinakas_number+1) % 8) == 0) || ($pinakas_number == mysql_num_rows($materials_no_size)) ) {	
		$html = file_get_contents($base_name."apackages/pirxia/print/start-pdf-page-text.php?subunit=".$subunit['id']."&page=".$page_number).$html.file_get_contents($base_name."apackages/pirxia/print/footer-pdf-text.php?page=".$page_number."&total=".$total_pages);
	// add a page
	$pdf->AddPage();
	$page_number = $page_number+1;
		// Print text using writeHTMLCell()
	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
	$html = "";
	}
}

/*
$size_num = 0;
while($row = mysql_fetch_assoc($materials_size)) {
	$pinakas_number = $pinakas_number + 1;
	$size_num = $size_num + 1;
	if(($size_num % 2) != 0) {	
		$html = file_get_contents("http://localhost/apackages/pirxia/print/start-pdf-page-text.php?page=".$page_number).file_get_contents("http://localhost/apackages/pirxia/print/print-apackage-output.php?material_id=".$row['id']."&pinakas=".$pinakas_number);
	} else {
		$html = $html."<br /><br /><br /><br /><br />".file_get_contents("http://localhost/apackages/pirxia/print/print-apackage-output.php?material_id=".$row['id']."&pinakas=".$pinakas_number).file_get_contents("http://localhost/apackages/pirxia/print/footer-size-pdf-text.php?page=".$page_number."&total=".$total_pages);
		// add a page
		$pdf->AddPage();
		$page_number = $page_number+1;
		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		$html = "";
	}
}
*/

//Close and output PDF document
$pdf->Output('apackages.pdf', 'I');
//============================================================+
// END OF FILE                                                
//============================================================+
