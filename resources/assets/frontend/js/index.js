// window.$ = window.jQuery = require('jquery');
// require('bootstrap');

import { loadStyles } from './utils';
import * as wellmedic from './wellmedic';

function loadPageStyles () {
  if (document.querySelector('link[href="/themes/wellmedic/css/index.css"]')) {
    return;
  }

  loadStyles('/themes/wellmedic/css/index.css');
}

(function () {
  loadPageStyles();
  wellmedic.init();
}());