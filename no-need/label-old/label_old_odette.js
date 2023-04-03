/**
 * Odette V1.4 Label Generator Class
 *
 * Mixed load carrier label, Large load carrier label, Container label [small load carrier (KLT)]
 *
 * @link   https://map.myjetbrains.com/youtrack/issue/OTO-100
 * @file   Generator class of Odette V1.4 label.
 * @author Yasir Seyrek
 * @since  2022-01-28
 */

import { JSDOM } from 'jsdom'
import barcode128 from "./b128"
import SSCC from "./SSCC"
import log from "loglevel";

export default class LabelOdetteV1 {
    constructor(svgId) {
        this.svgId = svgId
        this.jsdom = new JSDOM(`<!DOCTYPE html><body></body>`)
        this.document = this.jsdom.window.document
    }

    draw(values) {
        this.container()
            .frame()
            .headings(values)
            .values(values)
            .barcodes(values)
            .wrapper()
            .style()

        return this.document.documentElement.outerHTML
    }

    frame() {
        this.rect(0, 20, 210, .25, 'hl1')
            .rect(100, 33, 110, .25, 'hl2')
            .rect(0, 46, 210, .25, 'hl3')
            .rect(0, 76, 210, .25, 'hl4')
            .rect(100, 86.5, 110, .25, 'hl5')
            .rect(0, 104, 100, .25, 'hl6')
            .rect(100, 114.5, 110, .25, 'hl7')
            .rect(0, 125, 210, .25, 'hl8')
            .rect(100, 0, .25, 46, 'vl1')
            .rect(136, 33, .25, 13, 'vl2')
            .rect(172, 33, .25, 13, 'vl3')
            .rect(100, 76, .25, 49, 'vl4')
            .rect(100, 125, .25, 23, 'vl5')
            .rect(140, 114.5, .25, 10.5, 'vl6')

        return this
    }

    headings(values) {
        this.text('RECEIVER', '9', 5, 5, 'bold')
            .text('DOCK', '9', 103, 5, 'bold')
            .text('ADVICE NOTE NO', '9', 5, 23, 'bold')
            .text('SUPPLIER ADDRESS', '9', 103, 23, 'bold')
            .text('NET WEIGHT (KG)', '9', 103, 36, 'bold')
            .text('GROSS WEIGHT (KG)', '9', 139, 36, 'bold')
            .text('NO OF BOXES', '9', 175, 36, 'bold')

        if (values.is_mix !== '1') {
            this.text('PART NO (P)', '9', 5, 49, 'bold')
        }

        this.text('QUANTITY (Q)', '9', 5, 79, 'bold')
            .text('DESCRIPTION', '9', 103, 79, 'bold')
            .text('SUPPLIER PART NO (30S)', '9', 103, 89.5, 'bold')
            .text('SUPPLIER (V)', '9', 5, 109, 'bold')
            .text('PROD DATE', '9', 103, 117.5, 'bold')
            .text('ENGR. CHANGE', '9', 143, 117.5, 'bold')
            .text('SERIAL NUMBER', '9px', 5, 128, 'bold')

        this.text('BATCH NUMBER (H)', '9', 103, 128, 'bold')

        return this
    }

    values(values) {
        values = LabelOdetteV1.fixEmpty(values)
        log.info(values)

        this.text(values.receiverName, '14', 7, 10, 'bold', true)
            .text(values.customerPlantCode + ' ' + values.customerPlantName, '14', 7, 14, 'bold', true)
            .text(values.customerAddrLine1, '14', 7, 18, 'bold', true)
            .text(values.dockCode, '13mm', 104, 16, 'normal', true)
            .text(values.supplierAddr, '5mm', 104, 29, 'bold', true)
            .text(values.deliveryDocASNNumber, '7mm', 20, 29, 'bold', true)
            .text(values.netWeight, '7mm', 104, 43.5, 'bold', true)
            .text(values.grossWeight, '7mm', 140, 43.5, 'bold', true)
            .text(values.totalInner, '7mm', 176, 43.5, 'bold', true)

        if (values.is_mix !== '1') {
            this.text(values.partNumber, '13mm', 11, 60, 'normal', true)
        } else {
            this.text('MIXED LOAD', '50', 66, 66, 'normal', true)
        }

        this
            .text(values.quantity, '13mm', 29, 88.5, 'normal', true)
            .text(values.descriptionOfPart, '5mm', 104, 84.5, 'bold', true)
            .text(values.partNumber, '7mm', 108, 97, 'bold', true)
            .text(values.supplierGsdb, '5mm', 25, 110.5, 'bold', true)
            .text(values.serialNumber, '5mm', 30, 129.5, 'bold', true, 'serialNumber')
            .text(values.date, '7mm', 104, 124, 'bold', true)
            .text(values.engAlert, '28', 145, 124, 'bold', true)
            .text(values.lotBatch, '5mm', 130, 129.5, 'bold', true)

        return this
    }

    barcodes(values) {
        this.barcode('N'.concat(values.deliveryDocASNNumber), 10, 32)
        if (values.is_mix !== '1') {
            this.barcode('P'.concat(values.partNumber), 10, 62)
        }
        this.barcode('Q'.concat(values.quantity), 10, 90)
            .barcode('V'.concat(values.supplierGsdb), 10, 111)
            .barcode(SSCC.generate(4, values.companyPrefix, values.serialNumber), 10, 130, null, 'label_odette_v1')
            .barcode('H'.concat(values.lotBatch), 108, 130)
            .barcode('30S'.concat(values.partNumber), 108, 100.5)

        return this
    }

    barcode(val, x, y, height, snBarcode) {
        height = height || 13
        barcode128(val, this.svg, {
            "startPosX": x,
            "startPosY": y,
            "barcodeWidth": 0,
            "colWidth": 0.4,
            "maxWidth": 100,
            "colHeight": height,
            "snBarcode": snBarcode
        }, this.document);

        return this
    }

    rect(x, y, w, h, id) {
        const rect = this.document.createElementNS('https://www.w3.org/2000/svg', 'rect')
        rect.setAttribute('style', 'fill:#000000; fill-opacity: 1')
        rect.setAttribute('width', w + "mm")
        rect.setAttribute('height', h + "mm")
        rect.setAttribute('x', x + "mm")
        rect.setAttribute('y', y + "mm")
        rect.setAttribute('id', id)

        this.svg.appendChild(rect)

        return this
    }

    text(string, size, x, y, weight, narrow, id) {
        const text = this.document.createElementNS('https://www.w3.org/2000/svg', 'text');
        weight = weight || 'regular'
        if (id) {
            text.setAttribute('id', id)
        }
        text.setAttribute('style', 'font-size:'.concat(size, ';') + 'font-weight:'.concat(weight, ';') + (narrow ? 'font-family:Helvetica bold;' : ''))
        text.setAttribute('x', x + "mm")
        text.setAttribute('y', y + "mm")
        text.appendChild(this.document.createTextNode(string))
        this.svg.appendChild(text)

        return this
    }

    container() {
        const svg = this.document.createElementNS('https://www.w3.org/2000/svg', 'svg')
        svg.setAttribute('width', '210' + "mm")
        svg.setAttribute('height', '148' + "mm")
        //  svg.style.fontFamily = 'Arial,Helvetica Consensed';
        //  svg.style.fontWeight = 'bold';
        svg.setAttribute('x', '0')
        svg.setAttribute('y', '0')
        svg.setAttribute('version', '1.1')
        svg.setAttribute('xmlns', 'https://www.w3.org/2000/svg')
        svg.setAttribute('xmlns:xlink', 'https://www.w3.org/1999/xlink')
        svg.setAttribute('id', this.svgId)
        this.svg = svg

        return this
    }

    wrapper() {
        const div = this.document.createElement('div')
        div.setAttribute("class", "label")
        div.appendChild(this.svg)

        this.document.body.appendChild(div)

        return this
    }

    style() {
        const style = this.document.createElement('style');
        style.innerHTML = 'text{font-family:Helvetica bold;}@page{size:auto;margin:0;width:210mm;height:148mm}svg{width:210mm;height:148mm}*{margin:0;}body,html{margin:0;}.label{width:auto;border:0;margin:0 0;padding:0;float:none;position:static;overflow:visible}';
        this.document.getElementsByTagName('head')[0].appendChild(style)

        return this
    }

    static fixEmpty(values) {
        for (let [key, value] of Object.entries(values)) {
            if (values[key] == null) {
                values[key] = ''
            }
        }
        return values
    }
}
