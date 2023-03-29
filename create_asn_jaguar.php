
<?php

require_once('TCPDF-main/tcpdf.php');

function createASN($arrayAsnInfo)
{
    ob_start();

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('MAP');
    $pdf->SetTitle('ASN');
    $pdf->SetSubject('ASN LABEL');

    // do not need header footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    // set header and footer fonts
    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // none margin bottom
    $pdf->SetAutoPageBreak(true, 0);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set a barcode on the page footer
    $pdf->setBarcode(date('Y-m-d H:i:s'));

    // set font
    $pdf->SetFont('helvetica', '', 11);

    $quantity_package = 1;//$arrayAsnInfo['quantityPackage'];
    for ($i = 0; $i < $quantity_package; $i++) {

        $def_loc_y = 0;

        if ($i % 2 != 0) {
            $def_loc_y = 145;
        } else {
            // add a page
            $pdf->AddPage('P', 'A4');
            $pdf->SetFont('helvetica', '', 10);
        }

        // define barcode style
        $style = array(
            'position' => '',
            'align' => 'L',
            'stretch' => false,
            'cellfitalign' => '',
            'border' => false,
            'hpadding' => 'auto',
            'vpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false,
            'text' => true,
            'font' => 'helvetica',
        );

        $straightLineStyle = array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));

        $html = '<b style="font-size:8px;">RECEIVER</b>';
        $pdf->SetY(4 + $def_loc_y);
        $pdf->SetX(5.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:12px;">JLR</b>';
        $pdf->SetY(8.4 + $def_loc_y);
        $pdf->SetX(7);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:12px;">JH Halewood</b>';
        $pdf->SetY(12.5 + $def_loc_y);
        $pdf->SetX(7);
        $pdf->writeHTML($html, true, false, true, false, '');
        
        $pdf->Line(0, 20 + $def_loc_y, 210, 20 + $def_loc_y, $straightLineStyle); // horizontal 1 all row

        $pdf->Line(105, 0 + $def_loc_y, 105, 46 + $def_loc_y, $straightLineStyle); // vertical line 1

        $html = '<b style="font-size:8px;">DOCK</b>';
        $pdf->SetY(3 + $def_loc_y);
        $pdf->SetX(109.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:48px;font-weight:400">ZH</b>';
        $pdf->SetY(3 + $def_loc_y);
        $pdf->SetX(111);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:8px;">ADVICE NOTE NO</b>';
        $pdf->SetY(21 + $def_loc_y);
        $pdf->SetX(5.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:20px;">923590</b>';
        $pdf->SetY(23 + $def_loc_y);
        $pdf->SetX(15);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->write1DBarcode('S923590', 'C128', 5, 29 + $def_loc_y, '', 18, 0.5, $style, 'N');

        $html = '<b style="font-size:8px;">SUPPLIER ADDRESS</b>';
        $pdf->SetY(21 + $def_loc_y);
        $pdf->SetX(109.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:15px;">Pelitli Mah, Maden Cad. No:22</b>'; // Gebze/Kocaeli
        $pdf->SetY(25 + $def_loc_y);
        $pdf->SetX(112);
        $pdf->writeHTML($html, true, true, true, false, '');

        $pdf->Line(105, 33 + $def_loc_y, 210, 33 + $def_loc_y, $straightLineStyle); // horizontal 2 right row

        $html = '<b style="font-size:8px;">NET WEIGHT (KG)</b>';
        $pdf->SetY(34 + $def_loc_y);
        $pdf->SetX(109.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:22px;">7.50</b>';
        $pdf->SetY(37 + $def_loc_y);
        $pdf->SetX(111);
        $pdf->writeHTML($html, true, true, true, false, '');

        $pdf->Line(140, 33 + $def_loc_y, 140, 46 + $def_loc_y, $straightLineStyle); // vertical line 2

        $html = '<b style="font-size:8px;">GROSS WEIGHT (KG)</b>';
        $pdf->SetY(34 + $def_loc_y);
        $pdf->SetX(144.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:22px;">33.20</b>';
        $pdf->SetY(37 + $def_loc_y);
        $pdf->SetX(146);
        $pdf->writeHTML($html, true, true, true, false, '');

        $pdf->Line(175, 33 + $def_loc_y, 175, 46 + $def_loc_y, $straightLineStyle); // vertical line 3

        $html = '<b style="font-size:8px;">NO OF</b>'; // BOXES
        $pdf->SetY(34 + $def_loc_y);
        $pdf->SetX(179.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:22px;">10</b>';
        $pdf->SetY(37 + $def_loc_y);
        $pdf->SetX(181);
        $pdf->writeHTML($html, true, true, true, false, '');
   
        $pdf->Line(0, 46 + $def_loc_y, 210, 46 + $def_loc_y, $straightLineStyle); // horizontal 3 all row

        $html = '<b style="font-size:8px;">PART NO(P)</b>';
        $pdf->SetY(47 + $def_loc_y);
        $pdf->SetX(5.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<p style="font-size:45px;">BJ32 423A74AB</p>';
        $pdf->SetY(47 + $def_loc_y);
        $pdf->SetX(4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->write1DBarcode('SBJ32 423A74AB', 'C128', 5, 58 + $def_loc_y, '', 19, 0.6, $style, 'N');

        $pdf->Line(0, 75 + $def_loc_y, 210, 75 + $def_loc_y, $straightLineStyle); // horizontal 4 all row

        $html = '<b style="font-size:8px;">QUANTITY (Q)</b>';
        $pdf->SetY(76 + $def_loc_y);
        $pdf->SetX(5.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<p style="font-size:47px;">1500</p>';
        $pdf->SetY(77 + $def_loc_y);
        $pdf->SetX(30);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->write1DBarcode('1500', 'C128', 7, 88 + $def_loc_y, '', 20, 0.7, $style, 'N');

        $pdf->Line(105, 75 + $def_loc_y, 105, 145 + $def_loc_y, $straightLineStyle); // vertical line 4

        $html = '<b style="font-size:8px;">DESCRIPTION</b>';
        $pdf->SetY(76 + $def_loc_y);
        $pdf->SetX(109.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:20px;">BJ32 423A74AB</b>';
        $pdf->SetY(79 + $def_loc_y);
        $pdf->SetX(111);
        $pdf->writeHTML($html, true, true, true, false, '');

        $pdf->Line(105, 86 + $def_loc_y, 210, 86 + $def_loc_y, $straightLineStyle); // horizontal 5 right row

        $html = '<b style="font-size:8px;">SUPPLIER PART NO (30S)</b>';
        $pdf->SetY(87 + $def_loc_y);
        $pdf->SetX(109.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:22px;">BJ32 423A74AB</b>';
        $pdf->SetY(90 + $def_loc_y);
        $pdf->SetX(115);
        $pdf->writeHTML($html, true, true, true, false, '');

        $pdf->write1DBarcode('BJ32 423A74AB', 'C128', 112, 96 + $def_loc_y, '', 18, 0.4, $style, 'N');

        $pdf->Line(0, 105 + $def_loc_y, 105, 105 + $def_loc_y, $straightLineStyle); // horizontal 6 left row

        $html = '<b style="font-size:8px;">SUPPLIER (V)</b>';
        $pdf->SetY(106 + $def_loc_y);
        $pdf->SetX(5.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:16px;">DP9JA</b>';
        $pdf->SetY(106 + $def_loc_y);
        $pdf->SetX(25);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->write1DBarcode('DP9JA', 'C128', 7, 110 + $def_loc_y, '', 17, 0.5, $style, 'N');

        $pdf->Line(105, 115 + $def_loc_y, 210, 115 + $def_loc_y, $straightLineStyle); // horizontal 6 right row

        $html = '<b style="font-size:8px;">PROD DATE</b>';
        $pdf->SetY(116 + $def_loc_y);
        $pdf->SetX(109.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:20px;">D23.03.22</b>';
        $pdf->SetY(119 + $def_loc_y);
        $pdf->SetX(111);
        $pdf->writeHTML($html, true, true, true, false, '');

        $pdf->Line(145, 115 + $def_loc_y, 145, 126 + $def_loc_y, $straightLineStyle); // vertical line 5

        $html = '<b style="font-size:8px;">ENGR. CHSNGE</b>';
        $pdf->SetY(116 + $def_loc_y);
        $pdf->SetX(147);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Line(0, 126 + $def_loc_y, 210, 126 + $def_loc_y, $straightLineStyle); // horizontal 7 all row

        $html = '<b style="font-size:8px;">SERIAL NUMBER</b>';
        $pdf->SetY(127 + $def_loc_y);
        $pdf->SetX(5.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:18px;">086839857000237305</b>';
        $pdf->SetY(126 + $def_loc_y);
        $pdf->SetX(28);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->write1DBarcode('086839857000237305', 'C128', 5, 129 + $def_loc_y, '', 20, 0.6, $style, 'N');

        $html = '<b style="font-size:8px;">BATCH NUMBER (H)</b>';
        $pdf->SetY(127 + $def_loc_y);
        $pdf->SetX(109.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:18px;">230316001</b>';
        $pdf->SetY(127 + $def_loc_y);
        $pdf->SetX(135);
        $pdf->writeHTML($html, true, true, true, false, '');

        $pdf->write1DBarcode('230316001', 'C128', 110, 130 + $def_loc_y, '', 20, 0.6, $style, 'N');

    }

    //Close and output PDF document
    $pdf->Output('example_027.pdf', 'I');

    // set array for fileName
    /*$filename = __DIR__ . '/outbox/'
                .preg_replace('/\s+/', '', $arrayAsnInfo['deliveryDocASNNumber'])
                .'.'.preg_replace('/\s+/', '', $arrayAsnInfo['partNumber'])
                .'.'.$arrayAsnInfo['despatch_id']
                .'.0'
                .'.'.$arrayAsnInfo['despatch_package_id']
                .'.'.$arrayAsnInfo['lotBatch']
                .'.'.str_replace([" ", ":", "-"], ["", "", ""], $arrayAsnInfo['ftime']) . '.pdf';

    // dowland pdf asn
    $pdf->Output($filename, 'F');*/

    ob_end_flush();
}
