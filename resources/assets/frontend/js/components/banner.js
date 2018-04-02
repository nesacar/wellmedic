import * as Utils from '../utils';

class Banner {
  static init () {
    new Banner();
  }

  constructor () {
    const image = document.getElementById('banner-image');

    this._onMutation = this._onMutation.bind(this);
    this._mo = new MutationObserver(this._onMutation);

    this._mo.observe(image, {
      childList: true
    });
  }

  _onMutation (mutations) {
    mutations.forEach(mutation => {
      if (mutation.type === 'childList') {
        const img = mutation.target.firstElementChild;
        this._getAverageRGB(img);
      }
    });
  }

  _getAverageRGB (img) {
    const color = Utils.getAverageRGB(img);
  }

  _applyColor (image) {
    
  }
}

export default Banner;