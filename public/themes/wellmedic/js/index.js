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
/******/ 	return __webpack_require__(__webpack_require__.s = 191);
/******/ })
/************************************************************************/
/******/ ({

/***/ 191:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(192);


/***/ }),

/***/ 192:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _utils = __webpack_require__(26);

var _wellmedic = __webpack_require__(193);

var wellmedic = _interopRequireWildcard(_wellmedic);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

// window.$ = window.jQuery = require('jquery');
// require('bootstrap');

function loadPageStyles() {
  if (document.querySelector('link[href="' + window.app_url + '/themes/wellmedic/css/index.css"]')) {
    return;
  }

  (0, _utils.loadStyles)(window.app_url + '/themes/wellmedic/css/index.css');
}

(function () {
  loadPageStyles();
  wellmedic.init();
})();

/***/ }),

/***/ 193:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.init = init;

var _accordion = __webpack_require__(194);

var _accordion2 = _interopRequireDefault(_accordion);

var _drawer = __webpack_require__(195);

var _drawer2 = _interopRequireDefault(_drawer);

var _lazyImages = __webpack_require__(196);

var _lazyImages2 = _interopRequireDefault(_lazyImages);

var _searchWidget = __webpack_require__(197);

var _searchWidget2 = _interopRequireDefault(_searchWidget);

var _toolbar = __webpack_require__(198);

var _toolbar2 = _interopRequireDefault(_toolbar);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function init() {
  _accordion2.default.init();
  _drawer2.default.init();
  _lazyImages2.default.init();
  _searchWidget2.default.init();
  _toolbar2.default.init();
};

/***/ }),

/***/ 194:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Accordion = function () {
  _createClass(Accordion, null, [{
    key: 'init',
    value: function init() {
      new Accordion();
    }
  }]);

  function Accordion() {
    var _this = this;

    _classCallCheck(this, Accordion);

    var accordions = document.querySelectorAll('.accordion');

    this._toggle = this._toggle.bind(this);

    accordions.forEach(function (accordion) {
      _this._attachEvents(accordion);
    });
  }

  _createClass(Accordion, [{
    key: '_attachEvents',
    value: function _attachEvents(accordion) {
      var toggleEl = accordion.querySelector('.js-dropdown-toggle');

      toggleEl.addEventListener('click', this._toggle);
    }
  }, {
    key: '_toggle',
    value: function _toggle(evt) {
      var buttonEl = evt.target;
      var pane = document.querySelector(buttonEl.dataset.target);
      var expanded = buttonEl.hasAttribute('data-expanded');

      buttonEl.setAttribute('aria-expanded', !expanded);

      if (expanded) {
        buttonEl.removeAttribute('data-expanded');
        Accordion.collapse(pane);
      } else {
        buttonEl.setAttribute('data-expanded', '');
        Accordion.expand(pane);
      }
    }
  }], [{
    key: 'expand',
    value: function expand(element) {
      var content = element.querySelector('.accordion_container');

      var _content$getBoundingC = content.getBoundingClientRect(),
          height = _content$getBoundingC.height;

      element.style.height = height + 'px';
    }
  }, {
    key: 'collapse',
    value: function collapse(element) {
      element.style.height = '';
    }
  }]);

  return Accordion;
}();

exports.default = Accordion;

/***/ }),

/***/ 195:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Drawer = function () {
  _createClass(Drawer, null, [{
    key: 'init',
    value: function init() {
      new Drawer();
    }
  }, {
    key: 'ACTIVE_CLASS',
    get: function get() {
      return 'active';
    }
  }, {
    key: 'ANIMATABLE_CLASS',
    get: function get() {
      return 'animatable';
    }
  }, {
    key: 'THRESHOLD',
    get: function get() {
      return -75;
    }
  }]);

  function Drawer() {
    _classCallCheck(this, Drawer);

    this._showButtonEl = document.querySelector('.js-menu-show');
    this._drawerEl = document.getElementById('mobileNav');
    this._drawerContainerEl = this._drawerEl.querySelector('.drawer_drawer');

    this._startX = 0;
    this._currentX = 0;
    this._touchingDrawer = false;

    this._show = this._show.bind(this);
    this._hide = this._hide.bind(this);
    this._onTouchStart = this._onTouchStart.bind(this);
    this._onTouchMove = this._onTouchMove.bind(this);
    this._onTouchEnd = this._onTouchEnd.bind(this);
    this._onTransitionEnd = this._onTransitionEnd.bind(this);
    this._uptade = this._uptade.bind(this);

    this._addEventListeners();
  }

  _createClass(Drawer, [{
    key: '_addEventListeners',
    value: function _addEventListeners() {
      this._showButtonEl.addEventListener('click', this._show);
      this._drawerEl.addEventListener('click', this._hide);
      this._drawerContainerEl.addEventListener('click', this._blockClicks);

      this._drawerEl.addEventListener('touchstart', this._onTouchStart);
      this._drawerEl.addEventListener('touchmove', this._onTouchMove);
      this._drawerEl.addEventListener('touchend', this._onTouchEnd);
    }
  }, {
    key: '_blockClicks',
    value: function _blockClicks(evt) {
      evt.stopPropagation();
    }
  }, {
    key: '_onTouchStart',
    value: function _onTouchStart(evt) {
      this._startX = evt.touches[0].pageX;
      this._currentX = this._startX;

      this._touchingDrawer = true;
      window.requestAnimationFrame(this._uptade);
    }
  }, {
    key: '_onTouchMove',
    value: function _onTouchMove(evt) {
      if (!this._touchingDrawer) {
        return;
      }

      this._currentX = evt.touches[0].pageX;
    }
  }, {
    key: '_onTouchEnd',
    value: function _onTouchEnd(evt) {
      if (!this._touchingDrawer) {
        return;
      }

      this._touchingDrawer = false;

      var translateX = Math.min(0, this._currentX - this._startX);
      this._drawerContainerEl.style.transform = '';

      if (translateX < Drawer.THRESHOLD) {
        this._hide();
      }
    }
  }, {
    key: '_uptade',
    value: function _uptade() {
      if (!this._touchingDrawer) {
        return;
      }

      window.requestAnimationFrame(this._uptade);

      var translateX = Math.min(0, this._currentX - this._startX);
      this._drawerContainerEl.style.transform = 'translateX(' + translateX + 'px)';
    }
  }, {
    key: '_onTransitionEnd',
    value: function _onTransitionEnd() {
      this._drawerEl.classList.remove(Drawer.ANIMATABLE_CLASS);
      this._drawerEl.removeEventListener('transitionend', this._onTransitionEnd);
    }
  }, {
    key: '_show',
    value: function _show() {
      this._drawerEl.classList.add(Drawer.ANIMATABLE_CLASS);
      this._drawerEl.classList.add(Drawer.ACTIVE_CLASS);
      document.body.classList.add('no-scroll');

      this._drawerEl.addEventListener('transitionend', this._onTransitionEnd);
    }
  }, {
    key: '_hide',
    value: function _hide() {
      this._drawerEl.classList.add(Drawer.ANIMATABLE_CLASS);
      this._drawerEl.classList.remove(Drawer.ACTIVE_CLASS);
      document.body.classList.remove('no-scroll');

      this._drawerEl.addEventListener('transitionend', this._onTransitionEnd);
    }
  }]);

  return Drawer;
}();

exports.default = Drawer;

/***/ }),

/***/ 196:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _utils = __webpack_require__(26);

var Utils = _interopRequireWildcard(_utils);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var LazyImages = function () {
  _createClass(LazyImages, null, [{
    key: 'init',
    value: function init() {
      if (this._instance) {
        this._instance._disconnect();
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
        if (!entry.isIntersecting) {
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
      var alt = image.dataset.alt;
      if (!src) {
        return;
      }

      return Utils.preloadImage(src).then(function (evt) {
        return _this3._applyImage(image, evt.target, alt);
      });
    }
  }, {
    key: '_loadImagesImmediately',
    value: function _loadImagesImmediately(images) {
      Array.from(images, this._preLoadImage);
    }
  }, {
    key: '_applyImage',
    value: function _applyImage(image, img, alt) {
      if (alt) {
        img.alt = alt;
      }

      image.appendChild(img);
      img.classList.add('fade-in');
    }
  }]);

  return LazyImages;
}();

exports.default = LazyImages;

/***/ }),

/***/ 197:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var SearchWidget = function () {
  _createClass(SearchWidget, null, [{
    key: 'init',
    value: function init() {
      new SearchWidget();
    }
  }, {
    key: 'ACTIVE_CLASS',
    get: function get() {
      return 'search-open';
    }
  }]);

  function SearchWidget() {
    _classCallCheck(this, SearchWidget);

    this._formEl = document.getElementById('search-form');
    this._inputEl = this._formEl.querySelector('input[type="text"]');
    this._closehBtnEl = this._formEl.querySelector('.search-widget_close-btn');

    this._onSubmit = this._onSubmit.bind(this);
    this.hide = this.hide.bind(this);

    this._addEventListeners();
  }

  _createClass(SearchWidget, [{
    key: '_addEventListeners',
    value: function _addEventListeners() {
      this._formEl.addEventListener('submit', this._onSubmit);
      this._closehBtnEl.addEventListener('click', this.hide);
    }
  }, {
    key: '_onSubmit',
    value: function _onSubmit(evt) {
      if (this._inputEl.value === '') {
        evt.preventDefault();
        this.show();
      }
    }
  }, {
    key: 'show',
    value: function show() {
      document.body.classList.add(SearchWidget.ACTIVE_CLASS);
      this._inputEl.focus();
    }
  }, {
    key: 'hide',
    value: function hide() {
      document.body.classList.remove(SearchWidget.ACTIVE_CLASS);
    }
  }]);

  return SearchWidget;
}();

exports.default = SearchWidget;

/***/ }),

/***/ 198:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Toolbar = function () {
  _createClass(Toolbar, null, [{
    key: 'init',
    value: function init() {
      if (this._instance) {
        this._instance._disconnect();
      }

      this._instance = new Toolbar();
    }
  }, {
    key: 'DELTA',
    get: function get() {
      return 64;
    }
  }, {
    key: 'HIDDEN_CLASS',
    get: function get() {
      return 'hidden';
    }
  }, {
    key: 'BACKGROUND_CLASS',
    get: function get() {
      return 'with-background';
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
    key: '_disconnect',
    value: function _disconnect() {
      window.removeEventListener('scroll', this._onScroll);
    }
  }, {
    key: '_update',
    value: function _update() {
      this._ticking = false;
      var prevPosition = this._position;
      var currentPosition = document.body.scrollTop || document.documentElement.scrollTop;

      if (Math.abs(prevPosition - currentPosition) <= Toolbar.DELTA) return;

      if (currentPosition > prevPosition && currentPosition > Toolbar.DELTA) {
        this.el.classList.add(Toolbar.HIDDEN_CLASS);
      } else {
        this.el.classList.remove(Toolbar.HIDDEN_CLASS);
      }

      if (currentPosition > Toolbar.DELTA) {
        this.el.classList.add(Toolbar.BACKGROUND_CLASS);
      } else {
        this.el.classList.remove(Toolbar.BACKGROUND_CLASS);
      }

      this._position = currentPosition;
    }
  }, {
    key: '_onScroll',
    value: function _onScroll() {
      this._requestTick();
    }
  }, {
    key: '_requestTick',
    value: function _requestTick() {
      if (!this._ticking) {
        window.requestAnimationFrame(this._update);
      }

      this._ticking = true;
    }
  }]);

  return Toolbar;
}();

;

exports.default = Toolbar;

/***/ }),

/***/ 26:
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

var loadStyles = function loadStyles(url) {
  return new Promise(function (resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.returnType = 'text';
    xhr.onload = function () {
      var link = document.createElement('link');
      link.rel = 'stylesheet';
      link.href = url;
      document.head.appendChild(link);
      resolve();
    };
    xhr.onerror = reject;
    xhr.open('get', url);
    xhr.send();
  });
};

exports.preloadImage = preloadImage;
exports.loadStyles = loadStyles;

/***/ })

/******/ });