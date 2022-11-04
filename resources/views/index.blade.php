<x-user-layout title="Home">
    <main class="landing">
        <div
            class="container h-100 d-flex flex-column gap-4 justify-content-center position-relative"
            style="z-index: 1">
            <h1 class="landing__heading">Hewan <span class="d-block">Tropis di Dunia</span></h1>
            <p class="landing__text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque exercitationem
                impedit ex, nisi quasi sint et.
            </p>
        </div>
    </main>

    <section class="section about">
        <div class="container">
            <div class="row align-items-center flex-lg-row flex-column-reverse gap-lg-0 gap-4">
                <div class="col-lg-6">
                    <span class="text-success fw-bold d-block">TENTANG KAMI</span>
                    <h1 class="fw-bolder">Membangun Komunitas Hewan</h1>
                    <p class="about__caption">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem cupiditate
                        eaque, delectus aperiam voluptas dolores dolorum nemo officia. Beatae
                        modi ad ea pariatur quaerat incidunt cum debitis eveniet reprehenderit
                        hic.
                    </p>
                    <p class="about__subcaption">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem cupiditate
                        eaque, delectus aperiam voluptas dolores dolorum nemo officia. Beatae
                        modi ad ea pariatur quaerat incidunt cum debitis eveniet reprehenderit
                        hic.
                    </p>
                    <a href="{{ route('about') }}" class="btn btn-success">baca selengkapnya <i
                            class="bi bi-arrow-right"></i></a>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex gap-3 mb-3">
                        <div class="col">
                            <img
                                class="w-100"
                                src="./assets/x1/alessandro-desantis-9_9hzZVjV8s-unsplash.png"
                                alt="" />
                        </div>
                        <div class="col">
                            <img
                                class="w-100"
                                src="./assets/x1/joshua-j-cotten-VCzNXhMoyBw-unsplash.png"
                                alt="" />
                        </div>
                    </div>
                    <img
                        class="w-100"
                        src="./assets/x1/kyle-nieber-3ryX0ShTMWg-unsplash.png"
                        alt="" />
                </div>
            </div>
        </div>
    </section>

    <section class="section service">
        <div class="container">
            <h1 class="service__heading">
                Kami Membawa Anda <span class="d-lg-block">Untuk Mengetahui Lebih Dalam</span>
            </h1>
            <div class="row g-3 mt-5">
                <div class="col-lg-3 col-sm-6">
                    <div class="service__card">
                        <div class="service__card__icon">
                            <img src="./assets/pawprint.svg" alt="" />
                        </div>
                        <h3 class="service__card__heading">Lorem Ipsum Dolor Sit Amet</h3>
                        <p class="service__card__capt">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores
                            pariatur molestiae labore.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="service__card">
                        <div class="service__card__icon">
                            <img src="./assets/pawprint.svg" alt="" />
                        </div>
                        <h3 class="service__card__heading">Lorem Ipsum Dolor Sit Amet</h3>
                        <p class="service__card__capt">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores
                            pariatur molestiae labore.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="service__card">
                        <div class="service__card__icon">
                            <img src="./assets/pawprint.svg" alt="" />
                        </div>
                        <h3 class="service__card__heading">Lorem Ipsum Dolor Sit Amet</h3>
                        <p class="service__card__capt">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores
                            pariatur molestiae labore.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="service__card">
                        <div class="service__card__icon">
                            <img src="./assets/pawprint.svg" alt="" />
                        </div>
                        <h3 class="service__card__heading">Lorem Ipsum Dolor Sit Amet</h3>
                        <p class="service__card__capt">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores
                            pariatur molestiae labore.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section news">
        <div class="container">
            <span class="text-success fw-bold d-block">BERITA</span>
            <h1 class="section__heading">
                Baca Berita Terbaru Kami <span class="d-lg-block">Dalam Tropisianimal</span>
            </h1>
            <div class="row g-3 mt-5">
                @forelse ($news as $new)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <img
                                src="/storage/{{ $new->hero_img }}"
                                class="card-img-top"
                                alt="{{ $new->title }}" />
                            <div class="card-body text-center h-100">
                                <h5 class="card-title">
                                    <a href="{{ route('show-news', $new->id) }}"
                                        class="text-reset text-decoration-none">
                                        {{ $new->title }}
                                    </a>
                                </h5>
                                <p class="card-text">
                                    {{ $new->excerpt }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No data</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="section pb-0 gallery">
        <div class="container">
            <span class="text-success fw-bold d-block">GALERI</span>
            <h1 class="section__heading">
                Lihat Lebih Banyak Hewan Tropis <span class="d-lg-block">Pada Galeri Kami</span>
            </h1>
        </div>
        <section class="splide splide-home mt-5" aria-label="Splide Basic HTML Example">
            <div class="splide__arrows">
                <button class="splide__arrow splide__arrow--prev btn btn-success ms-5">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <button class="splide__arrow splide__arrow--next btn btn-success me-5">
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
            <div class="splide__track">
                <ul class="splide__list">
                    @forelse ($galeries as $galery)
                        <li class="splide__slide">
                            <div class="ratio ratio-1x1">
                                <img
                                    src="/storage/{{ $galery->img }}"
                                    class="w-100 h-100"
                                    alt="..." />
                            </div>
                        </li>
                    @empty
                        <li>
                            No data
                        </li>
                    @endforelse
                </ul>
            </div>
        </section>
    </div>
</x-user-layout>
