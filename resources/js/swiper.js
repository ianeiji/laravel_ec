// core version + navigation, pagination modules:
import Swiper, { Navigation, Pagination } from 'swiper';
// configure Swiper to use modules
Swiper.use([Navigation, Pagination]);

import 'swiper/swiper-bundle.css';

var mySwiper = new Swiper('.swiper-container', {
  // Optional parameters
  loop: true,
  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

});


