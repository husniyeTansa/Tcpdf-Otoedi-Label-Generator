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
  QRCode = require("qrcode-svg"),
  ArikanLabelA6 = /*#__PURE__*/ (function () {
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
                  .qrcodes(a)
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
                this.rect(0, 73.6, 210, 0.5, "frame-bottom")
                  .rect(0, 18.26, 210, 0.25, "hl1")
                  .rect(0, 36.52, 210, 0.25, "hl3")
                  .rect(144.5, 45, 65.5, 0.25, "hl4")
                  .rect(0, 54.78, 144.5, 0.25, "hl5")
                  .rect(144.5, 36.52, 0.25, 37.5, "vl1"),
                this
              );
            },
          },
          {
            key: "headings",
            value: function headings() {
              return (
                this.text("SUPP", "14px", 2, 5, "bold")
                  .text("STOCK", "14px", 2, 23, "bold")
                  .text("QTY", "14px", 110, 23, "bold")
                  .text("PART", "14px", 2, 41, "bold")
                  .text("WAYBILL", "14px", 2, 60, "bold")
                  .text("DATE", "14px", 60, 60, "bold")
                  .text("ASN NUMBER", "14px", 100, 60, "bold")
                  .text("BATCH NO", "14px", 147, 42, "bold"),
                this
              );
            },
          },
          {
            key: "values",
            value: function values(b) {
              return (
                (b = a.fixEmpty(b)),
                this.text(b.supplierGsdb, "24px", 2, 12, "300")
                  .text(b.supplierName, "24px", 100, 12, "300")
                  .text(b.partNumber, "24px", 2, 32, "300")
                  .text(b.quantity, "24px", 110, 32, "300")
                  .text(b.uom, "18px", 147, 33, "bold")
                  .text(b.descriptionOfPart, "24px", 2, 49, "bold")
                  .text(b.transportIdentifier, "24px", 2, 69, "300")
                  .text(b.date, "24px", 60, 69, "300")
                  .text(b.deliveryDocASNNumber, "24px", 100, 69, "300"),
                this
              );
            },
          },
          {
            key: "barcodes",
            value: function barcodes(a) {
              return (
                this.barcode(a.supplierGsdb + "~" + a.serialNumber, 147, 52),
                this
              );
            },
          },
          {
            key: "qrcodes",
            value: function qrcodes(a) {
              var b = this.document.createElementNS(
                "http://www.w3.org/2000/svg",
                "g"
              );
              b.setAttribute("class", "snBarcode"),
                b.setAttribute("x", "164mm"),
                b.setAttribute("y", "46mm");
              var c = this.qrCode(
                b,
                a.supplierGsdb +
                  "~" +
                  a.supplierName +
                  "~" +
                  a.partNumber +
                  "~" +
                  a.quantity +
                  "~" +
                  a.uom +
                  "~" +
                  a.descriptionOfPart +
                  "~" +
                  a.transportIdentifier +
                  "~" +
                  a.date +
                  "~" +
                  a.deliveryDocASNNumber +
                  "~" +
                  a.serialNumber
              );
              (b.innerHTML = c), this.svg.appendChild(b);
              var d = this.svg.querySelectorAll(".snBarcode svg");
              return (
                d.forEach(function (a) {
                  a.setAttribute("x", "164mm"), a.setAttribute("y", "46mm");
                }),
                this
              );
            },
          },
          {
            key: "qrCode",
            value: function qrCode(a, b) {
              var c = new QRCode({
                content: b,
                padding: 3,
                width: 100,
                height: 100,
                color: "#000000",
                background: "#ffffff",
                ecl: "M",
              }).svg();
              return c;
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
                    barcodeWidth: 53.9,
                    colWidth: 0.6,
                    maxWidth: 53.9,
                    colHeight: d,
                    snBarcode: e,
                  },
                  this.document
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
                    (f ? "font-family:Arial;" : "")
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
                a.setAttribute("height", "74mm"),
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
                  "text{font-family:Arial;}@page{size:auto;margin:0;width:210mm;height:74mm}svg{width:210mm;height:74mm}*{margin:0;}body,html{margin:0;}.label{width:auto;border:0;margin:0 0;padding:0;float:none;position:static;overflow:visible}"),
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
exports["default"] = ArikanLabelA6;
