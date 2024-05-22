import './bootstrap';

import Swiper from "swiper";
import { Autoplay, Navigation, Pagination } from "swiper/modules";
window.Swiper = Swiper
window.Autoplay = Autoplay
window.Navigation = Navigation
window.Pagination = Pagination

const header = new Swiper('.header', {
    modules: [Autoplay, Navigation, Pagination],
    loop: true, 
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: '.swiper-pagination'
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
})