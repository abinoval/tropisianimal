@props(['title', 'navbarType' => 'custom', 'customNav' => true, 'navbarScroll' => true])

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    @vite('resources/sass/app.scss')
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide-core.min.css" />
</head>

<body>
    <nav
        class="navbar {{ $navbarType == 'light' ? 'navbar-light bg-light' : 'navbar-dark bg-transparent' }} navbar-expand-lg bg-light fixed-top {{ filter_var($navbarScroll, FILTER_VALIDATE_BOOLEAN) ? 'animate-scroll' : '' }}">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('home') }}">Tropisianimal</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse {{ filter_var($customNav, FILTER_VALIDATE_BOOLEAN) ? 'custom-collapse' : '' }}"
                id="navbarNav">
                <ul class="navbar-nav ms-auto gap-lg-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('galery') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{ $slot }}
    <footer class="footer mt-5">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-5 col-sm-6 col-12">
                    <h2 class="footer__brand">Tropisianimal</h2>
                    <p class="footer__desc">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, fugit
                        porro saepe nemo et tempora libero beatae suscipit atque.
                    </p>
                    <div class="footer__socials">
                        <a class="text-reset" href="#">
                            <img src="/assets/x1/001-facebook.png" alt="" />
                        </a>
                        <a class="text-reset" href="#">
                            <img src="/assets/x1/002-twitter.png" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-12">
                    <span class="footer__hlink">Useful links</span>
                    <div class="footer__links">
                        <a href="#">Blog</a>
                        <a href="#">Hewan</a>
                        <a href="#">Galeri</a>
                        <a href="#">Testimonial</a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-12">
                    <span class="footer__hlink">Privacy</span>
                    <div class="footer__links">
                        <a href="#">Karir</a>
                        <a href="#">Tentang Kami</a>
                        <a href="#">Kontak Kami</a>
                        <a href="#">Servis</a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <span class="footer__hlink">Contact Info</span>
                    <div class="footer__contact">
                        <span><i class="bi bi-envelope"></i> tropisianimal@gmail.com</span>
                        <span><i class="bi bi-telephone"></i> +62 812 3456 7890</span>
                        <span><i class="bi bi-geo-alt"></i> Kota Bandung, Jawa Barat</span>
                    </div>
                </div>
            </div>
            <p class="footer__copy">Copyright &copy;2020 All rights reserved</p>
        </div>
    </footer>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js"></script>
    @vite('resources/js/app.js')
</body>

</html>
