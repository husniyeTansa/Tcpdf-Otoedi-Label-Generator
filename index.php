<?php
//include library
include('TCPDF-main/tcpdf.php');
//include('TCPDF-main/examples/barcodes/tcpdf_barcodes_1d_include.php');
//include('TCPDF-main/examples/barcodes/tcpdf_barcodes_2d_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 027', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set a barcode on the page footer
$pdf->setBarcode(date('Y-m-d H:i:s'));

// set font
$pdf->SetFont('helvetica', '', 11);

// -----------------------------------------------------------------------------

// add a page
/*$pdf->AddPage();

// define barcode style
$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
);

// PRINT VARIOUS 1D BARCODES

for($i=0; $i<1; $i++){
	// CODE 128 AUTO
	$pdf->Cell(0, 0, 'CODE 128 AUTO', 0, 1);
	$pdf->write1DBarcode('CODE 128 AUTO', 'C128', '', '', '', 18, 0.4, $style, 'N');
}

// -------------------------------------------------------------------

// PDF417 (ISO/IEC 15438:2006)

for($i=0; $i<1; $i++){

	// add a page
	$pdf->AddPage();

	$pdf->write2DBarcode('www.tcpdf.org', 'PDF417', 80, 90, 0, 30, $style, 'N');
	$pdf->Text(80, 85, 'PDF417 (ISO/IEC 15438:2006)');

}
*/
// -------------------------------------------------------------------

// add a page
$pdf->AddPage();

// define barcode style
$style = array(
    'position' => '',
    'align' => '',
    'stretch' => true,
    'fitwidth' => false,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,128),
    'bgcolor' => array(255,255,128),
    'text' => true,
    'label' => 'CUSTOM LABEL',
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);

// CODE 39 EXTENDED + CHECKSUM
$pdf->Cell(0, 0, 'CODE 39 EXTENDED + CHECKSUM', 0, 1);
$pdf->SetLineStyle(array('width' => 1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0)));
$pdf->write1DBarcode('CODE 39 E+', 'C39E+', '', '', 120, 25, 0.4, $style, 'N');

// CODE 39 EXTENDED + CHECKSUM
//$pdf->Cell(0, 0, 'CODE 39 EXTENDED + CHECKSUM', 0, 1);
$pdf->SetLineStyle(array('width' => 1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0)));
$pdf->Text(80, 85, 'PDF417 (ISO/IEC 15438:2006)');

// CODE 39 EXTENDED + CHECKSUM
$pdf->Cell(0, 0, 'CODE 39 EXTENDED + CHECKSUM', 0, 1);
$pdf->SetLineStyle(array('width' => 1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0)));
$pdf->write1DBarcode('CODE 39 E+', 'C39E+', '', '', 120, 25, 0.4, $style, 'N');

//Close and output PDF document
$pdf->Output();

//============================================================+
// END OF FILE
//============================================================+