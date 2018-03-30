// window.$ = window.jQuery = require('jquery');
// require('bootstrap');

import drawer from './components/drawer';
import LazyImages from './components/lazy-images';
import Toolbar from './components/toolbar';

const toolbar = new Toolbar();
drawer.init();
LazyImages.init();