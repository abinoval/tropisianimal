<x-user-layout title="Berita">
    <main class="landing landing--2">
        <div
            class="container h-100 d-flex flex-column gap-4 justify-content-center position-relative"
            style="z-index: 1">
            <h1 class="landing__heading">Berita</h1>
        </div>
    </main>

    <section class="section about">
        <div class="container">
            <div
                class="row align-items-center flex-lg-row flex-column-reverse g-lg-5 gap-lg-0 gap-4">
                <div class="col-lg-6 order-lg-2">
                    <h1 class="fw-bolder">{{ $news->first()->title }}</h1>
                    <p class="about__caption">
                        {{ $news->first()->excerpt }}
                    </p>
                    <p class="about__subcaption">
                        {{ $news->first()->subcapt }}
                    </p>
                    <a href="{{ route('show-news', $news->first()->id) }}" class="btn btn-success">baca selengkapnya <i
                            class="bi bi-arrow-right"></i></a>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="ratio ratio-1x1">
                        <div class="row g-3 mb-3">
                            <div class="col h-100">
                                <img
                                    class="w-100 h-100"
                                    src="/storage/{{ $news->first()->hero_img }}"
                                    alt="" />
                            </div>
                            <div class="col d-flex flex-column gap-3 h-100">
                                <img
                                    class="w-100 h-40"
                                    src="/storage/{{ $news->first()->img_2 }}"
                                    alt="" />
                                <img
                                    class="w-100 h-60"
                                    src="/storage/{{ $news->first()->img_3 }}"
                                    alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section news">
        <div class="container">
            <h1 class="section__heading">Berita Lainnya</h1>
            <div class="row g-3 mt-5">
                @forelse ($news->skip(1) as $new)
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
</x-user-layout>
