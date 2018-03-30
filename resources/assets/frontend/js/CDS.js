import Drawer from './components/drawer';
import LazyImages from './components/lazy-images';
import Toolbar from './components/toolbar';

export function init () {
  Toolbar.init();
  Drawer.init();
  LazyImages.init();
};