/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 46);
/******/ })
/************************************************************************/
/******/ ({

/***/ 46:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(47);


/***/ }),

/***/ 47:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _drawer = __webpack_require__(59);

var _drawer2 = _interopRequireDefault(_drawer);

var _toolbar = __webpack_require__(48);

var _toolbar2 = _interopRequireDefault(_toolbar);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

// window.$ = window.jQuery = require('jquery');
// require('bootstrap');

var toolbar = new _toolbar2.default();
_drawer2.default.init();

/***/ }),

/***/ 48:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Toolbar = function () {
  _createClass(Toolbar, [{
    key: 'position',
    get: function get() {
      return this._position;
    },
    set: function set(val) {
      this._position = val;
    }
  }], [{
    key: 'delta',
    get: function get() {
      return 64;
    }
  }]);

  function Toolbar() {
    _classCallCheck(this, Toolbar);

    this.el = document.getElementById('header');

    this._ticking = false;

    this._onScroll = this._onScroll.bind(this);
    this._update = this._update.bind(this);

    window.addEventListener('scroll', this._onScroll);
    this._update();
  }

  _createClass(Toolbar, [{
    key: '_update',
    value: function _update() {
      var prevPosition = this.position;
      var currentPosition = document.body.scrollTop || document.documentElement.scrollTop;

      if (Math.abs(prevPosition - currentPosition) <= Toolbar.delta) return;

      if (currentPosition > prevPosition && currentPosition > Toolbar.delta) {
        this.el.classList.add('hidden');
      } else {
        this.el.classList.remove('hidden');
      }

      if (currentPosition > Toolbar.delta) {
        this.el.classList.add('with-background');
      } else {
        this.el.classList.remove('with-background');
      }

      this.position = currentPosition;
    }
  }, {
    key: '_onScroll',
    value: function _onScroll() {
      window.requestAnimationFrame(this._update);
    }
  }]);

  return Toolbar;
}();

;

exports.default = Toolbar;

/***/ }),

/***/ 59:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
var _close = function _close(target) {
  return function (evt) {
    if (evt.target.closest('.drawer_drawer')) return;

    document.body.classList.remove('no-scroll');
    target.classList.remove('active');
    target.removeEventListener('click', _close);
  };
};

var _open = function _open(target) {
  return function (evt) {
    target.classList.add('active');
    document.body.classList.add('no-scroll');
    target.addEventListener('click', _close(target));
  };
};

var _bindEvents = function _bindEvents(control) {
  var id = control.getAttribute('data-drawer');
  var target = document.getElementById(id);

  control.addEventListener('click', _open(target));
};

exports.default = {
  init: function init() {
    var controls = document.querySelectorAll('[data-drawer]');
    Array.from(controls, _bindEvents);
  }
};

/***/ })

/******/ });