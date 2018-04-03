class Banner {
  static get WORKER_URL () {
    return `${window.app_url}/themes/wellmedic/js/image-processor.js`;
  }

  static get THRESHOLD () {
    return 186;
  }

  static get TOGGLE_CLASS () {
    return 'light-context';
  }

  static init () {
    if (this._instance) {
      this._instance._disconnect();
    }

    this._instance = new Banner();
  }

  constructor () {
    const image = document.getElementById('banner-image');

    this._applyColor = this._applyColor.bind(this);
    this._onMutation = this._onMutation.bind(this);

    this._worker = new Worker(Banner.WORKER_URL);
    this._worker.addEventListener('message', this._applyColor);

    const img = image.firstElementChild;

    // If the image is already in the DOM,
    // load it immediately
    if (img) {
      this._getAverageRGB(img);
      return;
    }

    this._mo = new MutationObserver(this._onMutation);
    this._mo.observe(image, {
      childList: true
    });
  }

  _disconnect () {
    if (!this._mo) {
      return;
    }

    this._mo.disconnect();
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
    const canvas = document.createElement('canvas');
    const canvasCtx = canvas.getContext('2d');
    canvas.height = img.height;
    canvas.width = img.width;
    canvasCtx.drawImage(img, 0, 0);
    const imageData = canvasCtx.getImageData(0, 0, img.width, img.height);

    this._worker.postMessage(imageData, [imageData.data.buffer]);
  }

  _applyColor (d) {
    const luma = d.data;
    const banner = document.getElementById('banner');
    (luma < Banner.THRESHOLD)
      ? banner.classList.add(Banner.TOGGLE_CLASS)
      : banner.classList.remove(Banner.TOGGLE_CLASS);
  }
}

export default Banner;