<?php 
set_time_limit(0);

include("../partials/wrapper-functions.php");
include("../partials/database-connect-old-nice-way.inc.php"); 
require_once('../tcpdf/config/lang/eng.php'); 
require_once('../tcpdf/tcpdf.php');

$base_name = "http://".$_SERVER['SERVER_NAME']."/";

/*
class mypdf extends TCPDF {
	public function Footer() {
		$number_of_pages = $this->getAliasNbPages();
	}
}
*/

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
$tmp_pages = select_all_packages();
$range = min_max_package();
//$pages = floor(1000 / 7) + 1;
$pages = ceil($range['maximum'] / 7);
$check_seven = 0;
$page = 0;
//for($tmp_page_count = 0; $tmp_page_count < ($pages); $tmp_page_count++) {
$html = file_get_contents($base_name."general/print-body.php");
for($tmp_count = $range['minimum']; $tmp_count <= $range['maximum']; $tmp_count++) {
	$html = $html.file_get_contents($base_name."general/print-book-output2.php?start_id=".$tmp_count);
	$check_seven = $check_seven + 1;
	if($check_seven == 7) {
		$check_seven = 0;
		$page = $page + 1;
		$html = $html."</table><div style='text-align: right;'>ΣΕΛΙΔΑ ".$page." ΑΠΟ ".$pages."</div>";
		// add a page
		$pdf->AddPage();
		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		$html = file_get_contents($base_name."general/print-body.php");
	}
	
	if(($tmp_count == $range['maximum']) && ($check_seven != 0)) {
		$html = $html."</table><div style='text-align: right;'>ΣΕΛΙΔΑ ".$pages." ΑΠΟ ".$pages."</div>";
		// add a page
		$pdf->AddPage();
		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
		$html = "";
	}
}



//Close and output PDF document
$pdf->Output('book_package.pdf', 'I');
//============================================================+
// END OF FILE                                                
//============================================================+
