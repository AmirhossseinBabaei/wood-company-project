import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'glightbox/dist/css/glightbox.css';

//swiper js assets
import 'swiper/css';
import 'swiper/css/effect-cube';
import 'swiper/css/pagination';
//end swiperjs assets

import Swiper from 'swiper';

import {EffectCube, Pagination, Autoplay} from 'swiper/modules';
import Splide from '@splidejs/splide';
import '@splidejs/splide/css';

new Swiper('.mySwiper', {
    effect: 'cube',
    grabCursor: true,

    cubeEffect: {
        shadow: true,
        slideShadows: true,
        shadowOffset: 20,
        shadowScale: 0.94,
    },

    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },

    loop: true,
    speed: 1200,

    modules: [EffectCube, Pagination, Autoplay],
});


new Splide('.splide', {
    type: 'loop',
    perPage: 7,
    gap: '20px',
    autoplay: true,
    interval: 3000,
    pauseOnHover: true,
    arrows: false,
    pagination: true,
    direction: 'rtl',
    navigation: true
}).mount();
