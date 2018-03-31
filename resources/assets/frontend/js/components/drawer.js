class Drawer {
  static get ACTIVE_CLASS () {
    return 'active';
  }

  static get ANIMATABLE_CLASS () {
    return 'animatable';
  }

  static init () {
    new Drawer();
  }

  constructor () {
    this._showButtonEl = document.querySelector('.js-menu-show');
    this._drawerEl = document.getElementById('mobileNav');
    this._drawerContainerEl = this._drawerEl.querySelector('.drawer_drawer');

    this._startX = 0;
    this._currentX = 0;

    this._show = this._show.bind(this);
    this._hide = this._hide.bind(this);
    this._onTouchStart = this._onTouchStart.bind(this);
    this._onTouchMove = this._onTouchMove.bind(this);
    this._onTouchEnd = this._onTouchEnd.bind(this);
    this._onTransitionEnd = this._onTransitionEnd.bind(this);

    this._addEventListeners();
  }

  _addEventListeners () {
    this._showButtonEl.addEventListener('click', this._show);
    this._drawerEl.addEventListener('click', this._hide);
    this._drawerContainerEl.addEventListener('click', this._blockClicks);

    this._drawerEl.addEventListener('touchstart', this._onTouchStart);
    this._drawerEl.addEventListener('touchmove', this._onTouchMove);
    this._drawerEl.addEventListener('touchend', this._onTouchEnd);
  }

  _blockClicks (evt) {
    evt.stopPropagation();
  }

  _onTouchStart (evt) {
    this._startX = evt.touches[0].pageX;
    this._currentX = this._startX;
  }

  _onTouchMove (evt) {
    this._currentX = evt.touches[0].pageX;

    const translateX = Math.min(0, this._currentX - this._startX);
    this._drawerContainerEl.style.transform = `translateX(${translateX}px)`;
  }

  _onTouchEnd (evt) {
    const translateX = Math.min(0, this._currentX - this._startX);
    this._drawerContainerEl.style.transform = 'initial';

    if (translateX < -30) {
      this._drawerContainerEl.style.transform = '';
      this._hide();
    }
  }

  _onTransitionEnd () {
    this._drawerEl.classList.remove(Drawer.ANIMATABLE_CLASS);
    this._drawerEl.removeEventListener('transitionend', this._onTransitionEnd);
  }

  _show () {
    this._drawerEl.classList.add(Drawer.ANIMATABLE_CLASS);
    this._drawerEl.classList.add(Drawer.ACTIVE_CLASS);
    document.body.classList.add('no-scroll');

    this._drawerEl.addEventListener('transitionend', this._onTransitionEnd);
  }

  _hide () {
    this._drawerEl.classList.add(Drawer.ANIMATABLE_CLASS);
    this._drawerEl.classList.remove(Drawer.ACTIVE_CLASS);
    document.body.classList.remove('no-scroll');

    this._drawerEl.addEventListener('transitionend', this._onTransitionEnd);
  }
}

export default Drawer;