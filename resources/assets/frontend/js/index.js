window.$ = window.jQuery = require('jquery');
require('bootstrap');
require('swiper/dist/css/swiper.min.css')

import Swiper from 'swiper';

const swiper = new Swiper('.swiper-container', {
  slidesPerView: 3,
  spaceBetween: 30
});