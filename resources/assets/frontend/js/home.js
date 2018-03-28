import Swiper from 'swiper';

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
    }
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

const swipers = document.getElementsByClassName('swiper-container');
Array.from(swipers, (swiper, i) => {
  let name = swiper.getAttribute('data-name');
  new Swiper(swiper, OPTIONS[name]);
});
