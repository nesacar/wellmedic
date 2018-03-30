class LazyImages {
  static init () {
    const images = document.getElementsByClassName('lazy-image');
    Array.from(images, LazyImages.load);
  }

  static load (image) {
    const src = image.getAttribute('data-src');
    const img = document.createElement('img');

    img.src = image.getAttribute('data-src');
    img.onload = function (evt) {
      image.appendChild(img);
    };
  }
}

export default LazyImages;