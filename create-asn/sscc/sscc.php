<?php

static $serialLength;
static $labelNumberWithoutCheckDigit;
$multiplier = array(3, 1);     

// input:
/*$extensionDigit = 4; 
$companyPrefix = 86839857;
$serialNumber = 23730;*/


function getSerialNumber($extensionDigit, $companyPrefix, $serialNumber){

    $companyPrefix = str_pad($companyPrefix, 4, 0, STR_PAD_RIGHT);

    $serialLength = 16 - strlen($companyPrefix);
    if(strlen((string) $serialNumber) <= $serialLength){
        $serialNumber = str_pad((string)$serialNumber, $serialLength, '0', STR_PAD_LEFT); 
        $extensionDigit = 0; 
    } else {
        $serialNumber = substr((string)$serialNumber, -$serialLength);
        $extensionDigit = floor($serialNumber / pow(10, $serialLength)) % 10;
    }

    $labelNumberWithoutCheckDigit = $extensionDigit . $companyPrefix . $serialNumber;

    $checkDigit = calculationCheckDigit($labelNumberWithoutCheckDigit);

    return format($extensionDigit, $companyPrefix, $serialNumber, $checkDigit);

}

function calculationCheckDigit($labelNumberWithoutCheckDigit){

    $sum = 0;
    foreach (str_split($labelNumberWithoutCheckDigit) as $index => $digit) {
        $multiplier = array(3, 1);
        $sum += $digit * $multiplier[$index % 2];
    }

    if($sum < 10){
        return $sum;
    }
    
    return ((10 - ($sum % 10)) % 10);

}

function format($extensionDigit, $companyPrefix, $serialNumber, $checkDigit){

    return $extensionDigit.$companyPrefix.$serialNumber.$checkDigit;

}

?>