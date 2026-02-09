jQuery(document).ready(function($) {
    $('.match-slick-slider').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1, // Shows one slide (containing 3 matches) at a time
        adaptiveHeight: true,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev">←</button>',
        nextArrow: '<button type="button" class="slick-next">→</button>'
    });
});