"use strict";
var _interopRequireDefault = require("@babel/runtime/helpers/interopRequireDefault");
Object.defineProperty(exports, "__esModule", {
  value: !0, //20221018 - MAIL "MP&L SUPPLIER NON-CONFORMANCE ALERT - CB-Oct-523-1287" - EKLENDI
}),
  (exports["default"] = void 0);
var _slicedToArray2 = _interopRequireDefault(
    require("@babel/runtime/helpers/slicedToArray")
  ),
  _classCallCheck2 = _interopRequireDefault(
    require("@babel/runtime/helpers/classCallCheck")
  ),
  _createClass2 = _interopRequireDefault(
    require("@babel/runtime/helpers/createClass")
  ),
  _jsdom = require("jsdom"),
  _b = _interopRequireDefault(require("./b128")),
  _SSCC = _interopRequireDefault(require("./SSCC")),
  _loglevel = _interopRequireDefault(require("loglevel")),
  Label4Jaguar = /*#__PURE__*/ (function () {
    function a(b) {
      (0, _classCallCheck2["default"])(this, a),
        (this.svgId = b),
        (this.jsdom = new _jsdom.JSDOM("<!DOCTYPE html><body></body>")),
        (this.document = this.jsdom.window.document);
    }
    return (
      (0, _createClass2["default"])(
        a,
        [
          {
            key: "draw",
            value: function draw(a) {
              return (
                this.container()
                  .frame()
                  .headings(a)
                  .values(a)
                  .barcodes(a)
                  .wrapper()
                  .style(),
                this.document.documentElement.outerHTML
              );
            },
          },
          {
            key: "frame",
            value: function frame() {
              return (
                this.rect(0, 20, 210, 0.25, "hl1")
                  .rect(100, 33, 110, 0.25, "hl2")
                  .rect(0, 46, 210, 0.25, "hl3")
                  .rect(0, 76, 210, 0.25, "hl4")
                  .rect(100, 86.5, 110, 0.25, "hl5")
                  .rect(0, 104, 100, 0.25, "hl6")
                  .rect(100, 114.5, 110, 0.25, "hl7")
                  .rect(0, 125, 210, 0.25, "hl8")
                  .rect(100, 0, 0.25, 46, "vl1")
                  .rect(136, 33, 0.25, 13, "vl2")
                  .rect(172, 33, 0.25, 13, "vl3")
                  .rect(100, 76, 0.25, 49, "vl4")
                  .rect(100, 125, 0.25, 23, "vl5")
                  .rect(140, 114.5, 0.25, 10.5, "vl6"),
                this
              );
            },
          },
          {
            key: "headings",
            value: function headings(a) {
              return (
                this.text("RECEIVER", "9", 5, 5, "bold")
                  .text("DOCK", "9", 103, 5, "bold")
                  .text("ADVICE NOTE NO", "9", 5, 23, "bold")
                  .text("SUPPLIER ADDRESS", "9", 103, 23, "bold")
                  .text("NET WEIGHT (KG)", "9", 103, 36, "bold")
                  .text("GROSS WEIGHT (KG)", "9", 139, 36, "bold")
                  .text("NO OF BOXES", "9", 175, 36, "bold"),
                "1" !== a.is_mix &&
                  this.text("PART NO (P)", "9", 5, 49, "bold"),
                this.text("QUANTITY (Q)", "9", 5, 79, "bold")
                  .text("DESCRIPTION", "9", 103, 79, "bold")
                  .text("SUPPLIER PART NO (30S)", "9", 103, 89.5, "bold")
                  .text("SUPPLIER (V)", "9", 5, 109, "bold")
                  .text("PROD DATE", "9", 103, 117.5, "bold")
                  .text("ENGR. CHANGE", "9", 143, 117.5, "bold")
                  .text("SERIAL NUMBER", "9px", 5, 128, "bold"),
                this.text("BATCH NUMBER (H)", "9", 103, 128, "bold"),
                this
              );
            },
          },
          {
            key: "values",
            value: function values(b) {
              return (
                (b = a.fixEmpty(b)),
                _loglevel["default"].info(b),
                this.text(b.receiverName, "14", 7, 10, "bold", !0)
                  .text(
                    b.customerPlantCode + " " + b.customerPlantName,
                    "14",
                    7,
                    14,
                    "bold",
                    !0
                  )
                  .text(b.customerAddrLine1, "14", 7, 18, "bold", !0)
                  .text(b.dockCode, "13mm", 104, 16, "normal", !0)
                  .text(b.supplierAddr, "5mm", 104, 29, "bold", !0)
                  .text(b.deliveryDocASNNumber, "7mm", 20, 29, "bold", !0)
                  .text(b.netWeight, "7mm", 104, 43.5, "bold", !0)
                  .text(b.grossWeight, "7mm", 140, 43.5, "bold", !0)
                  .text(b.totalInner, "7mm", 176, 43.5, "bold", !0),
                "1" === b.is_mix
                  ? this.text("MIXED LOAD", "50", 66, 66, "normal", !0)
                  : this.text(b.partNumber, "13mm", 11, 60, "normal", !0),
                this.text(b.quantity, "13mm", 29, 88.5, "normal", !0)
                  .text(b.descriptionOfPart, "5mm", 104, 84.5, "bold", !0)
                  .text(b.partNumber, "7mm", 108, 97, "bold", !0)
                  .text(b.supplierGsdb, "5mm", 25, 110.5, "bold", !0)
                  .text(
                    b.serialNumber,
                    "5mm",
                    30,
                    129.5,
                    "bold",
                    !0,
                    "serialNumber"
                  )
                  .text(b.date, "7mm", 104, 124, "bold", !0)
                  .text(b.engAlert, "28", 145, 124, "bold", !0)
                  .text(b.lotBatch, "5mm", 130, 129.5, "bold", !0),
                this
              );
            },
          },
          {
            key: "barcodes",
            value: function barcodes(a) {
              return (
                this.barcode("N".concat(a.deliveryDocASNNumber), 10, 32),
                "1" !== a.is_mix &&
                  this.barcode("P".concat(a.partNumber), 10, 62),
                this.barcode("Q".concat(a.quantity), 10, 90)
                  .barcode("V".concat(a.supplierGsdb), 10, 111)
                  .barcode(
                    _SSCC["default"].generate(
                      4,
                      a.companyPrefix,
                      a.serialNumber
                    ),
                    10,
                    130,
                    null,
                    "label_odette_v1"
                  )
                  .barcode("H".concat(a.lotBatch), 108, 130)
                  .barcode("30S".concat(a.partNumber), 108, 100.5),
                this
              );
            },
          },
          {
            key: "barcode",
            value: function barcode(a, b, c, d, e) {
              return (
                (d = d || 13),
                (0, _b["default"])(
                  a,
                  this.svg,
                  {
                    startPosX: b,
                    startPosY: c,
                    barcodeWidth: 0,
                    colWidth: 0.4,
                    maxWidth: 100,
                    colHeight: d,
                    snBarcode: e,
                  },
                  this.document,
                  !0
                ),
                this
              );
            },
          },
          {
            key: "rect",
            value: function (a, b, c, d, e) {
              var f = this.document.createElementNS(
                "https://www.w3.org/2000/svg",
                "rect"
              );
              return (
                f.setAttribute("style", "fill:#000000; fill-opacity: 1"),
                f.setAttribute("width", c + "mm"),
                f.setAttribute("height", d + "mm"),
                f.setAttribute("x", a + "mm"),
                f.setAttribute("y", b + "mm"),
                f.setAttribute("id", e),
                this.svg.appendChild(f),
                this
              );
            },
          },
          {
            key: "text",
            value: function (a, b, c, d, e, f, g) {
              var h = this.document.createElementNS(
                "https://www.w3.org/2000/svg",
                "text"
              );
              return (
                (e = e || "regular"),
                g && h.setAttribute("id", g),
                h.setAttribute(
                  "style",
                  "font-size:".concat(b, ";") +
                    "font-weight:".concat(e, ";") +
                    (f ? "font-family:Helvetica bold;" : "")
                ),
                h.setAttribute("x", c + "mm"),
                h.setAttribute("y", d + "mm"),
                h.appendChild(this.document.createTextNode(a)),
                this.svg.appendChild(h),
                this
              );
            },
          },
          {
            key: "container",
            value: function container() {
              var a = this.document.createElementNS(
                "https://www.w3.org/2000/svg",
                "svg"
              );
              return (
                a.setAttribute("width", "210mm"),
                a.setAttribute("height", "148mm"),
                a.setAttribute("x", "0"),
                a.setAttribute("y", "0"),
                a.setAttribute("version", "1.1"),
                a.setAttribute("xmlns", "https://www.w3.org/2000/svg"),
                a.setAttribute("xmlns:xlink", "https://www.w3.org/1999/xlink"),
                a.setAttribute("id", this.svgId),
                (this.svg = a),
                this
              );
            },
          },
          {
            key: "wrapper",
            value: function wrapper() {
              var a = this.document.createElement("div");
              return (
                a.setAttribute("class", "label"),
                a.appendChild(this.svg),
                this.document.body.appendChild(a),
                this
              );
            },
          },
          {
            key: "style",
            value: function () {
              var a = this.document.createElement("style");
              return (
                (a.innerHTML =
                  "text{font-family:Helvetica bold;}@page{size:auto;margin:0;width:210mm;height:148mm}svg{width:210mm;height:148mm}*{margin:0;}body,html{margin:0;}.label{width:auto;border:0;margin:0 0;padding:0;float:none;position:static;overflow:visible}"),
                this.document.getElementsByTagName("head")[0].appendChild(a),
                this
              );
            },
          },
        ],
        [
          {
            key: "fixEmpty",
            value: function fixEmpty(a) {
              for (var b = 0, c = Object.entries(a); b < c.length; b++) {
                var d = (0, _slicedToArray2["default"])(c[b], 2),
                  e = d[0],
                  f = d[1];
                null == a[e] && (a[e] = "");
              }
              return a;
            },
          },
        ]
      ),
      a
    );
  })();
exports["default"] = Label4Jaguar;
