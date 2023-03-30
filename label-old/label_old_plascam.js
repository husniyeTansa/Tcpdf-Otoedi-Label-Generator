import {JSDOM} from 'jsdom'
import generateBarcode128 from "./b128"

var QRCode = require("qrcode-svg");

export default function generatePlascamLabel(values, svgId) {
    let settings = {
        "titleFontSize": "9px", // 9 px
        "1LPBFontSize": "60px",
        "1.5LPBFontSize": "52px",
        "2LPBFontSize": "48px",
        "2.5LPBFontSize": "36px",
        "3LPBFontSize": "12px",
        "4LPBFontSize": "18px",
        "5LPBFontSize": "14px",
        "6LPBFontSize": "12px",
        "7LPBFontSize": "10px",
        "8LPBFontSize": "9px",
        "optionalFieldColor": "gray"
    };
    const jsDom = new JSDOM(`<!DOCTYPE html><body></body>`, {
        resources: "usable"
    })
    const {document} = jsDom.window;

    for (let [key, value] of Object.entries(values)) {
        if (values[key] == null) {
            values[key] = '';
        }
    }

    let svg = document.createElementNS('https://www.w3.org/2000/svg', 'svg');
    svg.setAttribute('width', '210' + "mm");
    svg.setAttribute('height', '148' + "mm");
    svg.setAttribute("style", "font-family:Arial,Helvetica Consensed !important; font-weight:bold;");
    svg.setAttribute('x', '0');
    svg.setAttribute('y', '0');
    svg.setAttribute('version', '1.1');
    svg.setAttribute('xmlns', 'https://www.w3.org/2000/svg');
    svg.setAttribute('xmlns:xlink', 'https://www.w3.org/1999/xlink');
    svg.setAttribute('id', svgId);

    //let g = document.createElementNS('https://www.w3.org/2000/svg', 'g');
    //g.setAttribute('transform','translate(0,-535.00002)');


    let rect0 = document.createElementNS('https://www.w3.org/2000/svg', 'rect');
    rect0.setAttribute('style', 'fill:#000000; fill-opacity: 1');
    rect0.setAttribute('width', '200' + "mm");
    rect0.setAttribute('height', '0.25' + "mm");
    rect0.setAttribute('x', '5' + "mm");
    rect0.setAttribute('y', '5' + "mm");
    rect0.setAttribute('id', 'rect0');

    let rect1 = document.createElementNS('https://www.w3.org/2000/svg', 'rect');
    rect1.setAttribute('style', 'fill:#000000; fill-opacity: 1');
    rect1.setAttribute('width', '143' + "mm");
    rect1.setAttribute('height', '0.25' + "mm");
    rect1.setAttribute('x', '5' + "mm");
    rect1.setAttribute('y', '22.25' + "mm");
    rect1.setAttribute('id', 'rect1');

    let rect2 = document.createElementNS('https://www.w3.org/2000/svg', 'rect');
    rect2.setAttribute('style', 'fill:#000000; fill-opacity: 1');
    rect2.setAttribute('width', '200' + "mm");
    rect2.setAttribute('height', '0.25' + "mm");
    rect2.setAttribute('x', '5' + "mm");
    rect2.setAttribute('y', '56.75' + "mm");
    rect2.setAttribute('id', 'rect2');

    let rect3 = document.createElementNS('https://www.w3.org/2000/svg', 'rect');
    rect3.setAttribute('style', 'fill:#000000; fill-opacity: 1');
    rect3.setAttribute('width', '200' + "mm");
    rect3.setAttribute('height', '0.25' + "mm");
    rect3.setAttribute('x', '5' + "mm");
    rect3.setAttribute('y', '91.25' + "mm");
    rect3.setAttribute('id', 'rect3');

    let rect4 = document.createElementNS('https://www.w3.org/2000/svg', 'rect');
    rect4.setAttribute('style', 'fill:#000000; fill-opacity: 1');
    rect4.setAttribute('width', '200' + "mm");
    rect4.setAttribute('height', '0.25' + "mm");
    rect4.setAttribute('x', '5' + "mm");
    rect4.setAttribute('y', '108.5' + "mm");
    rect4.setAttribute('id', 'rect4');

    let rect5 = document.createElementNS('https://www.w3.org/2000/svg', 'rect');
    rect5.setAttribute('style', 'fill:#000000; fill-opacity: 1');
    rect5.setAttribute('width', '200' + "mm");
    rect5.setAttribute('height', '0.25' + "mm");
    rect5.setAttribute('x', '5' + "mm");
    rect5.setAttribute('y', '143' + "mm");
    rect5.setAttribute('id', 'rect5');

    let recth0 = document.createElementNS('https://www.w3.org/2000/svg', 'rect');
    recth0.setAttribute('style', 'fill:#000000; fill-opacity: 1');
    recth0.setAttribute('width', '0.25' + "mm");
    recth0.setAttribute('height', '138' + "mm");
    recth0.setAttribute('x', '5' + "mm");
    recth0.setAttribute('y', '5' + "mm");
    recth0.setAttribute('id', 'recth0');

    let recth1 = document.createElementNS('https://www.w3.org/2000/svg', 'rect');
    recth1.setAttribute('style', 'fill:#000000; fill-opacity: 1');
    recth1.setAttribute('width', '0.25' + "mm");
    recth1.setAttribute('height', '34.5' + "mm");
    recth1.setAttribute('x', '80' + "mm");
    recth1.setAttribute('y', '22.25' + "mm");
    recth1.setAttribute('id', 'recth1');

    let recth2 = document.createElementNS('https://www.w3.org/2000/svg', 'rect');
    recth2.setAttribute('style', 'fill:#000000; fill-opacity: 1');
    recth2.setAttribute('width', '0.25' + "mm");
    recth2.setAttribute('height', '17.25' + "mm");
    recth2.setAttribute('x', '105' + "mm");
    recth2.setAttribute('y', '91.25' + "mm");
    recth2.setAttribute('id', 'recth2');

    let recth3 = document.createElementNS('https://www.w3.org/2000/svg', 'rect');
    recth3.setAttribute('style', 'fill:#000000; fill-opacity: 1');
    recth3.setAttribute('width', '0.25' + "mm");
    recth3.setAttribute('height', '34.5' + "mm");
    recth3.setAttribute('x', '118' + "mm");
    recth3.setAttribute('y', '108.5' + "mm");
    recth3.setAttribute('id', 'recth3');

    let recth4 = document.createElementNS('https://www.w3.org/2000/svg', 'rect');
    recth4.setAttribute('style', 'fill:#000000; fill-opacity: 1');
    recth4.setAttribute('width', '0.25' + "mm");
    recth4.setAttribute('height', '138' + "mm");
    recth4.setAttribute('x', '205' + "mm");
    recth4.setAttribute('y', '5' + "mm");
    recth4.setAttribute('id', 'recth4');

    let triangleBottom = document.createElementNS('http://www.w3.org/2000/svg', 'polygon');
    triangleBottom.setAttribute('points', (205 / 10 * 35.43307) + ' ' + (85 / 10 * 35.43307) + ','
        + (215 / 10 * 35.43307) + ' ' + (85 / 10 * 35.43307) + ','
        + (210 / 10 * 35.43307) + ' ' + (95 / 10 * 35.43307));
    triangleBottom.setAttribute('style', 'stroke:black;stroke-width:1;fill:white');
    triangleBottom.setAttribute('id', 'triangle-bottom');

    let supplierNameTitle = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    supplierNameTitle.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    supplierNameTitle.setAttribute('x', '6.5' + "mm");
    supplierNameTitle.setAttribute('y', '9' + "mm");
    supplierNameTitle.appendChild(document.createTextNode('SUPP (V) '));

    let supplierName = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    supplierName.setAttribute('style', 'font-size: ' + settings["7LPBFontSize"]);
    supplierName.setAttribute('x', '20' + "mm");
    supplierName.setAttribute('y', '9' + "mm");
    supplierName.appendChild(document.createTextNode(values.supplierName));

    generateBarcode128('V' + values.supplierGSDBCode, svg, {
        //"colWidth": 53.9/92,
        //"barcodeWidth": 53.9,
        "startPosX": 11.4,
        "startPosY": 11.5,
        "barcodeWidth": 0,
        "colWidth": 0.4,
        "maxWidth": 53.9,
        "colHeight": 9.5
    }, document);

    let supplierGSDBCode = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    supplierGSDBCode.setAttribute('style', 'font-size: ' + settings["1.5LPBFontSize"] + "; font-weight: bold;text-align:center");
    supplierGSDBCode.setAttribute('width', '79.7' + "mm");
    supplierGSDBCode.setAttribute('id', 'SupplierGSDBCode');
    supplierGSDBCode.setAttribute('class', 'SupplierGSDBCode');
    supplierGSDBCode.setAttribute('y', '20.25' + "mm");
    supplierGSDBCode.appendChild(document.createTextNode(values.supplierGSDBCode));

    let quantityTitle1 = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    quantityTitle1.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    quantityTitle1.setAttribute('x', '6.5' + "mm");
    quantityTitle1.setAttribute('y', '26.25' + "mm");
    quantityTitle1.appendChild(document.createTextNode('QTY'));


    let quantityTitle2 = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    quantityTitle2.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    quantityTitle2.setAttribute('x', '6.5' + "mm");
    quantityTitle2.setAttribute('y', '30' + "mm");
    quantityTitle2.appendChild(document.createTextNode('(Q)'));

    // MIX DEGIL ISE YAZ
    if (values.is_mix !== "1") {
        generateBarcode128("Q" + values.quantity, svg, {
            "colHeight": 9.5,
            "colWidth": 0.4,
            "barcodeWidth": 0,
            //"barcodeWidth": 38.6,
            "maxWidth": 53.9,
            "startPosX": 11.4,
            "startPosY": 46
        }, document);
    }

    let quantity = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    quantity.setAttribute('style', 'font-size: ' + settings["1.5LPBFontSize"]);
    quantity.setAttribute('id', 'QTY');
    quantity.setAttribute('class', 'QTY');
    quantity.setAttribute('y', '40' + "mm");
    quantity.appendChild(document.createTextNode(values.quantity));

    let unitOfMeasure = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    unitOfMeasure.setAttribute('style', 'font-size: ' + settings["5LPBFontSize"]);
    unitOfMeasure.setAttribute('id', 'QTYUnitOfMeasure');
    unitOfMeasure.setAttribute('class', 'QTYUnitOfMeasure');
    unitOfMeasure.setAttribute('y', '42.50' + "mm");
    unitOfMeasure.appendChild(document.createTextNode(values.unitOfMeasure));

    let containerTitle = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    containerTitle.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    containerTitle.setAttribute('x', '81.5' + "mm");
    containerTitle.setAttribute('y', '26.25' + "mm");
    containerTitle.appendChild(document.createTextNode('CONTAINER'));

    let container = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    container.setAttribute('style', 'font-size: ' + settings["4LPBFontSize"]);
    container.setAttribute('x', '81.5' + "mm");
    container.setAttribute('y', '32' + "mm");
    container.appendChild(document.createTextNode(values.container));


    let grossWeightTitle = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    grossWeightTitle.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    grossWeightTitle.setAttribute('x', '81.5' + "mm");
    grossWeightTitle.setAttribute('y', '37.25' + "mm");
    grossWeightTitle.appendChild(document.createTextNode('GROSS WGT'));

    let grossWeight = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    grossWeight.setAttribute('style', 'font-size: ' + settings["4LPBFontSize"]);
    grossWeight.setAttribute('x', '81.5' + "mm");
    grossWeight.setAttribute('y', '43' + "mm");
    grossWeight.appendChild(document.createTextNode(values.grossWeight));

    let grossWeightUOM = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    grossWeightUOM.setAttribute('style', 'font-size: ' + settings["4LPBFontSize"]);
    grossWeightUOM.setAttribute('x', '110' + "mm");
    grossWeightUOM.setAttribute('y', '43' + "mm");
    grossWeightUOM.appendChild(document.createTextNode('KG')); // LB or KG

    let dateTitle = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    dateTitle.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    dateTitle.setAttribute('x', '81.5' + "mm");
    dateTitle.setAttribute('y', '48.25' + "mm");
    dateTitle.appendChild(document.createTextNode('DATE'));

    let date = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    date.setAttribute('style', 'font-size: ' + settings["4LPBFontSize"]);
    date.setAttribute('x', '81.5' + "mm");
    date.setAttribute('y', '54' + "mm");
    date.appendChild(document.createTextNode(values.date));

    let lotBatchTitle = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    lotBatchTitle.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    lotBatchTitle.setAttribute("fill", settings["optionalFieldColor"]);
    lotBatchTitle.setAttribute('x', '130' + "mm");
    lotBatchTitle.setAttribute('y', '37.25' + "mm");
    lotBatchTitle.appendChild(document.createTextNode('LOT / BATCH NO'));

    let lotBatch = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    lotBatch.setAttribute('style', 'font-size: ' + settings["4LPBFontSize"]);
    lotBatch.setAttribute("fill", settings["optionalFieldColor"]);
    lotBatch.setAttribute('x', '130' + "mm");
    lotBatch.setAttribute('y', '43' + "mm");
    lotBatch.appendChild(document.createTextNode(values.lotBatch));

    let shiftTitle = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    shiftTitle.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    shiftTitle.setAttribute("fill", settings["optionalFieldColor"]);
    shiftTitle.setAttribute('x', '130' + "mm");
    shiftTitle.setAttribute('y', '48.25' + "mm");
    shiftTitle.appendChild(document.createTextNode('SHIFT'));


    let shift = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    shift.setAttribute('style', 'font-size: ' + settings["4LPBFontSize"]);
    shift.setAttribute("fill", settings["optionalFieldColor"]);
    shift.setAttribute('x', '130' + "mm");
    shift.setAttribute('y', '54' + "mm");
    shift.appendChild(document.createTextNode(values.shift));

    let wcTitle = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    wcTitle.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    wcTitle.setAttribute("fill", settings["optionalFieldColor"]);
    wcTitle.setAttribute('x', '145' + "mm");
    wcTitle.setAttribute('y', '48.25' + "mm");
    wcTitle.appendChild(document.createTextNode('W/C'));

    let wc = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    wc.setAttribute('style', 'font-size: ' + settings["4LPBFontSize"]);
    wc.setAttribute("fill", settings["optionalFieldColor"]);
    wc.setAttribute('x', '145' + "mm");
    wc.setAttribute('y', '54' + "mm");
    wc.appendChild(document.createTextNode(values.wc));


    let partNumberTitle1 = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    partNumberTitle1.setAttribute('style', 'font-size: ' + settings["8LPBFontSize"]);
    partNumberTitle1.setAttribute('x', '6.5' + "mm");
    partNumberTitle1.setAttribute('y', '80.75' + "mm");
    partNumberTitle1.appendChild(document.createTextNode('PART'));

    let partNumberTitle2 = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    partNumberTitle2.setAttribute('style', 'font-size: ' + settings["2LPBFontSize"]);
    partNumberTitle2.setAttribute('x', '18.4' + "mm");
    partNumberTitle2.setAttribute('y', '71.75' + "mm");
    partNumberTitle2.appendChild(document.createTextNode(values.partNumber));

    let polygonStartX = 189 / 0.264583333;
    let polygonStartY = 79 / 0.264583333;
    let polygonWidth = 40;
    let polygonHeight = 20 * Math.sqrt(3);

    createPolygon(polygonWidth, polygonHeight, polygonStartX, polygonStartY);

    let partNumberArea = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    partNumberArea.setAttribute('style', 'font-size: ' + settings["8LPBFontSize"]);
    partNumberArea.setAttribute('x', '8' + "mm");
    partNumberArea.setAttribute('y', '84.50' + "mm");
    partNumberArea.appendChild(document.createTextNode('(P)'));

    let partNumber = "P" + values.partNumber;
    //console.log(partNumber.replace(new RegExp("-", "g"), ' '));
    // MIX DEGIL ISE YAZ
    if (values.is_mix !== "1") {
        generateBarcode128(partNumber.replace(new RegExp("-", "g"), ' '), svg, {
            "colHeight": 12,
            //"colWidth": 53.9/92,
            "barcodeWidth": 140,
            "startPosX": 18.4,
            "startPosY": 76.75
        }, document);
    }
    let storageLocationTitle = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    storageLocationTitle.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    storageLocationTitle.setAttribute('x', '6.5' + "mm");
    storageLocationTitle.setAttribute('y', '95.25' + "mm");
    storageLocationTitle.appendChild(document.createTextNode('STR LOC 1'));

    let storageLocation = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    storageLocation.setAttribute('style', 'font-size: ' + settings["3LPBFontSize"]);
    storageLocation.setAttribute('x', '6.5' + "mm");
    storageLocation.setAttribute('y', '104' + "mm");
    storageLocation.appendChild(document.createTextNode(values.storageLocation));

    let deliveryDocASNNumberTitle = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    deliveryDocASNNumberTitle.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    deliveryDocASNNumberTitle.setAttribute('x', '106.5' + "mm");
    deliveryDocASNNumberTitle.setAttribute('y', '95.25' + "mm");
    deliveryDocASNNumberTitle.appendChild(document.createTextNode('DELIVERY DOC/ASN NUMBER'));

    let deliveryDocASNNumber = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    deliveryDocASNNumber.setAttribute('style', 'font-size: ' + settings["3LPBFontSize"]);
    deliveryDocASNNumber.setAttribute('x', '106.5' + "mm");
    deliveryDocASNNumber.setAttribute('y', '104' + "mm");
    deliveryDocASNNumber.appendChild(document.createTextNode(values.deliveryDocASNNumber));


    generateBarcode128("N" + values.deliveryDocASNNumber, svg, {
        "colHeight": 11,
        //"colWidth": 53.9/92,
        "barcodeWidth": 45,
        "startPosX": 155,
        "startPosY": 96
    }, document);
    /*
     let descriptionOfPart = document.createElementNS('https://www.w3.org/2000/svg', 'text');
     descriptionOfPart.style.fontSize = settings["5LPBFontSize"];
     descriptionOfPart.setAttribute('x', '6.5' + "mm");
     descriptionOfPart.setAttribute('y', '113.5' + "mm");
     descriptionOfPart.appendChild(document.createTextNode('3S4X A045A74 AAZUYI'));*/
    /*
     let title14 = document.createElementNS('https://www.w3.org/2000/svg', 'text');
     title14.style.fontSize = settings["5LPBFontSize"];
     title14.setAttribute('x', '6.5' + "mm");
     title14.setAttribute('y', '118.5' + "mm");
     title14.appendChild(document.createTextNode('2527 CNSL FRT LOMED DK GRAPH KIT'));*/

    let descriptionOfPart = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    descriptionOfPart.setAttribute('style', 'font-size: ' + settings["5LPBFontSize"]);
    descriptionOfPart.setAttribute('x', '6.5' + "mm");
    descriptionOfPart.setAttribute('y', '113.5' + "mm");
    descriptionOfPart.appendChild(document.createTextNode(values.descriptionOfPart));


    let serialNumberTitle = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    serialNumberTitle.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    serialNumberTitle.setAttribute('x', '6.5' + "mm");
    serialNumberTitle.setAttribute('y', '129.5' + "mm");

    let serialNumberTypeCode = values.is_mix !== "1" ? 'S' : '5S';
    // important : burası ise yaramiyor. HtmlBuilder içerisinde Helper::passSn fonksiyonu ile burası eziliyor!
    let serialNumberValue = serialNumberTypeCode + values.deliveryDocASNNumber + (values.partNumber.replace(/\s/g, '') || "") + (values.serialNumber || "0");

    serialNumberTitle.appendChild(document.createTextNode('SERIAL NO(' + serialNumberTypeCode + ')'));
    generateBarcode128(serialNumberValue, svg, {
        "colHeight": 9.5,
        //"colWidth": 53.9/92,
        "barcodeWidth": 85,
        "startPosX": 11.5,
        "startPosY": 133.5,
        "snBarcode": "snBarcode"
    }, document);

    /*if (values.is_mix !== "1") {
        serialNumberTitle.appendChild(document.createTextNode('SERIAL NO(S)'));
        generateBarcode128("S" + values.deliveryDocASNNumber + (values.serialNumber || ""), svg, {
            "colHeight": 9.5,
            //"colWidth": 53.9/92,
            "barcodeWidth": 53.9,
            "startPosX": 11.5,
            "startPosY": 133.5,
            "snBarcode": "snBarcode"
        }, document);
    } else {
        serialNumberTitle.appendChild(document.createTextNode('SERIAL NO(5S)'));
        generateBarcode128("5S" + values.deliveryDocASNNumber + (values.serialNumber || ""), svg, {
            "colHeight": 9.5,
            //"colWidth": 53.9/92,
            "barcodeWidth": 53.9,
            "startPosX": 11.5,
            "startPosY": 133.5,
            "snBarcode": "snBarcode"
        }, document);
    }*/

    let serialNumber = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    serialNumber.setAttribute('style', 'font-size: ' + settings["3LPBFontSize"]);
    serialNumber.setAttribute('id', 'serialNumber');
    serialNumber.setAttribute('class', 'serialNumber');
    serialNumber.setAttribute('x', '30.5' + "mm");
    serialNumber.setAttribute('y', '129.5' + "mm");
    serialNumber.appendChild(document.createTextNode(serialNumberValue, 50));

    let masterLabel = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    masterLabel.setAttribute('style', 'font-size: ' + settings["3LPBFontSize"]);
    masterLabel.setAttribute('id', 'masterLabel');
    masterLabel.setAttribute('class', 'masterLabel');
    masterLabel.setAttribute('x', '152' + "mm");
    masterLabel.setAttribute('y', '24' + "mm");
    if (values.is_mix !== "1") {
        masterLabel.appendChild(document.createTextNode('MASTER LABEL'));
    } else {
        masterLabel.appendChild(document.createTextNode('MIXED LABEL'));
    }

    let title24 = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    title24.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    title24.setAttribute("fill", settings["optionalFieldColor"]);
    title24.setAttribute('x', '100' + "mm");
    title24.setAttribute('y', '128.5' + "mm");
    title24.appendChild(document.createTextNode('WT2D'));


    let data24 = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    data24.setAttribute('style', 'font-size: ' + settings["8LPBFontSize"]);
    data24.setAttribute("fill", settings["optionalFieldColor"]);
    data24.setAttribute('x', '100' + "mm");
    data24.setAttribute('y', '132.5' + "mm");
    data24.appendChild(document.createTextNode('EF4526'));


    let title25 = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    title25.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    title25.setAttribute("fill", settings["optionalFieldColor"]);
    title25.setAttribute('x', '70' + "mm");
    title25.setAttribute('y', '138' + "mm");
    title25.appendChild(document.createTextNode('MADE IN'));


    let customerPlantNameTitle = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    customerPlantNameTitle.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    customerPlantNameTitle.setAttribute('x', '119.5' + "mm");
    customerPlantNameTitle.setAttribute('y', '112.5' + "mm");
    customerPlantNameTitle.appendChild(document.createTextNode('TO'));

    let customerPlantName = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    customerPlantName.setAttribute('style', 'font-size: ' + settings["8LPBFontSize"]);
    customerPlantName.setAttribute('x', '119.5' + "mm");
    customerPlantName.setAttribute('y', '116.5' + "mm");
    customerPlantName.appendChild(document.createTextNode(values.customerPlantName));


    let customerCodeTitle = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    customerCodeTitle.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    customerCodeTitle.setAttribute('x', '119.5' + "mm");
    customerCodeTitle.setAttribute('y', '122' + "mm");
    customerCodeTitle.appendChild(document.createTextNode('CUST'));


    let customerCode = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    customerCode.setAttribute('style', 'font-size: ' + settings["3LPBFontSize"]);
    customerCode.setAttribute('x', '119.5' + "mm");
    customerCode.setAttribute('y', '133' + "mm");
    customerCode.appendChild(document.createTextNode(values.customerCode));


    let engAlertTitle = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    engAlertTitle.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    engAlertTitle.setAttribute("fill", settings["optionalFieldColor"]);
    engAlertTitle.setAttribute('x', '119.5' + "mm");
    engAlertTitle.setAttribute('y', '140' + "mm");
    engAlertTitle.appendChild(document.createTextNode('ENG ALERT'));


    let engAlert = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    engAlert.setAttribute('style', 'font-size: ' + settings["8LPBFontSize"]);
    engAlert.setAttribute("fill", settings["optionalFieldColor"]);
    engAlert.setAttribute('x', '140' + "mm");
    engAlert.setAttribute('y', '140' + "mm");
    engAlert.appendChild(document.createTextNode(values.engAlert));


    let dockCodeTitle = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    dockCodeTitle.setAttribute('style', 'font-size: ' + settings["titleFontSize"]);
    dockCodeTitle.setAttribute('x', '183' + "mm");
    dockCodeTitle.setAttribute('y', '112.5' + "mm");
    dockCodeTitle.appendChild(document.createTextNode('DOCK CODE'));


    let dockCode = document.createElementNS('https://www.w3.org/2000/svg', 'text');
    dockCode.setAttribute('style', 'font-size: ' + settings["1.5LPBFontSize"]);
    dockCode.setAttribute('id', 'dockCode');
    dockCode.setAttribute('class', 'dockCode');
    dockCode.setAttribute('y', '133' + "mm");
    dockCode.appendChild(document.createTextNode(values.dockCode));


    //svg.appendChild(rect0); // çerçeve
    svg.appendChild(rect1);
    svg.appendChild(rect2);
    svg.appendChild(rect3);
    svg.appendChild(rect4);
    //svg.appendChild(rect5); // çerçeve
    //svg.appendChild(recth0); // çerçeve
    svg.appendChild(recth1);
    svg.appendChild(recth2);
    svg.appendChild(recth3);
    //svg.appendChild(recth4); // çerçeve
    // MIX ISE YAZ
    if (values.is_mix !== "1") {
        svg.appendChild(unitOfMeasure);
        svg.appendChild(partNumberTitle1);
        svg.appendChild(partNumberTitle2);
        svg.appendChild(partNumberArea);
        svg.appendChild(quantity);
        svg.appendChild(descriptionOfPart);

    } else {
        svg.appendChild(triangleBottom);
    }


    svg.appendChild(supplierNameTitle);
    svg.appendChild(supplierName);
    svg.appendChild(quantityTitle1);
    svg.appendChild(quantityTitle2);

    svg.appendChild(containerTitle);
    svg.appendChild(container);
    svg.appendChild(grossWeightTitle);
    svg.appendChild(grossWeight);
    svg.appendChild(dateTitle);
    svg.appendChild(date);

    //svg.appendChild(polygon);

    svg.appendChild(storageLocationTitle);
    svg.appendChild(storageLocation);
    svg.appendChild(deliveryDocASNNumberTitle);
    svg.appendChild(deliveryDocASNNumber);

    //svg.appendChild(title14);
    svg.appendChild(serialNumberTitle);
    svg.appendChild(serialNumber);
    if (values.isMaster === 1) {
        svg.appendChild(masterLabel);
    }
    svg.appendChild(customerPlantNameTitle);
    svg.appendChild(customerPlantName);
    svg.appendChild(engAlertTitle);
    svg.appendChild(engAlert);
    svg.appendChild(customerCodeTitle);
    svg.appendChild(customerCode);
    svg.appendChild(dockCodeTitle);
    svg.appendChild(dockCode);
    svg.appendChild(grossWeightUOM);
    svg.appendChild(lotBatchTitle);
    svg.appendChild(lotBatch);
    svg.appendChild(shiftTitle);
    //svg.appendChild(shift);
    svg.appendChild(wcTitle);
    //svg.appendChild(wc);
    //svg.appendChild(title24);
    //svg.appendChild(data24);
    //svg.appendChild(title25);
    svg.appendChild(supplierGSDBCode);

    //svg.appendChild(g);
    let div = document.createElement('div');
    /* 8. sayfadan sonra olusan tasamalari onlemek icin bu classin eklenmesi gerekç class ozellikler FO_LABEL.php icerisinde */
    div.setAttribute("class", "label");
    div.appendChild(svg);

    document.body.appendChild(div);


    try {
        let element = document.getElementsByClassName('SupplierGSDBCode');
        for (let i = 0; i < element.length; i++) {
            element[i].setAttribute('x', ((82.7 - (29.3 * parseInt(values.supplierGSDBCode.toString().length) * 0.264583333) / 2) + 65.3 - 41) + "mm");
        }

        if (values.is_mix !== "1") {
            element = document.getElementsByClassName('QTYUnitOfMeasure');
            for (let i = 0; i < element.length; i++) {
                element[i].setAttribute('x', (77 - (9.36 * parseInt(values.unitOfMeasure.toString().length) * 0.264583333)) + "mm");
            }

            element = document.getElementsByClassName('QTY');
            for (let i = 0; i < element.length; i++) {
                element[i].setAttribute("x", (78 - (29.3 * parseInt(values.quantity.toString().length) * 0.264583333)) + 'mm')
                element[i].setAttribute('y', (27.5 + (58.02 * 0.264583333) / 2) + "mm");
            }
        }

        // element = document.getElementsByClassName('serialNumber');
        // values.serialNumber = values.serialNumber || ""
        // for (let i = 0; i < element.length; i++) {
        //     element[i].setAttribute('x', (63 - (8.02 * parseInt(values.serialNumber.toString().length) * 0.264583333)) + "mm");
        // }

        element = document.getElementsByClassName('dockCode');
        values.dockCode = values.dockCode || ""
        for (let i = 0; i < element.length; i++) {
            element[i].setAttribute('x', (200 - (52.02 * parseInt(values.dockCode.toString().length) * 0.264583333)) + 28 + "mm");
        }
    } catch (err) {
        console.log(err)
    }

    let style = document.createElement('style');
    style.innerHTML = 'text{font-family:Arial,Helvetica !important}@page{size:auto;margin:0;width:210mm;height:148mm}svg{width:210mm;height:148mm}*{margin:0;font-family:Arial,Helvetica !important}body,html{margin:0;font-family:Arial,Helvetica !important;}.label{font-family:Arial,Helvetica;width:auto;border:0;margin:0 1%;padding:0;float:none;position:static;overflow:visible}';
    let head = document.getElementsByTagName('head')[0];
    head.appendChild(style);

    return document.documentElement.outerHTML;

    function leftPadding(char, pad, maxLen) {
        let charLength = char.length;
        for (let i = charLength; i < maxLen; i++) {
            char = pad + "" + char;
        }
        return char;
    }


    function createPolygon(width, height, startPointX, startPointY) {
        let polygon = document.createElementNS('https://www.w3.org/2000/svg', 'polygon');
        polygon.setAttribute('points', polygonStartX + ',' + polygonStartY + ' ' + (polygonStartX + width) + ',' + polygonStartY + ' ' + (polygonStartX + width / 2) + ',' + (polygonStartY + height));
        polygon.setAttribute('style', 'fill: #fff');
        polygon.setAttribute('style', 'fill: #000');
        return polygon;
    }
}
