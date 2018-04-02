import Accordion from './components/accordion';
import Drawer from './components/drawer';
import LazyImages from './components/lazy-images';
import SearchWidget from './components/search-widget';
import Toolbar from './components/toolbar';

import Banner from './components/banner';

export function init () {
  Banner.init();
  Accordion.init();
  Drawer.init();
  LazyImages.init();
  SearchWidget.init();
  Toolbar.init();
};