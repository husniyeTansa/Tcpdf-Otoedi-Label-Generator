"use strict";
var _interopRequireDefault = require("@babel/runtime/helpers/interopRequireDefault");
Object.defineProperty(exports, "__esModule", {
  value: !0, //20221018 - MAIL "MP&L SUPPLIER NON-CONFORMANCE ALERT - CB-Oct-523-1287" - EKLENDI
}),
  (exports["default"] = generateFordOtosanMixedLabel);
var _slicedToArray2 = _interopRequireDefault(
    require("@babel/runtime/helpers/slicedToArray")
  ),
  _jsdom = require("jsdom"),
  _b = _interopRequireDefault(require("./b128")),
  _bpdf = require("./bpdf417");
function generateFordOtosanMixedLabel(a, b, c) {
  function d(a) {
    return String.fromCharCode(parseInt(a, 16));
  }
  for (
    var e,
      f = {
        titleFontSize: "9px",
        "1LPBFontSize": "60px",
        "1.5LPBFontSize": "52px",
        "2LPBFontSize": "48px",
        "2.5LPBFontSize": "36px",
        "3LPBFontSize": "24px",
        "4LPBFontSize": "18px",
        "5LPBFontSize": "14px",
        "6LPBFontSize": "12px",
        "7LPBFontSize": "10px",
        "8LPBFontSize": "9px",
        optionalFieldColor: "gray",
      },
      g = new _jsdom.JSDOM("<!DOCTYPE html><body></body>").window.document,
      h = 0,
      j = Object.entries(b);
    h < j.length;
    h++
  ) {
    var k = (0, _slicedToArray2["default"])(j[h], 2),
      l = k[0],
      m = k[1];
    null == b[l] && (b[l] = "");
  }
  var n = g.createElementNS("https://www.w3.org/2000/svg", "svg");
  n.setAttribute("width", "210mm"),
    n.setAttribute("height", "148mm"),
    n.setAttribute(
      "style",
      "font-family:Arial,Helvetica Consensed; font-weight:bold;"
    ),
    n.setAttribute("x", "0"),
    n.setAttribute("y", "0"),
    n.setAttribute("version", "1.1"),
    n.setAttribute("xmlns", "https://www.w3.org/2000/svg"),
    n.setAttribute("xmlns:xlink", "https://www.w3.org/1999/xlink"),
    n.setAttribute("id", c); //var g = document.createElementNS('http://www.w3.org/2000/svg', 'g');
  //g.setAttribute('transform','translate(0,-535.00002)');
  var o = g.createElementNS("https://www.w3.org/2000/svg", "rect");
  o.setAttribute("style", "fill:#000000; fill-opacity: 1"),
    o.setAttribute("width", "200mm"),
    o.setAttribute("height", "0.25mm"),
    o.setAttribute("x", "5mm"),
    o.setAttribute("y", "5mm"),
    o.setAttribute("id", "rect0");
  var p = g.createElementNS("https://www.w3.org/2000/svg", "rect");
  p.setAttribute("style", "fill:#000000; fill-opacity: 1"),
    p.setAttribute("width", "143mm"),
    p.setAttribute("height", "0.25mm"),
    p.setAttribute("x", "5mm"),
    p.setAttribute("y", "22.25mm"),
    p.setAttribute("id", "rect1");
  var q = g.createElementNS("https://www.w3.org/2000/svg", "rect");
  q.setAttribute("style", "fill:#000000; fill-opacity: 1"),
    q.setAttribute("width", "200mm"),
    q.setAttribute("height", "0.25mm"),
    q.setAttribute("x", "5mm"),
    q.setAttribute("y", "56.75mm"),
    q.setAttribute("id", "rect2");
  var r = g.createElementNS("https://www.w3.org/2000/svg", "rect");
  r.setAttribute("style", "fill:#000000; fill-opacity: 1"),
    r.setAttribute("width", "200mm"),
    r.setAttribute("height", "0.25mm"),
    r.setAttribute("x", "5mm"),
    r.setAttribute("y", "91.25mm"),
    r.setAttribute("id", "rect3");
  var s = g.createElementNS("https://www.w3.org/2000/svg", "rect");
  s.setAttribute("style", "fill:#000000; fill-opacity: 1"),
    s.setAttribute("width", "200mm"),
    s.setAttribute("height", "0.25mm"),
    s.setAttribute("x", "5mm"),
    s.setAttribute("y", "108.5mm"),
    s.setAttribute("id", "rect4");
  var t = g.createElementNS("https://www.w3.org/2000/svg", "rect");
  t.setAttribute("style", "fill:#000000; fill-opacity: 1"),
    t.setAttribute("width", "200mm"),
    t.setAttribute("height", "0.25mm"),
    t.setAttribute("x", "5mm"),
    t.setAttribute("y", "143mm"),
    t.setAttribute("id", "rect5");
  var u = g.createElementNS("https://www.w3.org/2000/svg", "rect");
  u.setAttribute("style", "fill:#000000; fill-opacity: 1"),
    u.setAttribute("width", "0.25mm"),
    u.setAttribute("height", "138mm"),
    u.setAttribute("x", "5mm"),
    u.setAttribute("y", "5mm"),
    u.setAttribute("id", "recth0");
  var v = g.createElementNS("https://www.w3.org/2000/svg", "rect");
  v.setAttribute("style", "fill:#000000; fill-opacity: 1"),
    v.setAttribute("width", "0.25mm"),
    v.setAttribute("height", "34.5mm"),
    v.setAttribute("x", "80mm"),
    v.setAttribute("y", "22.25mm"),
    v.setAttribute("id", "recth1");
  var w = g.createElementNS("https://www.w3.org/2000/svg", "rect");
  w.setAttribute("style", "fill:#000000; fill-opacity: 1"),
    w.setAttribute("width", "0.25mm"),
    w.setAttribute("height", "17.25mm"),
    w.setAttribute("x", "105mm"),
    w.setAttribute("y", "91.25mm"),
    w.setAttribute("id", "recth2");
  var x = g.createElementNS("https://www.w3.org/2000/svg", "rect");
  x.setAttribute("style", "fill:#000000; fill-opacity: 1"),
    x.setAttribute("width", "0.25mm"),
    x.setAttribute("height", "34.5mm"),
    x.setAttribute("x", "118mm"),
    x.setAttribute("y", "108.5mm"),
    x.setAttribute("id", "recth3");
  var y = g.createElementNS("https://www.w3.org/2000/svg", "rect");
  y.setAttribute("style", "fill:#000000; fill-opacity: 1"),
    y.setAttribute("width", "0.25mm"),
    y.setAttribute("height", "138mm"),
    y.setAttribute("x", "205mm"),
    y.setAttribute("y", "5mm"),
    y.setAttribute("id", "recth4");
  var z = g.createElementNS("http://www.w3.org/2000/svg", "polygon");
  z.setAttribute(
    "points",
    "726.377935 301.181095,761.811005 301.181095,744.09447 336.614165"
  ),
    z.setAttribute("style", "stroke:black;stroke-width:1;fill:white"),
    z.setAttribute("id", "triangle-bottom");
  var A = g.createElementNS("http://www.w3.org/2000/svg", "text");
  A.setAttribute("style", "font-size: " + f.titleFontSize),
    A.setAttribute("x", "6.5mm"),
    A.setAttribute("y", "9mm"),
    A.appendChild(g.createTextNode("SUPP (V) "));
  var B = g.createElementNS("https://www.w3.org/2000/svg", "text");
  B.setAttribute("style", "font-size: " + f["7LPBFontSize"]),
    B.setAttribute("x", "20mm"),
    B.setAttribute("y", "9mm"),
    B.appendChild(g.createTextNode(b.supplierName)),
    (0, _b["default"])(
      "V" + b.supplierGSDBCode,
      n,
      {
        //"colWidth": 53.9/92,
        //"barcodeWidth": 53.9,
        startPosX: 11.4,
        startPosY: 11.5,
        barcodeWidth: 0,
        colWidth: 0.4,
        maxWidth: 53.9,
        colHeight: 9.5,
      },
      g
    );
  var C = g.createElementNS("https://www.w3.org/2000/svg", "text");
  C.setAttribute(
    "style",
    "font-size: " +
      f["1.5LPBFontSize"] +
      "; font-weight: bold;text-align:center"
  ),
    C.setAttribute("width", "79.7mm"),
    C.setAttribute("id", "SupplierGSDBCode"),
    C.setAttribute("class", "SupplierGSDBCode"),
    C.setAttribute("y", "20.25mm"),
    C.appendChild(g.createTextNode(b.supplierGSDBCode));
  var D = g.createElementNS("https://www.w3.org/2000/svg", "text");
  D.setAttribute("style", "font-size: " + f.titleFontSize),
    D.setAttribute("x", "6.5mm"),
    D.setAttribute("y", "26.25mm"),
    D.appendChild(g.createTextNode("QTY"));
  var E = g.createElementNS("https://www.w3.org/2000/svg", "text");
  E.setAttribute("style", "font-size: " + f.titleFontSize),
    E.setAttribute("x", "6.5mm"),
    E.setAttribute("y", "30mm"),
    E.appendChild(g.createTextNode("(Q)")); //    generateBarcode128("Q" + values.quantity, svg, {
  //        "colHeight": 9.5,
  //        "colWidth": 0.4,
  //        "barcodeWidth": 0,
  //        //"barcodeWidth": 38.6,
  //        "maxWidth": 53.9,
  //        "startPosX": 11.4,
  //        "startPosY": 46
  //    });
  var F = g.createElementNS("https://www.w3.org/2000/svg", "text");
  F.setAttribute("style", "font-size: " + f["1.5LPBFontSize"]),
    F.setAttribute("id", "QTY"),
    F.setAttribute("class", "QTY"),
    F.setAttribute("y", "40mm"),
    F.appendChild(g.createTextNode(b.quantity));
  var G = g.createElementNS("https://www.w3.org/2000/svg", "text");
  G.setAttribute("style", "font-size: " + f["5LPBFontSize"]),
    G.setAttribute("id", "QTYUnitOfMeasure"),
    G.setAttribute("class", "QTYUnitOfMeasure"),
    G.setAttribute("y", "42.50mm"),
    G.appendChild(g.createTextNode(b.unitOfMeasure));
  var H = g.createElementNS("https://www.w3.org/2000/svg", "text");
  H.setAttribute("style", "font-size: " + f.titleFontSize),
    H.setAttribute("x", "81.5mm"),
    H.setAttribute("y", "26.25mm"),
    H.appendChild(g.createTextNode("CONTAINER"));
  var I = g.createElementNS("https://www.w3.org/2000/svg", "text");
  I.setAttribute("style", "font-size: " + f["4LPBFontSize"]),
    I.setAttribute("x", "81.5mm"),
    I.setAttribute("y", "32mm"),
    I.appendChild(g.createTextNode(b.container));
  var J = g.createElementNS("https://www.w3.org/2000/svg", "text");
  J.setAttribute("style", "font-size: " + f.titleFontSize),
    J.setAttribute("x", "81.5mm"),
    J.setAttribute("y", "37.25mm"),
    J.appendChild(g.createTextNode("GROSS WGT"));
  var K = g.createElementNS("https://www.w3.org/2000/svg", "text");
  K.setAttribute("style", "font-size: " + f["4LPBFontSize"]),
    K.setAttribute("x", "81.5mm"),
    K.setAttribute("y", "43mm"),
    K.appendChild(g.createTextNode(Math.round(b.grossWeight)));
  var L = g.createElementNS("https://www.w3.org/2000/svg", "text");
  L.setAttribute("style", "font-size: " + f["4LPBFontSize"]),
    L.setAttribute("x", "110mm"),
    L.setAttribute("y", "43mm"),
    L.appendChild(g.createTextNode("KG")); // LB or KG
  var M = g.createElementNS("https://www.w3.org/2000/svg", "text");
  M.setAttribute("style", "font-size: " + f.titleFontSize),
    M.setAttribute("x", "81.5mm"),
    M.setAttribute("y", "48.25mm"),
    M.appendChild(g.createTextNode("DATE"));
  var N = g.createElementNS("https://www.w3.org/2000/svg", "text");
  N.setAttribute("style", "font-size: " + f["4LPBFontSize"]),
    N.setAttribute("x", "81.5mm"),
    N.setAttribute("y", "54mm"),
    N.appendChild(g.createTextNode(b.date));
  var O = g.createElementNS("https://www.w3.org/2000/svg", "text");
  O.setAttribute("style", "font-size: " + f.titleFontSize),
    O.setAttribute("fill", f.optionalFieldColor),
    O.setAttribute("x", "130mm"),
    O.setAttribute("y", "37.25mm"),
    O.appendChild(g.createTextNode("LOT / BATCH NO"));
  var P = g.createElementNS("https://www.w3.org/2000/svg", "text");
  P.setAttribute("style", "font-size: " + f["4LPBFontSize"]),
    P.setAttribute("fill", f.optionalFieldColor),
    P.setAttribute("x", "130mm"),
    P.setAttribute("y", "43mm"),
    P.appendChild(g.createTextNode(b.lotBatch));
  var Q = g.createElementNS("https://www.w3.org/2000/svg", "text");
  Q.setAttribute("style", "font-size: " + f.titleFontSize),
    Q.setAttribute("fill", f.optionalFieldColor),
    Q.setAttribute("x", "130mm"),
    Q.setAttribute("y", "48.25mm"),
    Q.appendChild(g.createTextNode("SHIFT"));
  var R = g.createElementNS("https://www.w3.org/2000/svg", "text");
  R.setAttribute("style", "font-size: " + f["4LPBFontSize"]),
    R.setAttribute("fill", f.optionalFieldColor),
    R.setAttribute("x", "130mm"),
    R.setAttribute("y", "54mm"),
    R.appendChild(g.createTextNode(b.shift));
  var S = g.createElementNS("https://www.w3.org/2000/svg", "text");
  S.setAttribute("style", "font-size: " + f.titleFontSize),
    S.setAttribute("fill", f.optionalFieldColor),
    S.setAttribute("x", "145mm"),
    S.setAttribute("y", "48.25mm"),
    S.appendChild(g.createTextNode("W/C"));
  var T = g.createElementNS("https://www.w3.org/2000/svg", "text");
  T.setAttribute("style", "font-size: " + f["4LPBFontSize"]),
    T.setAttribute("fill", f.optionalFieldColor),
    T.setAttribute("x", "145mm"),
    T.setAttribute("y", "54mm"),
    T.appendChild(g.createTextNode(b.wc));
  var U = g.createElementNS("https://www.w3.org/2000/svg", "text");
  U.setAttribute("style", "font-size: " + f["8LPBFontSize"]),
    U.setAttribute("x", "6.5mm"),
    U.setAttribute("y", "80.75mm"),
    U.appendChild(g.createTextNode("PART"));
  var V = g.createElementNS("https://www.w3.org/2000/svg", "text");
  V.setAttribute("style", "font-size: " + f["2LPBFontSize"]),
    V.setAttribute("x", "18.4mm"),
    V.setAttribute("y", "71.75mm"),
    V.appendChild(g.createTextNode(b.partNumber));
  var W = 189 / 0.264583333,
    X = 79 / 0.264583333,
    Y = 20 * Math.sqrt(3);
  (function (a, b) {
    var c = g.createElementNS("https://www.w3.org/2000/svg", "polygon");
    return (
      c.setAttribute(
        "points",
        "714.3307095613616,298.5826775415215 " +
          (W + a) +
          "," +
          X +
          " " +
          (W + a / 2) +
          "," +
          (X + b)
      ),
      c.setAttribute("style", "fill: #fff"),
      c.setAttribute("style", "fill: #000"),
      c
    );
  })(40, Y, W, X);
  var Z = g.createElementNS("https://www.w3.org/2000/svg", "text");
  Z.setAttribute("style", "font-size: " + f["8LPBFontSize"]),
    Z.setAttribute("x", "8mm"),
    Z.setAttribute("y", "84.50mm"),
    Z.appendChild(g.createTextNode("(P)"));
  var $ = "P" + b.partNumber,
    _ = g.createElementNS("https://www.w3.org/2000/svg", "text"); //console.log(partNumber.replace(new RegExp("-", "g"), ' '));
  // generateBarcode128(partNumber.replace(new RegExp("-", "g"), ' '), svg, {
  //     "colHeight": 12,
  //     //"colWidth": 53.9/92,
  //     "barcodeWidth": 140,
  //     "startPosX": 18.4,
  //     "startPosY": 76.75
  // });
  _.setAttribute("style", "font-size: " + f.titleFontSize),
    _.setAttribute("x", "6.5mm"),
    _.setAttribute("y", "95.25mm"),
    _.appendChild(g.createTextNode("STR LOC 1"));
  var aa = g.createElementNS("https://www.w3.org/2000/svg", "text");
  aa.setAttribute("style", "font-size: " + f["3LPBFontSize"]),
    aa.setAttribute("x", "6.5mm"),
    aa.setAttribute("y", "104mm"),
    aa.appendChild(g.createTextNode(b.storageLocation));
  var ba = g.createElementNS("https://www.w3.org/2000/svg", "text");
  ba.setAttribute("style", "font-size: " + f.titleFontSize),
    ba.setAttribute("x", "106.5mm"),
    ba.setAttribute("y", "95.25mm"),
    ba.appendChild(g.createTextNode("DELIVERY DOC/ASN NUMBER"));
  var ca = g.createElementNS("https://www.w3.org/2000/svg", "text");
  ca.setAttribute("style", "font-size: " + f["3LPBFontSize"]),
    ca.setAttribute("x", "106.5mm"),
    ca.setAttribute("y", "104mm"),
    ca.appendChild(g.createTextNode(b.deliveryDocASNNumber)),
    (0, _b["default"])(
      "N" + b.deliveryDocASNNumber,
      n,
      {
        colHeight: 11, //"colWidth": 53.9/92,
        barcodeWidth: 45,
        startPosX: 155,
        startPosY: 96,
      },
      g
    );
  /*
     var descriptionOfPart = document.createElementNS('http://www.w3.org/2000/svg', 'text');
     descriptionOfPart.style.fontSize = settings["5LPBFontSize"];
     descriptionOfPart.setAttribute('x', '6.5' + "mm");
     descriptionOfPart.setAttribute('y', '113.5' + "mm");
     descriptionOfPart.appendChild(document.createTextNode('3S4X A045A74 AAZUYI'));*/ /*
     var title14 = document.createElementNS('http://www.w3.org/2000/svg', 'text');
     title14.style.fontSize = settings["5LPBFontSize"];
     title14.setAttribute('x', '6.5' + "mm");
     title14.setAttribute('y', '118.5' + "mm");
     title14.appendChild(document.createTextNode('2527 CNSL FRT LOMED DK GRAPH KIT'));*/ var da =
    g.createElementNS("https://www.w3.org/2000/svg", "text");
  da.setAttribute("style", "font-size: " + f["5LPBFontSize"]),
    da.setAttribute("x", "6.5mm"),
    da.setAttribute("y", "113.5mm"),
    da.appendChild(g.createTextNode(b.descriptionOfPart));
  var ea = g.createElementNS("https://www.w3.org/2000/svg", "text");
  ea.setAttribute("style", "font-size: " + f.titleFontSize),
    ea.setAttribute("x", "6.5mm"),
    ea.setAttribute("y", "130.5mm"),
    ea.appendChild(g.createTextNode("SERIAL NO(5S)")),
    (0, _b["default"])(
      "5S" + b.serialNumber,
      n,
      {
        colHeight: 9.5, //"colWidth": 53.9/92,
        barcodeWidth: 53.9,
        startPosX: 11.5,
        startPosY: 133.5,
      },
      g
    );
  var fa = g.createElementNS("https://www.w3.org/2000/svg", "text");
  fa.setAttribute("style", "font-size: " + f["3LPBFontSize"]),
    fa.setAttribute("id", "serialNo"),
    fa.setAttribute("class", "serialNo"),
    fa.setAttribute("x", "30.5mm"),
    fa.setAttribute("y", "131.5mm"),
    fa.appendChild(g.createTextNode(b.serialNumber));
  var ga = g.createElementNS("https://www.w3.org/2000/svg", "text");
  ga.setAttribute("style", "font-size: " + f["3LPBFontSize"]),
    ga.setAttribute("id", "masterLabel"),
    ga.setAttribute("class", "masterLabel"),
    ga.setAttribute("x", "152mm"),
    ga.setAttribute("y", "15mm"),
    ga.appendChild(g.createTextNode("MIXED LABEL"));
  var ha = g.createElementNS("https://www.w3.org/2000/svg", "text");
  ha.setAttribute("style", "font-size: " + f.titleFontSize),
    ha.setAttribute("fill", f.optionalFieldColor),
    ha.setAttribute("x", "100mm"),
    ha.setAttribute("y", "128.5mm"),
    ha.appendChild(g.createTextNode("WT2D"));
  var ia = g.createElementNS("https://www.w3.org/2000/svg", "text");
  ia.setAttribute("style", "font-size: " + f["8LPBFontSize"]),
    ia.setAttribute("fill", f.optionalFieldColor),
    ia.setAttribute("x", "100mm"),
    ia.setAttribute("y", "132.5mm"),
    ia.appendChild(g.createTextNode("EF4526"));
  var ja = g.createElementNS("https://www.w3.org/2000/svg", "text");
  ja.setAttribute("style", "font-size: " + f.titleFontSize),
    ja.setAttribute("fill", f.optionalFieldColor),
    ja.setAttribute("x", "70mm"),
    ja.setAttribute("y", "138mm"),
    ja.appendChild(g.createTextNode("MADE IN"));
  var ka = g.createElementNS("https://www.w3.org/2000/svg", "text");
  ka.setAttribute("style", "font-size: " + f.titleFontSize),
    ka.setAttribute("x", "119.5mm"),
    ka.setAttribute("y", "112.5mm"),
    ka.appendChild(g.createTextNode("TO"));
  var la = g.createElementNS("https://www.w3.org/2000/svg", "text");
  la.setAttribute("style", "font-size: " + f["8LPBFontSize"]),
    la.setAttribute("x", "119.5mm"),
    la.setAttribute("y", "116.5mm"),
    la.appendChild(g.createTextNode(b.customerPlantName));
  var ma = g.createElementNS("https://www.w3.org/2000/svg", "text");
  ma.setAttribute("style", "font-size: " + f.titleFontSize),
    ma.setAttribute("x", "119.5mm"),
    ma.setAttribute("y", "122mm"),
    ma.appendChild(g.createTextNode("CUST"));
  var na = g.createElementNS("https://www.w3.org/2000/svg", "text");
  na.setAttribute("style", "font-size: " + f["2.5LPBFontSize"]),
    na.setAttribute("x", "119.5mm"),
    na.setAttribute("y", "133mm"),
    na.appendChild(
      g.createTextNode(
        null !== (e = b.customerPlantAltCode) && void 0 !== e
          ? e
          : b.customerCode
      )
    );
  var oa = g.createElementNS("https://www.w3.org/2000/svg", "text");
  oa.setAttribute("style", "font-size: " + f.titleFontSize),
    oa.setAttribute("fill", f.optionalFieldColor),
    oa.setAttribute("x", "119.5mm"),
    oa.setAttribute("y", "140mm"),
    oa.appendChild(g.createTextNode("ENG ALERT"));
  var pa = g.createElementNS("https://www.w3.org/2000/svg", "text");
  pa.setAttribute("style", "font-size: " + f["8LPBFontSize"]),
    pa.setAttribute("fill", f.optionalFieldColor),
    pa.setAttribute("x", "140mm"),
    pa.setAttribute("y", "140mm"),
    pa.appendChild(g.createTextNode(b.engAlert));
  var qa = g.createElementNS("https://www.w3.org/2000/svg", "text");
  qa.setAttribute("style", "font-size: " + f.titleFontSize),
    qa.setAttribute("x", "183mm"),
    qa.setAttribute("y", "112.5mm"),
    qa.appendChild(g.createTextNode("DOCK CODE"));
  var ra = g.createElementNS("https://www.w3.org/2000/svg", "text");
  ra.setAttribute("style", "font-size: " + f["1.5LPBFontSize"]),
    ra.setAttribute("id", "dockCode"),
    ra.setAttribute("class", "dockCode"),
    ra.setAttribute("y", "133mm"),
    ra.appendChild(g.createTextNode(b.dockCode)),
    n.appendChild(p),
    n.appendChild(q),
    n.appendChild(r),
    n.appendChild(s),
    n.appendChild(v),
    n.appendChild(w),
    n.appendChild(x),
    n.appendChild(z),
    n.appendChild(A),
    n.appendChild(B),
    n.appendChild(D),
    n.appendChild(E),
    n.appendChild(H),
    n.appendChild(I),
    n.appendChild(J),
    n.appendChild(K),
    n.appendChild(M),
    n.appendChild(N),
    n.appendChild(_),
    n.appendChild(aa),
    n.appendChild(ba),
    n.appendChild(ca),
    n.appendChild(ea),
    n.appendChild(fa),
    1 === b.isMaster && n.appendChild(ga),
    n.appendChild(ka),
    n.appendChild(la),
    n.appendChild(oa),
    n.appendChild(pa),
    n.appendChild(ma),
    n.appendChild(na),
    n.appendChild(qa),
    n.appendChild(ra),
    n.appendChild(L),
    n.appendChild(O),
    n.appendChild(P),
    n.appendChild(Q),
    n.appendChild(S),
    n.appendChild(C); //svg.appendChild(g);
  var sa = g.createElement("div");
  /* 8. sayfadan sonra olusan tasamalari onlemek icin bu classin eklenmesi gerekç class ozellikler FO_LABEL.php icerisinde */ sa.setAttribute(
    "class",
    "label"
  ),
    sa.appendChild(n),
    g.body.appendChild(sa);
  try {
    var ta = d("1D"),
      ua = d("1E"),
      va = d("04"),
      wa = b.isMaster ? 18 / 0.264583333 : 11 / 0.264583333;
    (0, _bpdf.generatePDF417)(
      "[)>" +
        ua +
        "06" +
        ta +
        $.replace(/-/g, " ") +
        ta +
        "Q" +
        b.quantity +
        ta +
        "V" +
        b.supplierGSDBCode +
        ta +
        "D" +
        b.dateYYMMDD +
        ta +
        "8V" +
        b.customerPlantAltCode +
        ta +
        "1L" +
        b.dockCode +
        ta +
        "S" +
        a +
        ta +
        "L" +
        b.storageLocation +
        ta +
        "N" +
        b.deliveryDocASNNumber +
        ta +
        "B" +
        b.container +
        ta +
        "Z" +
        Math.round(b.grossWeight) +
        ua +
        va,
      151 / 0.264583333,
      wa,
      "#" + c,
      5,
      g
    );
  } catch (a) {
    console.log(a);
  }
  try {
    for (
      var xa = g.getElementsByClassName("SupplierGSDBCode"), ya = 0;
      ya < xa.length;
      ya++
    )
      xa[ya].setAttribute(
        "x",
        82.7 -
          (0.264583333 *
            (29.3 * parseInt(b.supplierGSDBCode.toString().length))) /
            2 +
          65.3 -
          41 +
          "mm"
      ); // element = document.getElementsByClassName('QTYUnitOfMeasure');
    // for (let i = 0; i < element.length; i++) {
    //     element[i].setAttribute('x', (77 - (element[i].getBoundingClientRect().width * 0.264583333) - 7.66 ) + "mm");
    // }
    //
    // element = document.getElementsByClassName('QTY');
    // for (let i = 0; i < element.length; i++) {
    //     element[i].setAttribute("x", (78 - (29.3 * parseInt(values.quantity.toString().length) * 0.264583333)) + 'mm')
    //     element[i].setAttribute('y', (27.5 + (58.02 * 0.264583333) / 2) + "mm");
    // }
    // element = document.getElementsByClassName('serialNo');
    // values.serialNo = values.serialNo || ""
    // for (let i = 0; i < element.length; i++) {
    //     element[i].setAttribute('x', (63 - (8.02 * parseInt(values.serialNo.toString().length) * 0.264583333)) + "mm");
    // }
    (xa = g.getElementsByClassName("dockCode")),
      (b.dockCode = b.dockCode || "");
    for (var Ba = 0; Ba < xa.length; Ba++)
      xa[Ba].setAttribute(
        "x",
        200 -
          0.264583333 * (52.02 * parseInt(b.dockCode.toString().length)) +
          "mm"
      );
  } catch (a) {
    console.log(a);
  }
  var za = g.createElement("style");
  za.innerHTML =
    "@page{size:auto;margin:0;width:210mm;height:148mm}svg{width:210mm;height:148mm}*{margin:0;font-family:Arial,Helvetica}body,html{margin:0}.label{font-family:Arial,Helvetica;width:auto;border:0;margin:0 1%;padding:0;float:none;position:static;overflow:visible}";
  var Aa = g.getElementsByTagName("head")[0];
  return Aa.appendChild(za), g.documentElement.outerHTML;
}
