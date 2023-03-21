<?php
//include library
include('TCPDF-main/tcpdf.php');
//include('TCPDF-main/examples/barcodes/tcpdf_barcodes_1d_include.php');
//include('TCPDF-main/examples/barcodes/tcpdf_barcodes_2d_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set a barcode on the page footer
$pdf->setBarcode(date('Y-m-d H:i:s'));

// set font
$pdf->SetFont('helvetica', '', 11);

//set header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// add a page
$pdf->AddPage('P', 'A5');

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

// CODE 128 AUTO
$pdf->write1DBarcode('CODE 128 AUTO', 'C128',  120, 11.5, 44.8, 9.5, null, $style, 'R');



//Close and output PDF document
$pdf->Output();

//============================================================+
// END OF FILE
//============================================================+