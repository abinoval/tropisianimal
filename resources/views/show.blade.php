<x-user-layout title="{{ $news->title }}" navbarType="light" customNav="false" navbarScroll="false">

    <div class="section">
        <div class="container mt-5">
            <div class="ratio ratio-16x9">
                <img src="/storage/{{ $news->hero_img }}" alt="{{ $news->title }}" />
            </div>

            <h1 class="fw-bold my-4">{{ $news->title }}</h1>
            {!! $news->content !!}
        </div>
    </div>

</x-user-layout>
