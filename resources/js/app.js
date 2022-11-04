import "./bootstrap";

document.addEventListener("trix-file-accept", function (event) {
    event.preventDefault();
});

document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".animate-scroll");
    const navbarCollapse = document.querySelector(".navbar-collapse");
    const splideHomeEl = document.querySelector(".splide-home");
    const splideGaleryEl = document.querySelector(".splide-galery");

    window.addEventListener("scroll", function () {
        navbar.classList.toggle("bg-dark", this.scrollY > 0);
        navbar.classList.toggle("bg-transparent", this.scrollY === 0);
        navbarCollapse.classList.toggle("custom-collapse", this.scrollY === 0);
    });

    if (splideHomeEl) {
        const splideHome = new Splide(".splide-home", {
            perPage: 4,
            pagination: false,
            breakpoints: {
                768: {
                    perPage: 3,
                },
                576: {
                    perPage: 2,
                },
            },
        });
        splideHome.mount();
    }

    if (splideGaleryEl) {
        const splideGalery = new Splide(".splide-galery", {
            perPage: 1,
            pagination: false,
        });
        splideGalery.mount();
    }
});
