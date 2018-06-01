import Swiper from 'swiper';
import Banner from './components/banner';

const OPTIONS = {
  masthead: {
    loop: true,
    speed: 500,
    autoplay: {
      delay: 5000
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    on: {
      init: function () {
        this.el.classList.add('has-loaded');
      }
    },
  },
  quotes: {
    slidesPerView: 3,
    spaceBetween: 30,
    navigation: {
      nextEl: '.arrow--next',
      prevEl: '.arrow--prev',
      disabledClass: 'disabled'
    },
    on: {
      init: function () {
        this.el.classList.remove('is-loading');
      }
    },
    breakpoints: {
      767: {
        slidesPerView: 1
      }
    }
  }
};

(function () {
  Banner.init();
  const swipers = document.getElementsByClassName('swiper-container');
  Array.from(swipers, (swiper, i) => {
    let name = swiper.getAttribute('data-name');
    new Swiper(swiper, OPTIONS[name]);
  });
}());
