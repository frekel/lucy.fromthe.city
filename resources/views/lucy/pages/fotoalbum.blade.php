@extends('layouts.lucy')

@section('title', 'Fotoalbum | Lucy-Rhea')

@section('content')
    <section class="story story--wide">
        <header class="story-header">
            <p class="eyebrow">Pagina</p>
            <h1>Fotoalbum</h1>
        </header>

        @if (filled($photos))
            <div class="photo-grid photo-grid--album">
                @foreach ($photos as $photo)
                    <figure class="photo-card photo-card--album">
                        <a href="{{ $photo['link'] }}" target="_blank" rel="noreferrer">
                            <img src="{{ $photo['image'] }}" alt="{{ $photo['title'] }}" loading="lazy">
                        </a>
                    </figure>
                @endforeach
            </div>

            <nav class="photoalbum-nav" aria-label="Fotoalbum navigatie">
                @if ($page > 1)
                    <a class="photoalbum-nav__link photoalbum-nav__link--prev nav-previous" href="{{ route('lucy.pages.fotoalbum', ['page' => $page - 1]) }}">&lt; Older photo's</a>
                @else
                    <span class="photoalbum-nav__spacer" aria-hidden="true"></span>
                @endif

                @if ($page < $totalPages)
                    <a class="photoalbum-nav__link photoalbum-nav__link--next nav-next" href="{{ route('lucy.pages.fotoalbum', ['page' => $page + 1]) }}">Newer photo's &gt;</a>
                @endif
            </nav>
        @else
            <div class="story-body">
                <p>Het Flickr-album kon nu niet geladen worden. Probeer het later opnieuw.</p>
            </div>
        @endif
    </section>
@endsection