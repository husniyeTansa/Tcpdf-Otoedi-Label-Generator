<?php

static $serialLength;
static $labelNumberWithoutCheckDigit;
static $sum;
$multiplier = array(3, 1);     
$checkDigit;
// input:
$extensionDigit = 4; 
$companyPrefix = 86839857;
$serialNumber = 23734;


$companyPrefix = str_pad($companyPrefix, 4, 0, STR_PAD_RIGHT);

// 16 - 8 = 8 = $serialLength
$serialLength = 16 - strlen($companyPrefix);
//strlen((string) $serialNumber) <= $serialLength     5 <= 8
if(strlen((string) $serialNumber) <= $serialLength){
    // $serialNumber = 00023730
    $serialNumber = str_pad((string)$serialNumber, $serialLength, '0', STR_PAD_LEFT); 
    $extensionDigit = 0; 
} else {
    // örnek input buraya girmediği için açıklama yazmıyorum, umarım doğru yazdım bu else kısmını :)
    $serialNumber = substr((string)$serialNumber, -$serialLength);
    $extensionDigit = floor($serialNumber / pow(10, $serialLength)) % 10;
}

$labelNumberWithoutCheckDigit = $extensionDigit . $companyPrefix . $serialNumber;
// echo "$labelNumberWithoutCheckDigit";
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

$checkDigit = calculationCheckDigit($labelNumberWithoutCheckDigit);
// echo "<br>";
// echo "$checkDigit";
// echo "<br>";

function format($extensionDigit, $companyPrefix, $serialNumber, $checkDigit){
    return $extensionDigit.$companyPrefix.$serialNumber.$checkDigit;
}

print_r(format($extensionDigit, $companyPrefix, $serialNumber, $checkDigit));


?>