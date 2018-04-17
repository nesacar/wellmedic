import Accordion from './components/accordion';
import Drawer from './components/drawer';
import LazyImages from './components/lazy-images';
import SearchWidget from './components/search-widget';
import Toolbar from './components/toolbar';
import TextField from './components/text-field';
import Quotes from './components/quotes';

export function init () {
  Accordion.init();
  Drawer.init();
  LazyImages.init();
  SearchWidget.init();
  Toolbar.init();
  TextField.init();
  Quotes.init();
};