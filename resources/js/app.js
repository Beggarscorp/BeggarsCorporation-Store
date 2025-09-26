import '../css/app.css';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

function initSwipers() {
    // Find all swiper containers
    const sliders = document.querySelectorAll(".swiper");

    sliders.forEach((sliderEl) => {
        // If already initialized, destroy old instance
        if (sliderEl.swiper) {
            sliderEl.swiper.destroy(true, true);
        }

        // Read options via data attributes (so you can customize per slider)
        const slidesPerView = sliderEl.dataset.slides || 4;
        const spaceBetween = sliderEl.dataset.space || 30;
        const loop = sliderEl.dataset.loop === "true";

        // Init Swiper
        new Swiper(sliderEl, {
            loop: loop,
            slidesPerView: parseInt(slidesPerView),
            spaceBetween: parseInt(spaceBetween),
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
            },
            pagination: {
                el: sliderEl.querySelector(".swiper-pagination"),
                clickable: true,
            },
            navigation: {
                nextEl: sliderEl.querySelector(".swiper-button-next"),
                prevEl: sliderEl.querySelector(".swiper-button-prev"),
            },
        });
    });
}

// Run on normal page load
document.addEventListener("DOMContentLoaded", initSwipers);

// Run again after Livewire navigation
document.addEventListener("livewire:navigated", initSwipers);
