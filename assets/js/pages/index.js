$(document).ready(function () {
    $(".top-chemical-supplier").owlCarousel({
        margin: 20,
        loop: true,
        items: 2,
        nav: true,
        dots: false,
        // center: true,
        // lazyLoad:true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            768: {
                items: 1,
                nav: false,
            },
            1024: {
                items: 2,
                nav: true,
                loop: false,
            },
        },
    });

    $(".top-chemical-buyer").owlCarousel({
        margin: 20,
        loop: true,
        items: 2,
        nav: true,
        dots: false,
        // center: true,
        // lazyLoad:true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            768: {
                items: 1,
                nav: false,
            },
            1024: {
                items: 2,
                nav: true,
                loop: false,
            },
        },
    });

    $(".feedback-slider").owlCarousel({
        margin: 20,
        loop: true,
        items: 3,
        nav: true,
        dots: false,
        // center: true,
        // lazyLoad:true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            768: {
                items: 1,
                nav: false,
            },
            1024: {
                items: 2,
                nav: true,
                loop: false,
            },
        },
    });

});