<?php

require_once __DIR__.'/create_asn_arikan.php';

$jsonFileName = dirname(dirname(__DIR__))."/data/data.json";

// set main parameter
$labelCollection = json_decode(file_get_contents($jsonFileName));

$despatchId = $labelCollection->despatch_id;
$timestamp = $labelCollection->label_timestamp;

$supplierNameOuter = $labelCollection->collection[0]->supplierName;
$quantityOuter = $labelCollection->collection[0]->quantity;
$quantityPackageOuter = $labelCollection->collection[0]->quantityPackage;
$containerOuter = $labelCollection->collection[0]->container;

$grossWeightOuter = $labelCollection->collection[0]->grossWeight;
$dateOuter = $labelCollection->collection[0]->date;
$dateYYMMDDOuter = $labelCollection->collection[0]->dateYYMMDD;
$lotBatchOuter = $labelCollection->collection[0]->lotBatch;
$partNumberOuter = $labelCollection->collection[0]->partNumber;
$deliveryDocASNNumberOuter = $labelCollection->collection[0]->deliveryDocASNNumber;
$descriptionOfPartOuter = $labelCollection->collection[0]->descriptionOfPart;
$serialNumberOuter = $labelCollection->collection[0]->serialNumber;

$customerPlantNameOuter = $labelCollection->collection[0]->customerPlantName;
$customerPlantCodeOuter = $labelCollection->collection[0]->customerPlantCode;
$customerCodeOuter = $labelCollection->collection[0]->customerCode;
$dockCodeOuter = $labelCollection->collection[0]->dockCode;
$engAlertOuter = $labelCollection->collection[0]->engAlert;
$packageQuantityOuter = $labelCollection->collection[0]->packageQuantity;
$is_labeledOuter = $labelCollection->collection[0]->is_labeled;
$isMasterOuter = $labelCollection->collection[0]->isMaster;

$copyOuter = $labelCollection->collection[0]->copy;
$isMixOuter = $labelCollection->collection[0]->is_mix;
$despatchPackageIdOuter = $labelCollection->collection[0]->despatch_package_id;
$fkDespatchPackageIdOuter = $labelCollection->collection[0]->fk_despatch_package_id;
$packageTypeOuter = $labelCollection->collection[0]->package_type;
$packagingIdOuter = $labelCollection->collection[0]->packaging_id;
$fkPackagingIdOuter = $labelCollection->collection[0]->fk_packaging_id;
$labelNumberOuter = $labelCollection->collection[0]->labelNumber;
$uom = $labelCollection->collection[0]->unitOfMeasure;
$transportIdentifierOuter = $labelCollection->collection[0]->transportIdentifier;

// outer package's inners
$innerDespatchPackageId = $labelCollection->collection[0]->inners[0]->despatch_package_id;
$fkProductPackagingId = $labelCollection->collection[0]->inners[0]->fk_product_packaging_id;
$innerFkPackagingId = $labelCollection->collection[0]->inners[0]->fk_packaging_id;
$fkDespatchPackageId = $labelCollection->collection[0]->inners[0]->fk_despatch_package_id;
$fkDespatchId = $labelCollection->collection[0]->inners[0]->fk_despatch_id;

$innerQuantityPackage = $labelCollection->collection[0]->inners[0]->quantity_package;
$batchNumber = $labelCollection->collection[0]->inners[0]->batch_number;
$innerLabelNumber = $labelCollection->collection[0]->inners[0]->label_number;
$innerGrossWeight = $labelCollection->collection[0]->inners[0]->gross_weight;
$netWeight = $labelCollection->collection[0]->inners[0]->net_weight;
$supplierGSDBCodeOuter = $labelCollection->collection[0]->supplierGSDBCode;

$weightUnit = $labelCollection->collection[0]->inners[0]->weight_unit;
$buyerCode = $labelCollection->collection[0]->inners[0]->buyer_code;
$dockIdentifier = $labelCollection->collection[0]->inners[0]->dock_identifier;
$internalDestination = $labelCollection->collection[0]->inners[0]->internal_destination;
$consigneeName = $labelCollection->collection[0]->inners[0]->consignee_name;
$consigneeIdentifier = $labelCollection->collection[0]->inners[0]->consignee_identifier;
$consigneeAltIdentifier = $labelCollection->collection[0]->inners[0]->consignee_alt_identifier;

$totalInner = $labelCollection->collection[0]->totalInner;

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

if(!isset($labelCollection->collection[1])){
    return;
}

// inner package
$supplierNameInner = $labelCollection->collection[1]->supplierName;
$supplierGSDBCodeInner = $labelCollection->collection[1]->supplierGSDBCode;
$quantityInner = $labelCollection->collection[1]->quantity;
$quantityPackageInner = $labelCollection->collection[1]->quantityPackage;
$containerInner = $labelCollection->collection[1]->container;
$uom = $labelCollection->collection[1]->unitOfMeasure;

$grossWeightInner = $labelCollection->collection[1]->grossWeight;
$dateInner = $labelCollection->collection[1]->date;
$dateYYMMDDInner = $labelCollection->collection[1]->dateYYMMDD;
$lotBatchInner = $labelCollection->collection[1]->lotBatch;
$partNumberInner = $labelCollection->collection[1]->partNumber;
$deliveryDocASNNumberInner = $labelCollection->collection[1]->deliveryDocASNNumber;
$descriptionOfPartInner = $labelCollection->collection[1]->descriptionOfPart;
$serialNumberInner = $labelCollection->collection[1]->serialNumber;

$customerPlantNameInner = $labelCollection->collection[1]->customerPlantName;
$customerPlantCodeInner = $labelCollection->collection[1]->customerPlantCode;
$customerCodeInner = $labelCollection->collection[1]->customerCode;
$dockCodeInner = $labelCollection->collection[1]->dockCode;
$engAlertInner = $labelCollection->collection[1]->engAlert;
$packageQuantityInner = $labelCollection->collection[1]->packageQuantity;
$is_labeledInner = $labelCollection->collection[1]->is_labeled;
$isMasterInner = $labelCollection->collection[1]->isMaster;
$transportIdentifierInner = $labelCollection->collection[0]->transportIdentifier;

$copyInner = $labelCollection->collection[1]->copy;
$isMixInner = $labelCollection->collection[1]->is_mix;
$despatchPackageIdInner = $labelCollection->collection[1]->despatch_package_id;
$fkDespatchPackageIdInner = $labelCollection->collection[1]->fk_despatch_package_id;
$packageTypeInner = $labelCollection->collection[1]->package_type;
$packagingIdInner = $labelCollection->collection[1]->packaging_id;
$fkPackagingIdInner = $labelCollection->collection[1]->fk_packaging_id;
$labelNumberInner = $labelCollection->collection[1]->labelNumber;
$labelTypeInner = $labelCollection->collection[1]->labelNumber;
$totalInnerInner = $labelCollection->collection[1]->totalInner;
$companyPrefixInner = $labelCollection->collection[1]->companyPrefix;

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
