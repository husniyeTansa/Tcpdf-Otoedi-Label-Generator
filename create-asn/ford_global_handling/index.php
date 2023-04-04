<?php

require_once __DIR__.'/create_asn_ford.php';

$jsonFileName = dirname(dirname(__DIR__))."/data/data.json";

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
    $supplierGSDBCodeOuter = $labelCollection->supplierGSDBCode;
    $quantityOuter = $labelCollection->quantity;
    $quantityPackageOuter = $labelCollection->quantityPackage;
    $unitOfMeasureOuter = $labelCollection->unitOfMeasure;
    $containerOuter = $labelCollection->container;

    $grossWeightOuter = $labelCollection->grossWeight;
    $dateOuter = $labelCollection->date;
    $dateYYMMDDOuter = $labelCollection->dateYYMMDD;
    $lotBatchOuter = $labelCollection->lotBatch;
    $shiftOuter = $labelCollection->shift;
    $wcOuter = $labelCollection->wc;
    $partNumberOuter = $labelCollection->partNumber;
    $storageLocationOuter = $labelCollection->storageLocation;
    $deliveryDocASNNumberOuter = $labelCollection->deliveryDocASNNumber;
    $descriptionOfPartOuter = $labelCollection->descriptionOfPart;
    $serialNumberOuter = $labelCollection->serialNumber;

    $customerPlantNameOuter = $labelCollection->customerPlantName;
    $customerPlantCodeOuter = $labelCollection->customerPlantCode;
    $customerPlantAltCodeOuter = $labelCollection->customerPlantAltCode;
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
        "supplierGSDBCode" => $supplierGSDBCodeOuter,
        "quantity" => $quantityOuter,
        "unitOfMeasure" => $unitOfMeasureOuter,
        "container" => $containerOuter,
        "grossWeight" => floor($grossWeightOuter),
        "weight_unit" => $weightUnit,
        "date" => $dateOuter,
        "lotBatch" => $lotBatchOuter,
        "shift" => $shiftOuter,
        "wc" => $wcOuter,
        "partNumber" => $partNumberOuter,
        "storageLocation" => $storageLocationOuter,
        "deliveryDocASNNumber" => $deliveryDocASNNumberOuter,
        "descriptionOfPart" => $descriptionOfPartOuter,
        "labelNumber" => $labelNumberOuter,
        "customerPlantName" => $customerPlantNameOuter,
        "customerPlantAltCode" => $customerPlantAltCodeOuter,
        "dockCode" => $dockCodeOuter,
        "engAlert" => $engAlertOuter,
        "quantityPackage" => $quantityPackageOuter,
        "typeAsn" => "OuterASN",
        "ftime" => $timestamp,
        "despatch_package_id" => $despatchPackageIdOuter,
        "fk_despatch_package_id" => $fkDespatchPackageIdOuter,
        "despatch_id" => $despatchId,
        "isMaster" => $isMasterOuter,
        "dateYYMMDD" => $dateYYMMDDOuter
    ];

    createASN($outerPackage);

}

function createInnerASN($labelCollection, $despatchId, $timestamp){

    // inner package
    $supplierNameInner = $labelCollection->supplierName;
    $supplierGSDBCodeInner = $labelCollection->supplierGSDBCode;
    $quantityInner = $labelCollection->quantity;
    $quantityPackageInner = $labelCollection->quantityPackage;
    $unitOfMeasureInner = $labelCollection->unitOfMeasure;
    $containerInner = $labelCollection->container;

    $grossWeightInner = $labelCollection->grossWeight;
    $dateInner = $labelCollection->date;
    $dateYYMMDDInner = $labelCollection->dateYYMMDD;
    $lotBatchInner = $labelCollection->lotBatch;
    $shiftInner = $labelCollection->shift;
    $wcInner = $labelCollection->wc;
    $partNumberInner = $labelCollection->partNumber;
    $storageLocationInner = $labelCollection->storageLocation;
    $deliveryDocASNNumberInner = $labelCollection->deliveryDocASNNumber;
    $descriptionOfPartInner = $labelCollection->descriptionOfPart;
    $serialNumberInner = $labelCollection->serialNumber;

    $customerPlantNameInner = $labelCollection->customerPlantName;
    $customerPlantCodeInner = $labelCollection->customerPlantCode;
    $customerPlantAltCodeInner = $labelCollection->customerPlantAltCode;
    $customerCodeInner = $labelCollection->customerCode;
    $dockCodeInner = $labelCollection->dockCode;
    $engAlertInner = $labelCollection->engAlert;
    $packageQuantityInner = $labelCollection->packageQuantity;
    $is_labeledInner = $labelCollection->is_labeled;
    $isMasterInner = $labelCollection->isMaster;

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
        "unitOfMeasure" => $unitOfMeasureInner,
        "container" => $containerInner,
        "grossWeight" => floor($grossWeightInner),
        "weight_unit" => $weightUnit,
        "date" => $dateInner,
        "lotBatch" => $lotBatchInner,
        "shift" => $shiftInner,
        "wc" => $wcInner,
        "partNumber" => $partNumberInner,
        "storageLocation" => $storageLocationInner,
        "deliveryDocASNNumber" => $deliveryDocASNNumberInner,
        "descriptionOfPart" => $descriptionOfPartInner,
        "labelNumber" => $labelNumberInner,
        "customerPlantName" => $customerPlantNameInner,
        "customerPlantAltCode" => $customerPlantAltCodeInner,
        "dockCode" => $dockCodeInner,
        "engAlert" => $engAlertInner,
        "quantityPackage" => $quantityPackageInner,
        "typeAsn" => "InnerASN",
        "ftime" => $timestamp,
        "despatch_package_id" => $despatchPackageIdInner,
        "fk_despatch_package_id" => $fkDespatchPackageIdInner,
        "despatch_id" => $despatchId,
        "isMaster" => $isMasterInner,
        "dateYYMMDD" => $dateYYMMDDInner
    ];

    createASN($innerPackage);

}

