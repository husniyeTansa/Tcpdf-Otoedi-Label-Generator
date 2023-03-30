
<?php

require_once(dirname(dirname(__DIR__)).'/TCPDF-main/tcpdf.php');

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

    $quantity_package = 6;//$arrayAsnInfo['quantityPackage'];
    for ($i = 0; $i < $quantity_package; $i++) {
        
        $def_loc_y = 0;

        if ($i % 4 == 1) {
            $def_loc_y = 72;
        }else if($i % 4 == 2){
            $def_loc_y = 144;
        }else if($i % 4 == 3){
            $def_loc_y = 216;
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

        $straightLineStyle = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));

        $pdf->Line(0, 72 + $def_loc_y, 210, 72 + $def_loc_y, $straightLineStyle); // horizontal 1 all row

        $straightLineStyle = array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));

        $html = '<b style="font-size:13px;">SUPP</b>';
        $pdf->SetY(2 + $def_loc_y);
        $pdf->SetX(2);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<span style="font-size:22px;">undefined</span>';
        $pdf->SetY(6 + $def_loc_y);
        $pdf->SetX(2);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<span style="font-size:22px;">320.1012</span>';
        $pdf->SetY(4 + $def_loc_y);
        $pdf->SetX(100);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Line(0, 18 + $def_loc_y, 210, 18 + $def_loc_y, $straightLineStyle); // horizontal 2 all row

        $html = '<b style="font-size:13px;">STOCK</b>';
        $pdf->SetY(20 + $def_loc_y);
        $pdf->SetX(2);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<span style="font-size:22px;">6501801770</span>';
        $pdf->SetY(26 + $def_loc_y);
        $pdf->SetX(2);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:12px;">QTY</b>';
        $pdf->SetY(19 + $def_loc_y);
        $pdf->SetX(108);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<span style="font-size:22px;">1</span>';
        $pdf->SetY(25 + $def_loc_y);
        $pdf->SetX(109);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Line(0, 36 + $def_loc_y, 210, 36 + $def_loc_y, $straightLineStyle); // horizontal 3 all row

        $html = '<b style="font-size:13px;">PART</b>';
        $pdf->SetY(38 + $def_loc_y);
        $pdf->SetX(2);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:22px;">6501801770</b>';
        $pdf->SetY(43 + $def_loc_y);
        $pdf->SetX(2);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Line(140, 44 + $def_loc_y, 210, 44 + $def_loc_y, $straightLineStyle); // horizontal 4 left row

        $html = '<b style="font-size:17px;">undefined</b>';
        $pdf->SetY(28 + $def_loc_y);
        $pdf->SetX(142);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:13px;">BATCH NUMBER</b>';
        $pdf->SetY(37 + $def_loc_y);
        $pdf->SetX(142);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->write2DBarcode('SDJKFSLSJKFL2345234SFKDFLSDFDGŞFKŞLFSFJSFK', 'QRCODE,Q', 155, 42 + $def_loc_y, 30, 30, $style, 'N');

        $pdf->Line(0, 54 + $def_loc_y, 140, 54 + $def_loc_y, $straightLineStyle); // horizontal 5 left row

        $html = '<b style="font-size:13px;">WAYBILL</b>';
        $pdf->SetY(56 + $def_loc_y);
        $pdf->SetX(2);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<span style="font-size:22px;">34glsn44</span>';
        $pdf->SetY(61 + $def_loc_y);
        $pdf->SetX(2);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:13px;">DATE</b>';
        $pdf->SetY(56 + $def_loc_y);
        $pdf->SetX(50);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<span style="font-size:22px;">29.03.2023</span>';
        $pdf->SetY(61 + $def_loc_y);
        $pdf->SetX(50);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:13px;">ASN NUMBER</b>';
        $pdf->SetY(56 + $def_loc_y);
        $pdf->SetX(90);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<span style="font-size:22px;">443423</span>';
        $pdf->SetY(61 + $def_loc_y);
        $pdf->SetX(90);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Line(140, 36 + $def_loc_y, 140, 72 + $def_loc_y, $straightLineStyle); // vertical line 1
    }

    //Close and output PDF document
    //$pdf->Output('example_027.pdf', 'I');

    // set array for fileName
    $filename = dirname(dirname(__DIR__)) . '/outbox/arikan/'
                .preg_replace('/\s+/', '', $arrayAsnInfo['deliveryDocASNNumber'])
                .'.'.preg_replace('/\s+/', '', $arrayAsnInfo['partNumber'])
                .'.'.$arrayAsnInfo['despatch_id']
                .'.0'
                .'.'.$arrayAsnInfo['despatch_package_id']
                .'.'.$arrayAsnInfo['lotBatch']
                .'.'.str_replace([" ", ":", "-"], ["", "", ""], $arrayAsnInfo['ftime']) . '.pdf';

    // dowland pdf asn
    $pdf->Output($filename, 'F');

    ob_end_flush();
}
