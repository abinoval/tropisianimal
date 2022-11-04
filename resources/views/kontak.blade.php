<x-user-layout title="Kontak">
    <main class="landing landing--2">
        <div
            class="container h-100 d-flex flex-column gap-4 justify-content-center position-relative"
            style="z-index: 1">
            <h1 class="landing__heading">Kontak Kami</h1>
        </div>
    </main>

    <section class="section pb-3">
        <div class="container">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe
                        style="height: 100%; width: 100%"
                        id="gmap_canvas"
                        src="https://maps.google.com/maps?q=CyberLabs,%20Jalan%20Terusan%20Mars%20Utara%20III,%20Manjahlega,%20Kota%20Bandung,%20Jawa%20Barat&t=k&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0"
                        scrolling="no"
                        marginheight="0"
                        marginwidth="0"></iframe>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 300px;
                            width: 100%;
                        }
                    </style>
                    <style>
                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 100%;
                            width: 100%;
                        }
                    </style>
                </div>
            </div>
        </div>
    </section>

    <div class="section">
        <div class="container">
            <h1 class="section__heading">Kontak Kami</h1>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" class="row g-3 mt-3" action="{{ route('submit') }}">
                @csrf
                <div class="col-md-8">
                    <div class="h-100">
                        <textarea
                            class="form-control h-100 @error('message') is-invalid @enderror"
                            rows="6"
                            name="message"
                            placeholder="Deskripsi"></textarea>
                        @error('message')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-column gap-3">
                        <div>
                            <input type="text" name="subject"
                                class="form-control @error('subject') is-invalid @enderror" placeholder="Subject" />
                            @error('subject')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Nama" />
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email" />
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">
                            Kirim <i class="bi bi-send"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <section class="section pt-0">
        <div class="container">
            <div class="row justify-content-center g-3">
                <div class="col-md-4 col-sm-6">
                    <div class="service__card">
                        <div class="service__card__icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <h3 class="service__card__heading mb-1 mt-3">Email</h3>
                        <p class="service__card__capt">tropisianimal@gmail.com</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service__card">
                        <div class="service__card__icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <h3 class="service__card__heading mb-1 mt-3">Phone</h3>
                        <p class="service__card__capt">+62 812 3456 7890</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service__card">
                        <div class="service__card__icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h3 class="service__card__heading mb-1 mt-3">Location</h3>
                        <p class="service__card__capt">Kota Bandung, Jawa Barat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-user-layout>
