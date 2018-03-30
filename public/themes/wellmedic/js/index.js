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


var _drawer = __webpack_require__(48);

var _drawer2 = _interopRequireDefault(_drawer);

var _lazyImages = __webpack_require__(49);

var _lazyImages2 = _interopRequireDefault(_lazyImages);

var _toolbar = __webpack_require__(50);

var _toolbar2 = _interopRequireDefault(_toolbar);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var toolbar = new _toolbar2.default(); // window.$ = window.jQuery = require('jquery');
// require('bootstrap');

_drawer2.default.init();
_lazyImages2.default.init();

/***/ }),

/***/ 48:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
var ACTIVE_CLASS = 'active';
var NO_SCROLL_CLASS = 'no-scroll';
var DATA_ID = 'data-drawer';

var _close = function _close(target) {
  return function (evt) {
    // block clicks on drawer surface
    if (evt.target.closest('.drawer_drawer')) return;

    document.body.classList.remove(NO_SCROLL_CLASS);
    target.classList.remove(ACTIVE_CLASS);
    target.removeEventListener('click', _close);
  };
};

var _open = function _open(target) {
  return function (evt) {
    target.classList.add(ACTIVE_CLASS);
    document.body.classList.add(NO_SCROLL_CLASS);
    target.addEventListener('click', _close(target));
  };
};

var _bindEvents = function _bindEvents(control) {
  var id = control.getAttribute(DATA_ID);
  var target = document.getElementById(id);

  control.addEventListener('click', _open(target));
};

exports.default = {
  init: function init() {
    var controls = document.querySelectorAll('[' + DATA_ID + ']');
    Array.from(controls, _bindEvents);
  }
};

/***/ }),

/***/ 49:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _utils = __webpack_require__(61);

var Utils = _interopRequireWildcard(_utils);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var LazyImages = function () {
  _createClass(LazyImages, null, [{
    key: 'init',
    value: function init() {
      if (this._instance) {
        this._instance.disconnect();
      }

      this._instance = new LazyImages();
    }
  }, {
    key: 'HANDLED_CLASS',
    get: function get() {
      return 'has-loaded';
    }
  }, {
    key: 'SUPPORTS_INTERSECTION_OBSERVER',
    get: function get() {
      return 'IntersectionObserver' in window;
    }
  }]);

  function LazyImages() {
    var _this = this;

    _classCallCheck(this, LazyImages);

    var images = document.querySelectorAll('.lazy-image');

    if (!LazyImages.SUPPORTS_INTERSECTION_OBSERVER) {
      this._loadImagesImmediately(images);
      return;
    }

    this._onIntersetion = this._onIntersetion.bind(this);
    this._io = new IntersectionObserver(this._onIntersetion);
    images.forEach(function (image) {
      if (image.classList.contains(LazyImages.HANDLED_CLASS)) {
        return;
      }

      _this._io.observe(image);
    });
  }

  _createClass(LazyImages, [{
    key: '_disconnect',
    value: function _disconnect() {
      if (!this._io) {
        return;
      }

      this._io.disconnect();
    }
  }, {
    key: '_onIntersetion',
    value: function _onIntersetion(entries) {
      var _this2 = this;

      entries.forEach(function (entry) {
        if (entry.intersectionRatio <= 0) {
          return;
        }

        if (entry.target.classList.contains(LazyImages.HANDLED_CLASS)) {
          return;
        }

        entry.target.classList.add('has-loaded');
        _this2._preLoadImage(entry.target);
      });
    }
  }, {
    key: '_preLoadImage',
    value: function _preLoadImage(image) {
      var _this3 = this;

      var src = image.dataset.src;
      if (!src) {
        return;
      }

      return Utils.preloadImage(src).then(function (evt) {
        return _this3._applyImage(image, evt.target);
      });
    }
  }, {
    key: '_loadImagesImmediately',
    value: function _loadImagesImmediately(images) {
      Array.from(images, this._preLoadImage);
    }
  }, {
    key: '_applyImage',
    value: function _applyImage(image, img) {
      image.appendChild(img);
      img.classList.add('fade-in');
    }
  }]);

  return LazyImages;
}();

exports.default = LazyImages;

/***/ }),

/***/ 50:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var HIDDEN_CLASS = 'hidden';
var BACKGROUND_CLASS = 'with-background';

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
        this.el.classList.add(HIDDEN_CLASS);
      } else {
        this.el.classList.remove(HIDDEN_CLASS);
      }

      if (currentPosition > Toolbar.delta) {
        this.el.classList.add(BACKGROUND_CLASS);
      } else {
        this.el.classList.remove(BACKGROUND_CLASS);
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

/***/ 61:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
var preloadImage = function preloadImage(url) {
  return new Promise(function (resolve, reject) {
    var image = new Image();
    image.src = url;
    image.onload = resolve;
    image.onerror = reject;
  });
};

exports.preloadImage = preloadImage;

/***/ })

/******/ });