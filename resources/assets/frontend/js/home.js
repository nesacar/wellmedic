import Swiper from 'swiper';

const swiper = new Swiper('.swiper-container', {
  slidesPerView: 3,
  spaceBetween: 30,
  navigation: {
    nextEl: '.arrow--next',
    prevEl: '.arrow--prev',
    disabledClass: 'disabled'
  },
  on: {
    init: function () {
      this.el.parentElement.classList.remove('is-loading');
      console.log('swiper initialized. remove preinit styles.');
    }
  },
  breakpoints: {
    767: {
      slidesPerView: 1
    }
  }
});