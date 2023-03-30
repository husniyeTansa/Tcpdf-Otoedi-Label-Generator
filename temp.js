"use strict";
var _interopRequireDefault = require("@babel/runtime/helpers/interopRequireDefault");
Object.defineProperty(exports, "__esModule", { value: !0 }),
  (exports["default"] = void 0);
var _regenerator = _interopRequireDefault(
    require("@babel/runtime/regenerator")
  ),
  _asyncToGenerator2 = _interopRequireDefault(
    require("@babel/runtime/helpers/asyncToGenerator")
  ),
  _classCallCheck2 = _interopRequireDefault(
    require("@babel/runtime/helpers/classCallCheck")
  ),
  _createClass2 = _interopRequireDefault(
    require("@babel/runtime/helpers/createClass")
  ),
  _b = _interopRequireDefault(require("./b128")),
  _datamatrix = _interopRequireDefault(require("./datamatrix")),
  _qrcode = _interopRequireDefault(require("./qrcode")),
  _loglevel = _interopRequireDefault(require("loglevel")),
  Helper = /*#__PURE__*/ (function () {
    function a() {
      (0, _classCallCheck2["default"])(this, a);
    }
    return (
      (0, _createClass2["default"])(
        a,
        [
          {
            key: "getHeapUsage",
            value: (function () {
              var b = (0, _asyncToGenerator2["default"])(
                /*#__PURE__*/ _regenerator["default"].mark(function c(b) {
                  var d, e, f;
                  return _regenerator["default"].wrap(function (c) {
                    for (;;)
                      switch ((c.prev = c.next)) {
                        case 0:
                          _loglevel["default"].getLogger("MemoryChecker"),
                            (d = process.memoryUsage()),
                            (e = a.rand(10, 40)),
                            (f = (d.heapUsed / 1024 / 1024 / 1024).toFixed(3)),
                            f > b &&
                              _loglevel["default"].error(
                                "Heap usage is greater than " +
                                  b +
                                  "GB. Available Memory is " +
                                  f +
                                  "GB."
                              );
                        case 5:
                        case "end":
                          return c.stop();
                      }
                  }, c);
                })
              );
              return function getHeapUsage() {
                return b.apply(this, arguments);
              };
            })(),
          },
        ],
        [
          {
            key: "passSn",
            value: function passSn(a, b, c) {
              var d =
                  3 < arguments.length && void 0 !== arguments[3]
                    ? arguments[3]
                    : "default",
                e = 4 < arguments.length ? arguments[4] : void 0,
                f = a.window.document.getElementById(b);
              null !== a.window.document.getElementById("serialNumber") &&
                (a.window.document.getElementById("serialNumber").innerHTML =
                  c.toString());
              var g = f.querySelectorAll(".snBarcode");
              if (0 === g.length)
                return a.window.document.documentElement.outerHTML;
              for (var h = 0; h < g.length; h++) g[h].remove();
              return (
                "odette" === d
                  ? (0, _b["default"])(
                      "00" + c.toString(),
                      f,
                      {
                        startPosX: 10,
                        startPosY: 130,
                        barcodeWidth: 0,
                        colWidth: 0.34,
                        maxWidth: 100,
                        colHeight: 13,
                        snBarcode: g,
                      },
                      a.window.document
                    )
                  : "qrCode" === d
                  ? (0, _qrcode["default"])(
                      c.toString(),
                      f,
                      {},
                      a.window.document
                    )
                  : "datamatrix" === d
                  ? (0, _datamatrix["default"])(
                      c.toString() + "-" + e.toString(),
                      f,
                      {},
                      a.window.document
                    )
                  : (0, _b["default"])(
                      "S" + c.toString(),
                      f,
                      {
                        startPosX: 10,
                        startPosY: 130,
                        barcodeWidth: 0,
                        colWidth: 0.4,
                        maxWidth: 100,
                        colHeight: 13,
                        snBarcode: g,
                      },
                      a.window.document
                    ),
                a.window.document.documentElement.outerHTML
              );
            },
          },
          {
            key: "extractColumn",
            value: function extractColumn(a, b) {
              return a.map(function (a) {
                return a[b];
              });
            },
          },
          {
            key: "localTime",
            value: function localTime(a) {
              var b = 1e3 * (60 * a.getTimezoneOffset()),
                c = a.getTime() - b,
                d = new Date(c),
                e = d.toISOString();
              return e.slice(0, 19);
            },
          },
          {
            key: "rand",
            value: function rand(a, b) {
              return Math.floor(Math.random() * (b - a)) + a;
            },
          },
        ]
      ),
      a
    );
  })();
exports["default"] = Helper;
