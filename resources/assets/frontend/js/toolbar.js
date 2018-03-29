const HIDDEN_CLASS = 'hidden';
const BACKGROUND_CLASS = 'with-background';

class Toolbar {
  static get delta () { return 64; }
  get position () { return this._position; }
  set position (val) { this._position = val; } 

  constructor () {
    this.el = document.getElementById('header');

    this._ticking = false;

    this._onScroll = this._onScroll.bind(this);
    this._update = this._update.bind(this);

    window.addEventListener('scroll', this._onScroll);
    this._update();
  }

  _update () {
    const prevPosition = this.position;
    const currentPosition = document.body.scrollTop || document.documentElement.scrollTop;

    if (Math.abs(prevPosition - currentPosition) <= Toolbar.delta) return;

    if ((currentPosition > prevPosition) && (currentPosition > Toolbar.delta)) {
      this.el.classList.add(HIDDEN_CLASS);
    }
    else {
      this.el.classList.remove(HIDDEN_CLASS);
    }

    if (currentPosition > Toolbar.delta) {
      this.el.classList.add(BACKGROUND_CLASS);
    }
    else {
      this.el.classList.remove(BACKGROUND_CLASS);
    }

    this.position = currentPosition;
  }

  _onScroll () {
    window.requestAnimationFrame(this._update);
  }
};

export default Toolbar;