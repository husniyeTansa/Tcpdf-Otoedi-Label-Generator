<?php

require_once('create_asn.php');

$jsonFileName = "C:\\xampp\htdocs\Tcpdf-Otoedi-Label-Generator\data.json";

//print_r (count(json_decode(file_get_contents($jsonFileName))->collection));

$labelCollection = json_decode(file_get_contents($jsonFileName));
$despatchId = $labelCollection->despatch_id;
$timestamp = $labelCollection->label_timestamp;
$supplierName = $labelCollection->collection[0]->supplierName;
$supplierGSDBCode = $labelCollection->collection[0]->supplierGSDBCode;
$quantity = $labelCollection->collection[0]->quantity;
$quantityPackage = $labelCollection->collection[0]->quantityPackage; // dış paket sayısı mı?
$unitOfMeasure = $labelCollection->collection[0]->unitOfMeasure;
$container = $labelCollection->collection[0]->container;

$grossWeight = $labelCollection->collection[0]->grossWeight;
$date = $labelCollection->collection[0]->date;
$dateYYMMDD = $labelCollection->collection[0]->dateYYMMDD;
$lotBatch = $labelCollection->collection[0]->lotBatch;
$shift = $labelCollection->collection[0]->shift;
$wc = $labelCollection->collection[0]->wc;
$partNumber = $labelCollection->collection[0]->partNumber;
$storageLocation = $labelCollection->collection[0]->storageLocation;
$deliveryDocASNNumber = $labelCollection->collection[0]->deliveryDocASNNumber;
$descriptionOfPart = $labelCollection->collection[0]->descriptionOfPart;
$serialNumber = $labelCollection->collection[0]->serialNumber;


$customerPlantName = $labelCollection->collection[0]->customerPlantName;
$customerPlantCode = $labelCollection->collection[0]->customerPlantCode;
$customerPlantAltCode = $labelCollection->collection[0]->customerPlantAltCode;
$customerCode = $labelCollection->collection[0]->customerCode;
$dockCode = $labelCollection->collection[0]->dockCode;
$engAlert = $labelCollection->collection[0]->engAlert;
$packageQuantity = $labelCollection->collection[0]->packageQuantity;
$is_labeled = $labelCollection->collection[0]->is_labeled;
$isMaster = $labelCollection->collection[0]->isMaster;


$copy = $labelCollection->collection[0]->copy;
$isMix = $labelCollection->collection[0]->is_mix;
$despatchPackageId = $labelCollection->collection[0]->despatch_package_id;
$fkDespatchPackageId = $labelCollection->collection[0]->fk_despatch_package_id;
$packageType = $labelCollection->collection[0]->package_type;
$packagingId = $labelCollection->collection[0]->packaging_id;
$fkPackagingId = $labelCollection->collection[0]->fk_packaging_id;
$labelNumber = $labelCollection->collection[0]->labelNumber;

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


$weightUnit = $labelCollection->collection[0]->inners[0]->weight_unit;
$buyerCode = $labelCollection->collection[0]->inners[0]->buyer_code;
$dockIdentifier = $labelCollection->collection[0]->inners[0]->dock_identifier;
$internalDestination = $labelCollection->collection[0]->inners[0]->internal_destination;
$consigneeName = $labelCollection->collection[0]->inners[0]->consignee_name;
$consigneeIdentifier = $labelCollection->collection[0]->inners[0]->consignee_identifier;
$consigneeAltIdentifier = $labelCollection->collection[0]->inners[0]->consignee_alt_identifier;



$totalInner = $labelCollection->collection[0]->totalInner;

$outerPackage = ["supplierName" => $supplierName,
                 "supplierGSDBCode" => $supplierGSDBCode,
                 "quantity" => $quantity,
                 "unitOfMeasure" => $unitOfMeasure,
                 "container" => $container,
                 "grossWeight" => floor($grossWeight),
                 "weight_unit" => $weightUnit,
                 "date" => $date,
                 "lotBatch" => $lotBatch,
                 "shift" => $shift,
                 "wc" => $wc,
                 "partNumber" => $partNumber,
                 "storageLocation" => $storageLocation,
                 "deliveryDocASNNumber" => $deliveryDocASNNumber,
                 "descriptionOfPart" => $descriptionOfPart,
                 "labelNumber" => $labelNumber,
                 "customerPlantName" => $customerPlantName,
                 "customerPlantAltCode" => $customerPlantAltCode,
                 "dockCode" => $dockCode,
                 "engAlert" => $engAlert,
                 "quantityPackage" => $quantityPackage];

createASN($outerPackage);
                 
//print_r($totalInner);die;


