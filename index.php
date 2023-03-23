<?php

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

require_once __DIR__.'/vendor/autoload.php';


$connection = new AMQPStreamConnection('10.1.1.74', 5672, 'mqadmin', 'q_9IAm-7Ieipx0PFxw_8rPpi9Y');
$channel = $connection->channel();

$channel->queue_declare('test-queue', false, false, false, false);


$callback = function ($msg) {
   // print_r($msg->body);
   // file_put_contents("C:\\xampp\htdocs\barcode-test\data.json", $msg->body);
   // return view('product',['data' => json_decode($msg->body)]);
   // dd(json_decode($msg->body));
};

$channel->basic_consume('test-queue', '', false, true, false, false, $callback);
$channel->close();
$connection->close();

while ($channel->is_open()) {
    $channel->wait();
}

die;


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

for($i = 0;$i<5; $i++){

    $def_loc_x = 0;
    $def_loc_y = 0;

    if($i%2 != 0){
        $def_loc_x = 0;
        $def_loc_y = 132;
    }else{
        // add a page
        $pdf->AddPage('P', 'A4');
        $pdf->SetFont('helvetica', '', 10);
    }

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

    $html = '<b style="font-size:9px;">SUPP (V) Plascam</b>';
    $pdf->SetY(8.5+$def_loc_y);
    $pdf->SetX(11.4);
    $pdf->writeHTML($html, true, false, true, false, '');

    $html = '<b style="font-size:52px;">DP9JA</b>';
    $pdf->SetY(8.5+$def_loc_y);
    $pdf->SetX(95);
    $pdf->writeHTML($html, true, false, true, false, '');


    //$pdf->Cell(0, 0, 'SUPP (V) Plascam', 1, 0);
    $pdf->write1DBarcode('VDP9JA', 'C128', 11.4, 11.5+$def_loc_y, 53.9, 13.5, 0.4, $style, 'N'); // 9.5 * 1.41 = 13.5
    //$pdf->write1DBarcode()

    $pdf->writeHTML('<hr style="width:75%;text-align:left;margin-left:0">', true, false, true, false, '');
    $pdf->write2DBarcode('[)>A06AP  NT1B  17A950AB5YZ9  AQ432AVDP9JAAD20230301A8V0145AA1L3HAM19031ALVMAN923222Z109AAABCTN', 'PDF417', 150, 12+$def_loc_y, 0, 0, $style2, 'N');

    $html = '<b style="font-size:9px;">QTY (Q)</b>';
    $pdf->SetY(26+$def_loc_y);
    $pdf->SetX(11.4);
    $pdf->writeHTML($html, true, false, true, false, '');

    $html = '<b style="font-size:52px;">54</b>';
    $pdf->SetY(22+$def_loc_y);
    $pdf->SetX(65);
    $pdf->writeHTML($html, true, false, true, false, '');

    $html = '<b style="font-size:14px;">PCE</b>';
    $pdf->SetY(40+$def_loc_y);
    $pdf->SetX(72);
    $pdf->writeHTML($html, true, false, true, false, '');


    //$pdf->Cell(0, 0, 'QTY (Q) 432 PCE', 0, 1);
    $pdf->write1DBarcode('Q432', 'C128', 11.4, '', '', 13.5, 0.4, $style, 'N');

    $straightLineStyle = array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
    $pdf->Line(85, 25+$def_loc_y, 85, 58+$def_loc_y, $straightLineStyle); // vertical line


    $html = '<b style="font-size:9px;">CONTAINER</b>';
    $pdf->SetY(26+$def_loc_y);
    $pdf->SetX(86);
    $pdf->writeHTML($html, true, false, true, false, '');

    $html = '<b style="font-size:18px;">IMC 100</b>';
    $pdf->SetY(29+$def_loc_y);
    $pdf->SetX(86);
    $pdf->writeHTML($html, true, false, true, false, '');

    $html = '<b style="font-size:9px;">GROSS WGT</b>';
    $pdf->SetY(36+$def_loc_y);
    $pdf->SetX(86);
    $pdf->writeHTML($html, true, false, true, false, '');

    $html = '<b style="font-size:18px;">14 KG</b>';
    $pdf->SetY(40+$def_loc_y);
    $pdf->SetX(86);
    $pdf->writeHTML($html, true, false, true, false, '');

    $html = '<b style="font-size:9px;">DATE</b>';
    $pdf->SetY(48+$def_loc_y);
    $pdf->SetX(86);
    $pdf->writeHTML($html, true, false, true, false, '');

    $html = '<b style="font-size:18px;">01MAR2023</b>';
    $pdf->SetY(52+$def_loc_y);
    $pdf->SetX(86);
    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->writeHTML('<hr style="width:100%;text-align:left;margin-left:0">', true, false, true, false, '');


    $html = '<b style="font-size:48px;">NT1B 17A950AB5YZ9</b>';
    $pdf->SetY(60+$def_loc_y);
    $pdf->SetX(25);
    $pdf->writeHTML($html, true, false, true, false, '');

    $html = '<b style="font-size:9px;">PART (P)</b>';
    $pdf->SetY(80+$def_loc_y);
    $pdf->SetX(11.4);
    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->write1DBarcode('NT1B 17A950AB5YZ9', 'C128', 20, 74+$def_loc_y, 160, 20, 1, $style, 'N');

    $pdf->writeHTML('<hr style="width:100%;text-align:left;margin-left:0">', true, false, true, false, '');

    $html = '<b style="font-size:9px;">STR LOC 1</b>';
    $pdf->SetY(95+$def_loc_y);
    $pdf->SetX(11.4);
    $pdf->writeHTML($html, true, false, true, false, '');

    $html = '<b style="font-size:24px;">VM</b>';
    $pdf->SetY(99+$def_loc_y);
    $pdf->SetX(11.4);
    $pdf->writeHTML($html, true, false, true, false, '');

    $straightLineStyle = array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
    $pdf->Line(95, 94+$def_loc_y, 95, 109.5+$def_loc_y, $straightLineStyle); // vertical line

    $html = '<b style="font-size:9px;">DELIVERY DOC/ASN NUMBER</b>';
    $pdf->SetY(95+$def_loc_y);
    $pdf->SetX(97);
    $pdf->writeHTML($html, true, false, true, false, '');

    $html = '<b style="font-size:24px;">923222</b>';
    $pdf->SetY(99+$def_loc_y);
    $pdf->SetX(97);
    $pdf->writeHTML($html, true, false, true, false, '');

    ///$pdf->write1DBarcode('Q432', 'C128', 11.4, '', '', 13.5, 0.4, $style, 'N');
    $pdf->write1DBarcode('923222', 'C128', 160, 96+$def_loc_y, '', 13.5, 0.4, $style, 'N');

    $pdf->writeHTML('<hr style="width:100%;text-align:left;margin-left:0">', true, false, true, false, '');

    $html = '<b style="font-size:12px;">NT1B 17A950AB5YZ9</b>';
    $pdf->SetY(110+$def_loc_y);
    $pdf->SetX(11.4);
    $pdf->writeHTML($html, true, false, true, false, '');

    $html = '<b style="font-size:9px;">SERIAL NO(S)</b>';
    $pdf->SetY(120+$def_loc_y);
    $pdf->SetX(11.4);
    $pdf->writeHTML($html, true, false, true, false, '');


    $html = '<b style="font-size:20px;">19032</b>';
    $pdf->SetY(117+$def_loc_y);
    $pdf->SetX(35);
    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->write1DBarcode('19032', 'C128', 11.4, 121+$def_loc_y, '', 16, 0.4, $style, 'N');

    $pdf->Line(105, 109.5+$def_loc_y, 105, 136+$def_loc_y, $straightLineStyle); // vertical line

    $html = '<b style="font-size:9px;">TO</b>';
    $pdf->SetY(110+$def_loc_y);
    $pdf->SetX(106);
    $pdf->writeHTML($html, true, false, true, false, '');

    $html = '<b style="font-size:9px;">Ford Valencia V5</b>';
    $pdf->SetY(114+$def_loc_y);
    $pdf->SetX(106);
    $pdf->writeHTML($html, true, false, true, false, '');


    $html = '<b style="font-size:9px;">CUST</b>';
    $pdf->SetY(120+$def_loc_y);
    $pdf->SetX(106);
    $pdf->writeHTML($html, true, false, true, false, '');


    $html = '<b style="font-size:24px;">0145A</b>';
    $pdf->SetY(125+$def_loc_y);
    $pdf->SetX(106);
    $pdf->writeHTML($html, true, false, true, false, '');


    $html = '<b style="font-size:9px; color:rgb(152,152,152);">ENG ALERT</b>';
    $pdf->SetY(135+$def_loc_y);
    $pdf->SetX(106);
    $pdf->writeHTML($html, true, false, true, false, '');

}


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
