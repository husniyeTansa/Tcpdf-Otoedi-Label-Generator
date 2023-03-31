
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
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // none margin bottom
    $pdf->SetAutoPageBreak(TRUE, 0);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set a barcode on the page footer
    $pdf->setBarcode(date('Y-m-d H:i:s'));

    // set font
    $pdf->SetFont('helvetica', '', 11);

    $labelNo = $arrayAsnInfo['labelNumber'] * 10 + 1;
    $quantity_package = $arrayAsnInfo['quantityPackage'];
    $year = intval(substr($arrayAsnInfo['dateYYMMDD'], 0, 4)) % 100;
    $month = substr($arrayAsnInfo['dateYYMMDD'], 4, 2);
    $day = substr($arrayAsnInfo['dateYYMMDD'], 6, 2);
    $dateYYMMDD = strval($year) . "." . $month . "." . $day; 

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

        $html = '<b style="font-size:9px;">SUPP (V) ' . $arrayAsnInfo['supplierName'] . '</b>';
        $pdf->SetY(8.5 + $def_loc_y);
        $pdf->SetX(11.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $supplierGSDBCodeLength = strlen($arrayAsnInfo['supplierGSDBCode']);
        $html = '<b style="font-size:52px;">' . $arrayAsnInfo['supplierGSDBCode'] . '</b>';
        $pdf->SetY(8.5 + $def_loc_y);
        $pdf->SetX(160 - 10 * $supplierGSDBCodeLength);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->write1DBarcode('V' . $arrayAsnInfo['supplierGSDBCode'], 'C128', 11.4, 11.5 + $def_loc_y, 53.9, 13.5, 0.4, $style, 'N'); // 9.5 * 1.41 = 13.5

        $pdf->writeHTML('<hr style="width:75%;text-align:left;margin-left:0">', true, false, true, false, '');

        $html = '<b style="font-size:13px;font-weight:500">MASTER LABEL</b>';
        $pdf->SetY(23 + $def_loc_y);
        $pdf->SetX(158);
        $pdf->writeHTML($html, true, false, true, false, '');

        $zeroFiller = "000000000";
        $zeros = substr($zeroFiller, 0, 9 - strlen(strval($labelNo)));
        $plascamLabelContent = [
            'T' . $zeros . $labelNo,
            $arrayAsnInfo['partNumber'],
            preg_replace('/\s+/', '', $arrayAsnInfo['order_number']),
            $arrayAsnInfo['quantity'],
            $arrayAsnInfo['container'],
            ($arrayAsnInfo['lotBatch'] != "") ? str_replace('-', '.', $arrayAsnInfo['lotBatch']) : $dateYYMMDD
        ];
        $serial_number_text = implode('-', $plascamLabelContent);

        $pdf->write2DBarcode($serial_number_text.'-'.$arrayAsnInfo['deliveryDocASNNumber'], 'DATAMATRIX', 160, 25 + $def_loc_y, 35, 35, $style, 'N');

        $html = '<b style="font-size:9px;">QTY (Q)</b>';
        $pdf->SetY(26 + $def_loc_y);
        $pdf->SetX(11.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $quantityLength = strlen($arrayAsnInfo['quantity']);
        $html = '<b style="font-size:52px;">' . $arrayAsnInfo['quantity'] . '</b>';
        $pdf->SetY(22 + $def_loc_y);
        $pdf->SetX(88 - $quantityLength * 10);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:14px;">' . $arrayAsnInfo['unitOfMeasure'] . '</b>';
        $pdf->SetY(40 + $def_loc_y);
        $pdf->SetX(72);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->write1DBarcode('Q' . $arrayAsnInfo['quantity'], 'C128', 11.4, '', '', 13.5, 0.4, $style, 'N');

        $straightLineStyle = array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        $pdf->Line(85, 25 + $def_loc_y, 85, 58 + $def_loc_y, $straightLineStyle); // vertical line

        $html = '<b style="font-size:9px;">CONTAINER</b>';
        $pdf->SetY(26 + $def_loc_y);
        $pdf->SetX(86);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:18px;">' . $arrayAsnInfo['container'] . '</b>';
        $pdf->SetY(29 + $def_loc_y);
        $pdf->SetX(86);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:9px;">GROSS WGT</b>';
        $pdf->SetY(36 + $def_loc_y);
        $pdf->SetX(86);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:18px;">' . $arrayAsnInfo['grossWeight'] . ' ' . $arrayAsnInfo['weight_unit'] . '</b>';
        $pdf->SetY(40 + $def_loc_y);
        $pdf->SetX(86);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:9px; color:rgb(152,152,152);">LOT / BATCH NO ' . $arrayAsnInfo['engAlert'] . '</b>';
        $pdf->SetY(36 + $def_loc_y);
        $pdf->SetX(129);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:18px; color:rgb(152,152,152);">' . $arrayAsnInfo['lotBatch'] . '</b>';
        $pdf->SetY(40 + $def_loc_y);
        $pdf->SetX(129);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:9px; color:rgb(152,152,152);">SHIFT</b>';
        $pdf->SetY(48 + $def_loc_y);
        $pdf->SetX(129);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:9px; color:rgb(152,152,152);">' . $arrayAsnInfo['shift'] . '</b>';
        $pdf->SetY(53 + $def_loc_y);
        $pdf->SetX(129);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:9px; color:rgb(152,152,152);">W/C</b>';
        $pdf->SetY(48 + $def_loc_y);
        $pdf->SetX(144);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:9px; color:rgb(152,152,152);">' . $arrayAsnInfo['wc'] . '</b>';
        $pdf->SetY(53 + $def_loc_y);
        $pdf->SetX(144);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:9px;">DATE</b>';
        $pdf->SetY(48 + $def_loc_y);
        $pdf->SetX(86);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:18px;">' . $arrayAsnInfo['date'] . '</b>';
        $pdf->SetY(52 + $def_loc_y);
        $pdf->SetX(86);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->writeHTML('<hr style="width:100%;text-align:left;margin-left:0">', true, false, true, false, '');

        $html = '<b style="font-size:48px;">' . $arrayAsnInfo['partNumber'] . '</b>';
        $pdf->SetY(60 + $def_loc_y);
        $pdf->SetX(25);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:9px;">PART (P)</b>';
        $pdf->SetY(80 + $def_loc_y);
        $pdf->SetX(11.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->write1DBarcode('P ' . $arrayAsnInfo['partNumber'], 'C128', 20, 74 + $def_loc_y, 160, 20, 1, $style, 'N');

        $pdf->writeHTML('<hr style="width:100%;text-align:left;margin-left:0">', true, false, true, false, '');

        $html = '<b style="font-size:9px;">STR LOC 1</b>';
        $pdf->SetY(95 + $def_loc_y);
        $pdf->SetX(11.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:24px;">' . $arrayAsnInfo['storageLocation'] . '</b>';
        $pdf->SetY(99 + $def_loc_y);
        $pdf->SetX(11.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $straightLineStyle = array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        $pdf->Line(95, 94 + $def_loc_y, 95, 109.5 + $def_loc_y, $straightLineStyle); // vertical line

        $html = '<b style="font-size:9px;">DELIVERY DOC/ASN NUMBER</b>';
        $pdf->SetY(95 + $def_loc_y);
        $pdf->SetX(97);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:24px;">' . $arrayAsnInfo['deliveryDocASNNumber'] . '</b>';
        $pdf->SetY(99 + $def_loc_y);
        $pdf->SetX(97);
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->write1DBarcode('N' . $arrayAsnInfo['deliveryDocASNNumber'], 'C128', 160, 96 + $def_loc_y, '', 13.5, 0.4, $style, 'N');

        $pdf->writeHTML('<hr style="width:100%;text-align:left;margin-left:0">', true, false, true, false, '');

        $html = '<b style="font-size:12px;">' . $arrayAsnInfo['descriptionOfPart'] . '</b>';
        $pdf->SetY(110 + $def_loc_y);
        $pdf->SetX(11.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:9px;">SERIAL NO(S)</b>';
        $pdf->SetY(120 + $def_loc_y);
        $pdf->SetX(11.4);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:9px;">' . $serial_number_text . '</b>';
        $pdf->SetY(120 + $def_loc_y);
        $pdf->SetX(33);
        $pdf->writeHTML($html, true, false, true, false, '');
        $labelNo++;

        $pdf->Line(105, 109.5 + $def_loc_y, 105, 136 + $def_loc_y, $straightLineStyle); // vertical line

        $html = '<b style="font-size:9px;">TO</b>';
        $pdf->SetY(110 + $def_loc_y);
        $pdf->SetX(106);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:9px;">' . $arrayAsnInfo['customerPlantName'] . '</b>';
        $pdf->SetY(114 + $def_loc_y);
        $pdf->SetX(106);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:9px;">CUST</b>';
        $pdf->SetY(120 + $def_loc_y);
        $pdf->SetX(106);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:32px;">' . $arrayAsnInfo['customerPlantCode'] . '</b>';
        $pdf->SetY(123 + $def_loc_y);
        $pdf->SetX(106);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:9px; color:rgb(152,152,152);">ENG ALERT ' . $arrayAsnInfo['engAlert'] . '</b>';
        $pdf->SetY(135 + $def_loc_y);
        $pdf->SetX(106);
        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '<b style="font-size:9px;">DOCK CODE</b>';
        $pdf->SetY(110 + $def_loc_y);
        $pdf->SetX(175);
        $pdf->writeHTML($html, true, false, true, false, '');

        $quantityLength = strlen($arrayAsnInfo['dockCode']);
        $html = '<b style="font-size:52px;">' . $arrayAsnInfo['dockCode'] . '</b>';
        $pdf->SetY(120 + $def_loc_y);
        $pdf->SetX(200 - $quantityLength * 10);
        $pdf->writeHTML($html, true, false, true, false, '');
    }

    $pdf->Output("test.pdf", 'I');

    // set array for fileName
    /*$filename = dirname(dirname(__DIR__)) . '/outbox/plascam/'
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
