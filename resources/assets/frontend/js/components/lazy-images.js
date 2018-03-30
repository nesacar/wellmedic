import * as Utils from '../utils';

class LazyImages {
  static get HANDLED_CLASS () {
    return 'has-loaded';
  }

  static get SUPPORTS_INTERSECTION_OBSERVER () {
    return ('IntersectionObserver' in window);
  }

  static init () {
    if (this._instance) {
      this._instance._disconnect();
    }

    this._instance = new LazyImages();
  }

  constructor () {
    const images = document.querySelectorAll('.lazy-image');

    if (!LazyImages.SUPPORTS_INTERSECTION_OBSERVER) {
      this._loadImagesImmediately(images);
      return;
    }

    this._onIntersetion = this._onIntersetion.bind(this);
    this._io = new IntersectionObserver(this._onIntersetion);
    images.forEach(image => {
      if (image.classList.contains(LazyImages.HANDLED_CLASS)) {
        return;
      }

      this._io.observe(image);
    });
  }

  _disconnect () {
    if (!this._io) {
      return;
    }

    this._io.disconnect();
  }

  _onIntersetion (entries) {
    entries.forEach(entry => {
      if (entry.intersectionRatio <= 0) {
        return;
      }

      if (entry.target.classList.contains(LazyImages.HANDLED_CLASS)) {
        return;
      }

      entry.target.classList.add('has-loaded');
      this._preLoadImage(entry.target);
    });
  }

  _preLoadImage (image) {
    const src = image.dataset.src;
    if (!src) {
      return;
    }

    return Utils.preloadImage(src).then(evt => this._applyImage(image, evt.target));
  }

  _loadImagesImmediately (images) {
    Array.from(images, this._preLoadImage);
  }

  _applyImage (image, img) {
    image.appendChild(img);
    img.classList.add('fade-in');
  }
}

export default LazyImages;