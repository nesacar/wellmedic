class Toolbar {
  static get DELTS () { return 64; }
  static get HIDDEN_CLASS () { return 'hidden'; }
  static get BACKGROUND_CLASS () { return 'with-background'; }
  get position () { return this._position; }
  set position (val) { this._position = val; }

  static init () {
    if (this._instance) {
      this._instance._disconnect();
    }

    this._instance = new Toolbar();
  }

  constructor () {
    this.el = document.getElementById('header');

    this._onScroll = this._onScroll.bind(this);
    this._update = this._update.bind(this);

    window.addEventListener('scroll', this._onScroll);
    this._update();
  }

  _disconnect () {
    window.removeEventListener('scroll', this._onScroll);
  }

  _update () {
    const prevPosition = this.position;
    const currentPosition = document.body.scrollTop || document.documentElement.scrollTop;

    if (Math.abs(prevPosition - currentPosition) <= Toolbar.DELTS) return;

    if ((currentPosition > prevPosition) && (currentPosition > Toolbar.DELTS)) {
      this.el.classList.add(Toolbar.HIDDEN_CLASS);
    }
    else {
      this.el.classList.remove(Toolbar.HIDDEN_CLASS);
    }

    if (currentPosition > Toolbar.DELTS) {
      this.el.classList.add(Toolbar.BACKGROUND_CLASS);
    }
    else {
      this.el.classList.remove(Toolbar.BACKGROUND_CLASS);
    }

    this.position = currentPosition;
  }

  _onScroll () {
    window.requestAnimationFrame(this._update);
  }
};

export default Toolbar;