<?php


// Include the main TCPDF library (search for installation path).
require_once('TCPDF-main/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf2 = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 027');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');


$pdf->setPrintHeader(false); // do not need header
$pdf->setPrintFooter(false); // do not need footer

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 027', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set a barcode on the page footer
$pdf->setBarcode(date('Y-m-d H:i:s'));

// set font
$pdf->SetFont('helvetica', '', 11);

// add a page
$pdf->AddPage('P', 'A4');
// $pdf->Cell(0, 0, 'A5 LANDSCAPE', 1, 1, 'C');

// print a message
// $txt = "You can also export 1D barcodes in other formats (PNG, SVG, HTML). Check the examples inside the barcodes directory.\n";
// $pdf->MultiCell(70, 50, $txt, 0, 'J', false, 1, 125, 30, true, 0, false, true, 0, 'T', false);
//$pdf->SetY(30);

// -----------------------------------------------------------------------------

$pdf->SetFont('helvetica', '', 10);

// define barcode style
$style = array(
    'position' => '',
    'align' => 'L',
    'stretch' => false,
    //'fitwidth' => true,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    //'fontsize' => 8,
    //'stretchtext' => 4
);

$style2 = array(
    'border' => false,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

// PRINT VARIOUS 1D BARCODES

// CODE 128 AUTO
//$pdf->Cell

$html = '<b style="font-size:9px;">SUPP (V) Plascam</b>';
$pdf->SetY(8.5);
$pdf->SetX(11.4);
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<b style="font-size:52px;">DP9JA</b>';
$pdf->SetY(8.5);
$pdf->SetX(95);
$pdf->writeHTML($html, true, false, true, false, '');


//$pdf->Cell(0, 0, 'SUPP (V) Plascam', 1, 0);
$pdf->write1DBarcode('VDP9JA', 'C128', 11.4, 11.5, 53.9, 13.5, 0.4, $style, 'N'); // 9.5 * 1.41 = 13.5
//$pdf->write1DBarcode()

$pdf->writeHTML('<hr style="width:75%;text-align:left;margin-left:0">', true, false, true, false, '');
$pdf->write2DBarcode('[)>A06AP  NT1B  17A950AB5YZ9  AQ432AVDP9JAAD20230301A8V0145AA1L3HAM19031ALVMAN923222Z109AAABCTN', 'PDF417', 150, 12, 0, 0, $style2, 'N');

$html = '<b style="font-size:9px;">QTY (Q)</b>';
$pdf->SetY(26);
$pdf->SetX(11.4);
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<b style="font-size:52px;">54</b>';
$pdf->SetY(22);
$pdf->SetX(65);
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<b style="font-size:14px;">PCE</b>';
$pdf->SetY(40);
$pdf->SetX(72);
$pdf->writeHTML($html, true, false, true, false, '');


//$pdf->Cell(0, 0, 'QTY (Q) 432 PCE', 0, 1);
$pdf->write1DBarcode('Q432', 'C128', 11.4, '', '', 13.5, 0.4, $style, 'N');

$straightLineStyle = array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
$pdf->Line(85, 25, 85, 58, $straightLineStyle); // vertical line


$html = '<b style="font-size:9px;">CONTAINER</b>';
$pdf->SetY(26);
$pdf->SetX(86);
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<b style="font-size:18px;">IMC 100</b>';
$pdf->SetY(29);
$pdf->SetX(86);
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<b style="font-size:9px;">GROSS WGT</b>';
$pdf->SetY(36);
$pdf->SetX(86);
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<b style="font-size:18px;">14 KG</b>';
$pdf->SetY(40);
$pdf->SetX(86);
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<b style="font-size:9px;">DATE</b>';
$pdf->SetY(48);
$pdf->SetX(86);
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<b style="font-size:18px;">01MAR2023</b>';
$pdf->SetY(52);
$pdf->SetX(86);
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->writeHTML('<hr style="width:100%;text-align:left;margin-left:0">', true, false, true, false, '');


$html = '<b style="font-size:48px;">NT1B 17A950AB5YZ9</b>';
$pdf->SetY(60);
$pdf->SetX(25);
$pdf->writeHTML($html, true, false, true, false, '');


$html = '<b style="font-size:9px;">PART (P)</b>';
$pdf->SetY(80);
$pdf->SetX(11.4);
$pdf->writeHTML($html, true, false, true, false, '');


$pdf->write1DBarcode('NT1B 17A950AB5YZ9', 'C128', 20, 74, 160, 20, 1, $style, 'N');


$pdf->writeHTML('<hr style="width:100%;text-align:left;margin-left:0">', true, false, true, false, '');



$html = '<b style="font-size:9px;">STR LOC 1</b>';
$pdf->SetY(95);
$pdf->SetX(11.4);
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<b style="font-size:24px;">VM</b>';
$pdf->SetY(99);
$pdf->SetX(11.4);
$pdf->writeHTML($html, true, false, true, false, '');



$straightLineStyle = array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
$pdf->Line(95, 94, 95, 109.5, $straightLineStyle); // vertical line

$html = '<b style="font-size:9px;">DELIVERY DOC/ASN NUMBER</b>';
$pdf->SetY(95);
$pdf->SetX(97);
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<b style="font-size:24px;">923222</b>';
$pdf->SetY(99);
$pdf->SetX(97);
$pdf->writeHTML($html, true, false, true, false, '');



///$pdf->write1DBarcode('Q432', 'C128', 11.4, '', '', 13.5, 0.4, $style, 'N');
$pdf->write1DBarcode('923222', 'C128', 160, 96, '', 13.5, 0.4, $style, 'N');

$pdf->writeHTML('<hr style="width:100%;text-align:left;margin-left:0">', true, false, true, false, '');


$html = '<b style="font-size:12px;">NT1B 17A950AB5YZ9</b>';
$pdf->SetY(110);
$pdf->SetX(11.4);
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<b style="font-size:9px;">SERIAL NO(S)</b>';
$pdf->SetY(120);
$pdf->SetX(11.4);
$pdf->writeHTML($html, true, false, true, false, '');


$html = '<b style="font-size:20px;">19032</b>';
$pdf->SetY(117);
$pdf->SetX(35);
$pdf->writeHTML($html, true, false, true, false, '');


$pdf->write1DBarcode('19032', 'C128', 11.4, 121, '', 16, 0.4, $style, 'N');


$pdf->Line(105, 109.5, 105, 139, $straightLineStyle); // vertical line


$html = '<b style="font-size:9px;">TO</b>';
$pdf->SetY(110);
$pdf->SetX(106);
$pdf->writeHTML($html, true, false, true, false, '');


$html = '<b style="font-size:9px;">Ford Valencia V5</b>';
$pdf->SetY(114);
$pdf->SetX(106);
$pdf->writeHTML($html, true, false, true, false, '');


$html = '<b style="font-size:9px;">CUST</b>';
$pdf->SetY(120);
$pdf->SetX(106);
$pdf->writeHTML($html, true, false, true, false, '');


$html = '<b style="font-size:24px;">0145A</b>';
$pdf->SetY(125);
$pdf->SetX(106);
$pdf->writeHTML($html, true, false, true, false, '');


$html = '<b style="font-size:9px; color:rgb(152,152,152);">ENG ALERT</b>';
$pdf->SetY(135);
$pdf->SetX(106);
$pdf->writeHTML($html, true, false, true, false, '');



















// add a page
$pdf->AddPage();

$pdf->Ln();

$pdf->Cell(0, 0, 'NT1B 17A950AB5YZ9', 0, 1);
$pdf->write1DBarcode('NT1B 17A950AB5YZ9', 'C128', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

$pdf->Cell(0, 0, 'DELIVERY DOC/ASN NUMBER', 0, 1);
$pdf->write1DBarcode('923222', 'C128', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();

$pdf->Cell(0, 0, 'SERIAL NO(M)', 0, 1);
$pdf->write1DBarcode('19031', 'C128', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();
$pdf->Cell(0, 0, 'MASTER LABEL', 0, 1);
$pdf->write2DBarcode('[)>A06AP  NT1B  17A950AB5YZ9  AQ432AVDP9JAAD20230301A8V0145AA1L3HAM19031ALVMAN923222Z109AAABCTN', 'PDF417', '', '', 0, 30, $style, 'N');


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// TEST BARCODE ALIGNMENTS

// add a page
$pdf->AddPage();

// set a background color
$style['bgcolor'] = array(255, 255, 240);
$style['fgcolor'] = array(127, 0, 0);

// Left position
$style['position'] = 'L';
$pdf->write1DBarcode('LEFT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Center position
$style['position'] = 'C';
$pdf->write1DBarcode('CENTER', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Right position
$style['position'] = 'R';
$pdf->write1DBarcode('RIGHT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);
// . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

$style['fgcolor'] = array(0, 127, 0);
$style['position'] = '';
$style['stretch'] = false; // disable stretch
$style['fitwidth'] = false; // disable fitwidth

// Left alignment
$style['align'] = 'L';
$pdf->write1DBarcode('LEFT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Center alignment
$style['align'] = 'C';
$pdf->write1DBarcode('CENTER', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Right alignment
$style['align'] = 'R';
$pdf->write1DBarcode('RIGHT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);
// . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

$style['fgcolor'] = array(0, 64, 127);
$style['position'] = '';
$style['stretch'] = false; // disable stretch
$style['fitwidth'] = true; // disable fitwidth

// Left alignment
$style['cellfitalign'] = 'L';
$pdf->write1DBarcode('LEFT', 'C128A', 105, '', 90, 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Center alignment
$style['cellfitalign'] = 'C';
$pdf->write1DBarcode('CENTER', 'C128A', 105, '', 90, 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Right alignment
$style['cellfitalign'] = 'R';
$pdf->write1DBarcode('RIGHT', 'C128A', 105, '', 90, 15, 0.4, $style, 'N');

$pdf->Ln(2);
// . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

$style['fgcolor'] = array(127, 0, 127);

// Left alignment
$style['position'] = 'L';
$pdf->write1DBarcode('LEFT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Center alignment
$style['position'] = 'C';
$pdf->write1DBarcode('CENTER', 'C128A', '', '', '', 15, 0.4, $style, 'N');

$pdf->Ln(2);

// Right alignment
$style['position'] = 'R';
$pdf->write1DBarcode('RIGHT', 'C128A', '', '', '', 15, 0.4, $style, 'N');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// TEST BARCODE STYLE

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
    'fgcolor' => array(0, 0, 128),
    'bgcolor' => array(255, 255, 128),
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

// ---------------------------------------------------------
$pdf->Output(__DIR__ . '/test.pdf', 'I');
//Close and output PDF document
$pdf->Output(__DIR__ . '/test.pdf', 'F');
downloadFile("test.pdf");
function downloadFile($fileName)
{
    $fileName = __DIR__ . "/$fileName";
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . basename($fileName) . "\"");
    readfile($fileName);
}

//============================================================+
// END OF FILE
//============================================================+
