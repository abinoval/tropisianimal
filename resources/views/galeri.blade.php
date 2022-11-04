<x-user-layout title="Galeri">
    <main class="landing landing--2">
        <div
            class="container h-100 d-flex flex-column gap-4 justify-content-center position-relative"
            style="z-index: 1">
            <h1 class="landing__heading">Galeri</h1>
        </div>
    </main>

    <div class="section pb-0">
        <div class="container">
            <section class="splide splide-galery mt-5" aria-label="Splide Basic HTML Example">
                <div class="splide__arrows">
                    <button class="splide__arrow splide__arrow--prev btn btn-success">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                    <button class="splide__arrow splide__arrow--next btn btn-success">
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="splide__track">
                    <ul class="splide__list">
                        @forelse ($slideshows as $slideshow)
                            <li class="splide__slide">
                                <div class="ratio ratio-21x9">
                                    <img
                                        src="/storage/{{ $slideshow->img }}"
                                        class="w-100 h-100"
                                        alt="..." />
                                </div>
                            </li>
                        @empty
                            <li>
                                No Data
                            </li>
                        @endforelse
                    </ul>
                </div>
            </section>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row g-3 justify-content-center">
                @forelse ($columns as $column)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="ratio ratio-4x3">
                            <img
                                src="/storage/{{ $column->img }}"
                                class="w-100 h-100"
                                alt="..." />
                        </div>
                    </div>
                @empty
                    <p>No Data</p>
                @endforelse
            </div>
        </div>
    </div>
</x-user-layout>
