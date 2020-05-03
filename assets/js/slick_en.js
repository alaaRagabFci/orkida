$(document).ready(function() {
    // start slider with submnil
    $('.gallery-slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        ltr: true,
        fade: true,
        infinite: true,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
        asNavFor: '.gallery-slider-nav'
    });
    $('.gallery-slider-nav').slick({
        slidesToShow: 3,
        autoplay: true,
        slidesToScroll: 1,
        asNavFor: '.gallery-slider-for',
        dots: false,
        arrows: true,
        centerMode: false,
        vertical: true,
        infinite: true,
        focusOnSelect: true,
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    centerMode: false,
                    infinite: true,
                    vertical: true,
                }
            },
            {
                breakpoint: 510,
                settings: {
                    slidesToShow: 3,
                    centerMode: false,
                    infinite: true,
                    vertical: true,
                }
            }

        ]
    });
    // End slider with submnil
});