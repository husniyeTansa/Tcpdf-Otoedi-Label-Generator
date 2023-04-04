<?php

require_once __DIR__.'/create_asn_arikan.php';

$jsonFileName = dirname(dirname(__DIR__))."/data/temp.json";

// set main parameter
$labelCollection = json_decode(file_get_contents($jsonFileName));

$despatchId = $labelCollection->despatch_id;
$timestamp = $labelCollection->label_timestamp;

$size_ASN = count($labelCollection->collection);
for($i=0; $i<$size_ASN; $i++) {
    $data_ASN = $labelCollection->collection[$i];
    if(count($data_ASN->inners) == 0){
        createInnerASN($data_ASN, $despatchId, $timestamp);
    }else{
        createOuterASN($data_ASN, $despatchId, $timestamp);
    }
}

function createOuterASN($labelCollection, $despatchId, $timestamp){

    $supplierNameOuter = $labelCollection->supplierName;
    $quantityOuter = $labelCollection->quantity;
    $quantityPackageOuter = $labelCollection->quantityPackage;
    $containerOuter = $labelCollection->container;

    $grossWeightOuter = $labelCollection->grossWeight;
    $dateOuter = $labelCollection->date;
    $dateYYMMDDOuter = $labelCollection->dateYYMMDD;
    $lotBatchOuter = $labelCollection->lotBatch;
    $partNumberOuter = $labelCollection->partNumber;
    $deliveryDocASNNumberOuter = $labelCollection->deliveryDocASNNumber;
    $descriptionOfPartOuter = $labelCollection->descriptionOfPart;
    $serialNumberOuter = $labelCollection->serialNumber;

    $customerPlantNameOuter = $labelCollection->customerPlantName;
    $customerPlantCodeOuter = $labelCollection->customerPlantCode;
    $customerCodeOuter = $labelCollection->customerCode;
    $dockCodeOuter = $labelCollection->dockCode;
    $engAlertOuter = $labelCollection->engAlert;
    $packageQuantityOuter = $labelCollection->packageQuantity;
    $is_labeledOuter = $labelCollection->is_labeled;
    $isMasterOuter = $labelCollection->isMaster;

    $copyOuter = $labelCollection->copy;
    $isMixOuter = $labelCollection->is_mix;
    $despatchPackageIdOuter = $labelCollection->despatch_package_id;
    $fkDespatchPackageIdOuter = $labelCollection->fk_despatch_package_id;
    $packageTypeOuter = $labelCollection->package_type;
    $packagingIdOuter = $labelCollection->packaging_id;
    $fkPackagingIdOuter = $labelCollection->fk_packaging_id;
    $labelNumberOuter = $labelCollection->labelNumber;
    $uom = $labelCollection->unitOfMeasure;
    $transportIdentifierOuter = $labelCollection->transportIdentifier;

    // outer package's inners
    $innerDespatchPackageId = $labelCollection->inners[0]->despatch_package_id;
    $fkProductPackagingId = $labelCollection->inners[0]->fk_product_packaging_id;
    $innerFkPackagingId = $labelCollection->inners[0]->fk_packaging_id;
    $fkDespatchPackageId = $labelCollection->inners[0]->fk_despatch_package_id;
    $fkDespatchId = $labelCollection->inners[0]->fk_despatch_id;

    $innerQuantityPackage = $labelCollection->inners[0]->quantity_package;
    $batchNumber = $labelCollection->inners[0]->batch_number;
    $innerLabelNumber = $labelCollection->inners[0]->label_number;
    $innerGrossWeight = $labelCollection->inners[0]->gross_weight;
    $netWeight = $labelCollection->inners[0]->net_weight;
    $supplierGSDBCodeOuter = $labelCollection->supplierGSDBCode;

    $weightUnit = $labelCollection->inners[0]->weight_unit;
    $buyerCode = $labelCollection->inners[0]->buyer_code;
    $dockIdentifier = $labelCollection->inners[0]->dock_identifier;
    $internalDestination = $labelCollection->inners[0]->internal_destination;
    $consigneeName = $labelCollection->inners[0]->consignee_name;
    $consigneeIdentifier = $labelCollection->inners[0]->consignee_identifier;
    $consigneeAltIdentifier = $labelCollection->inners[0]->consignee_alt_identifier;

    $totalInner = $labelCollection->totalInner;

    $outerPackage = [
        "supplierName" => $supplierNameOuter,
        "quantity" => $quantityOuter,
        "container" => $containerOuter,
        "grossWeight" => floor($grossWeightOuter),
        "weight_unit" => $weightUnit,
        "date" => $dateOuter,
        "lotBatch" => $lotBatchOuter,
        "partNumber" => $partNumberOuter,
        "deliveryDocASNNumber" => $deliveryDocASNNumberOuter,
        "descriptionOfPart" => $descriptionOfPartOuter,
        "labelNumber" => $labelNumberOuter,
        "customerPlantName" => $customerPlantNameOuter,
        "dockCode" => $dockCodeOuter,
        "engAlert" => $engAlertOuter,
        "serialNumber" => $serialNumberOuter,
        "quantityPackage" => $quantityPackageOuter,
        "typeAsn" => "OuterASN",
        "ftime" => $timestamp,
        "despatch_package_id" => $despatchPackageIdOuter,
        "fk_despatch_package_id" => $fkDespatchPackageIdOuter,
        "despatch_id" => $despatchId,
        "supplierGSDBCode" => $supplierGSDBCodeOuter,
        "uom" => $uom,
        "transportIdentifier" => $transportIdentifierOuter
    ];

    createASN($outerPackage);

}

function createInnerASN($labelCollection, $despatchId, $timestamp){

    // inner package
    $supplierNameInner = $labelCollection->supplierName;
    $supplierGSDBCodeInner = $labelCollection->supplierGSDBCode;
    $quantityInner = $labelCollection->quantity;
    $quantityPackageInner = $labelCollection->quantityPackage;
    $containerInner = $labelCollection->container;
    $uom = $labelCollection->unitOfMeasure;

    $grossWeightInner = $labelCollection->grossWeight;
    $dateInner = $labelCollection->date;
    $dateYYMMDDInner = $labelCollection->dateYYMMDD;
    $lotBatchInner = $labelCollection->lotBatch;
    $partNumberInner = $labelCollection->partNumber;
    $deliveryDocASNNumberInner = $labelCollection->deliveryDocASNNumber;
    $descriptionOfPartInner = $labelCollection->descriptionOfPart;
    $serialNumberInner = $labelCollection->serialNumber;

    $customerPlantNameInner = $labelCollection->customerPlantName;
    $customerPlantCodeInner = $labelCollection->customerPlantCode;
    $customerCodeInner = $labelCollection->customerCode;
    $dockCodeInner = $labelCollection->dockCode;
    $engAlertInner = $labelCollection->engAlert;
    $packageQuantityInner = $labelCollection->packageQuantity;
    $is_labeledInner = $labelCollection->is_labeled;
    $isMasterInner = $labelCollection->isMaster;
    $transportIdentifierInner = $labelCollection->collection[0]->transportIdentifier;

    $copyInner = $labelCollection->copy;
    $isMixInner = $labelCollection->is_mix;
    $despatchPackageIdInner = $labelCollection->despatch_package_id;
    $fkDespatchPackageIdInner = $labelCollection->fk_despatch_package_id;
    $packageTypeInner = $labelCollection->package_type;
    $packagingIdInner = $labelCollection->packaging_id;
    $fkPackagingIdInner = $labelCollection->fk_packaging_id;
    $labelNumberInner = $labelCollection->labelNumber;
    $labelTypeInner = $labelCollection->labelNumber;
    $totalInnerInner = $labelCollection->totalInner;
    $companyPrefixInner = $labelCollection->companyPrefix;

    $weightUnit = null;
    if(isset($labelCollection->inners[0]->weight_unit)){
        $weightUnit = $labelCollection->inners[0]->weight_unit;
    }

    $innerPackage = [
        "supplierName" => $supplierNameInner,
        "supplierGSDBCode" => $supplierGSDBCodeInner,
        "quantity" => $quantityInner,
        "container" => $containerInner,
        "grossWeight" => floor($grossWeightInner),
        "weight_unit" => $weightUnit,
        "date" => $dateInner,
        "lotBatch" => $lotBatchInner,
        "serialNumber" => $serialNumberInner,
        "partNumber" => $partNumberInner,
        "deliveryDocASNNumber" => $deliveryDocASNNumberInner,
        "descriptionOfPart" => $descriptionOfPartInner,
        "labelNumber" => $labelNumberInner,
        "customerPlantName" => $customerPlantNameInner,
        "dockCode" => $dockCodeInner,
        "engAlert" => $engAlertInner,
        "quantityPackage" => $quantityPackageInner,
        "typeAsn" => "InnerASN",
        "ftime" => $timestamp,
        "despatch_package_id" => $despatchPackageIdInner,
        "fk_despatch_package_id" => $fkDespatchPackageIdInner,
        "despatch_id" => $despatchId,
        "uom" => $uom,
        "transportIdentifier" => $transportIdentifierInner
    ];

    createASN($innerPackage);

}
