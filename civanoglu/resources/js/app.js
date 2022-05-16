require('./bootstrap');

import Alpine from 'alpinejs';
// import jQuery from './jquery-3.6.0.slim.min';

window.Alpine = Alpine;

Alpine.start();
window.$ = window.jQuery = require('jquery');

require('./slick-1.8.1.min');
// require('./lity.min');

jQuery(window).scroll(function() {
    const scroll = jQuery(window).scrollTop();

    if (scroll >= 50) {
        jQuery('.sticky-header').addClass('sticky-header-active');
    } else {
        jQuery('.sticky-header').removeClass('sticky-header-active');
    }
});

jQuery(document).ready(function($) {
    $('.slider-test').slick();
});
