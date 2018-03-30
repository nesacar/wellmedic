class Drawer {
  static get ACTIVE_CLASS () { return 'active'; }
  static init () {
    new Drawer();
  }

  constructor () {
    this._showButtonEl = document.querySelector('.js-menu-show');
    this._drawerEl = document.getElementById('mobileNav');
    this._drawerContainerEl = this._drawerEl.querySelector('.drawer_drawer');

    this._show = this._show.bind(this);
    this._hide = this._hide.bind(this);
    this._blockClicks = this._blockClicks.bind(this);

    this._addEventListeners();
  }

  _addEventListeners () {
    this._showButtonEl.addEventListener('click', this._show);
    this._drawerEl.addEventListener('click', this._hide);
    this._drawerContainerEl.addEventListener('click', this._blockClicks);
  }

  _blockClicks (evt) {
    evt.stopPropagation();
  }

  _show () {
    this._drawerEl.classList.add(Drawer.ACTIVE_CLASS);
    document.body.classList.add('no-scroll');
  }

  _hide () {
    this._drawerEl.classList.remove(Drawer.ACTIVE_CLASS);
    document.body.classList.remove('no-scroll');
  }
}

export default Drawer;