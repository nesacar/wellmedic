class Toolbar {
  static get DELTA () {
    return 64;
  }

  static get HIDDEN_CLASS () {
    return 'hidden';
  }

  static get BACKGROUND_CLASS () {
    return 'with-background';
  }

  static init () {
    if (this._instance) {
      this._instance._disconnect();
    }

    this._instance = new Toolbar();
  }

  constructor () {
    this.el = document.getElementById('header');
    this._ticking = false;

    this._onScroll = this._onScroll.bind(this);
    this._update = this._update.bind(this);

    window.addEventListener('scroll', this._onScroll);
    this._update();
  }

  _disconnect () {
    window.removeEventListener('scroll', this._onScroll);
  }

  _update () {
    this._ticking = false;
    const prevPosition = this._position;
    const currentPosition = document.body.scrollTop || document.documentElement.scrollTop;

    if (Math.abs(prevPosition - currentPosition) <= Toolbar.DELTA) return;

    if ((currentPosition > prevPosition) && (currentPosition > Toolbar.DELTA)) {
      this.el.classList.add(Toolbar.HIDDEN_CLASS);
    }
    else {
      this.el.classList.remove(Toolbar.HIDDEN_CLASS);
    }

    if (currentPosition > Toolbar.DELTA) {
      this.el.classList.add(Toolbar.BACKGROUND_CLASS);
    }
    else {
      this.el.classList.remove(Toolbar.BACKGROUND_CLASS);
    }

    this._position = currentPosition;
  }

  _onScroll () {
    this._requestTick();
  }
  
  _requestTick () {
    if (!this._ticking) {
      window.requestAnimationFrame(this._update);
    }

    this._ticking = true;
  }
};

export default Toolbar;