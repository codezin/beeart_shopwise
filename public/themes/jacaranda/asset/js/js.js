AOS.init();

const glightbox = GLightbox({
    selector: '.glightbox'
});


new Swiper('.featureSwiper', {
    speed: 600,
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
    },
    navigation: {
        nextEl: '.swiper-button-next-01',
        prevEl: '.swiper-button-prev-01',
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 0
        },
        820: {
            slidesPerView: 2,
            spaceBetween: 30
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 30
        }
    }
});

new Swiper(".reviewSwiper", {
    cssMode: true,
    "loop": true,
    "speed" : 600,
    "autoplay": {
        "delay": 5000
    },
    navigation: {
        nextEl: ".swiper-button-next-01",
        prevEl: ".swiper-button-prev-01",
    },
    pagination: {
        el: ".swiper-pagination",
        "clickable": true
    },
    mousewheel: true,
    keyboard: true,
    breakpoints: {
    320: {
        slidesPerView: 1,
            spaceBetween: 0
    },
    820: {
        slidesPerView: 2,
            spaceBetween: 30
    },
    1200: {
        slidesPerView: 4,
            spaceBetween: 30
    }
}
});

new Swiper('.youlikeSwiper', {
    speed: 600,
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false
    },
    slidesPerView: 'auto',
    navigation: {
        nextEl: '.swiper-button-next-01',
        prevEl: '.swiper-button-prev-01',
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 0
        },
        820: {
            slidesPerView: 2,
            spaceBetween: 30
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 30
        }
    }
});

$(document).ready(function(){


});