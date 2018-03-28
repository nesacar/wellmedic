class Toolbar {
  static get delta () { return 64; }
  get position () { return this._position; }
  set position (val) { this._position = val; } 

  constructor () {
    this.el = document.getElementById('header');

    this._handleScroll = this._handleScroll.bind(this);

    window.addEventListener('scroll', this._handleScroll);
  }

  _handleScroll () {
    const prevPosition = this.position;
    const currentPosition = document.body.scrollTop || document.documentElement.scrollTop;

    if (Math.abs(prevPosition - currentPosition) <= Toolbar.delta) return;

    if ((currentPosition > prevPosition) && (currentPosition > Toolbar.delta)) {
      // TODO: Remove with-background class on currentPosition < Toolbar.delta
      this.el.classList.add('hidden', 'with-background');
    }
    else {
      this.el.classList.remove('hidden');
    }

    this.position = currentPosition;
  }
};

export default Toolbar;