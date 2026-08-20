@extends('layouts.lucy')

@section('title', 'Fotogallery: Bevalling | Lucy-Rhea')

@section('content')
    @php
        $images = [
            'DSC05445.jpg',
            'DSC05395.jpg',
            'DSC05401.jpg',
            'DSC05405.jpg',
            'DSC05407.jpg',
            'DSC05432.jpg',
            'DSC05471.jpg',
            'DSC05458.jpg',
            'DSC05455.jpg',
            'DSC05453.jpg',
            'DSC05474.jpg',
            'DSC05478.jpg',
            'DSC05489.jpg',
            'DSC05480.jpg',
            'DSC05490.jpg',
            'DSC05495.jpg',
            'DSC05497.jpg',
        ];
        $tags = ['Bevalling', 'fotos', 'gallery'];
        $previous = [
            'route' => 'lucy.posts.het-is-bijna-zover',
            'title' => 'Het is bijna zover...',
            'image' => '2E243B1F-2D0F-4220-8552-20C5BAB24BCE-e1529926380135-500x380.jpeg',
        ];
        $next = [
            'route' => 'lucy.posts.eerste-week-fotoschoot',
            'title' => 'Eerste week: Fotoschoot!',
            'image' => '017a96d7ea32d540455097759b7b86dc2c72771682.jpg',
        ];
    @endphp

    <article class="story story--wide">
        <header class="story-header">
            <p class="eyebrow">26 juni 2018</p>
            <h1>Fotogallery: Bevalling</h1>
        </header>

        <div class="story-body">
            <p>Gisteravond zijn Dobby &amp; Rockie geboren. Moeder en pups maken het prima.</p>

            @include('lucy.partials.gallery-slider', ['images' => $images, 'alt' => 'Foto uit de bevallingsgalerij'])
        </div>

        @include('lucy.partials.post-tags', ['tags' => $tags])
        @include('lucy.partials.post-footer', ['date' => '26 juni 2018'])
        @include('lucy.partials.single-navigation', ['previous' => $previous, 'next' => $next])
        @include('lucy.partials.related-posts')
    </article>
@endsection