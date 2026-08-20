@extends('layouts.lucy')

@section('title', 'Eerste week: Fotoschoot! | Lucy-Rhea')

@section('content')
    @php
        $images = [
            '017a96d7ea32d540455097759b7b86dc2c72771682.jpg',
            '014c8039266bc9bffd065c404c1be3661326372fee.jpg',
            '0159394151eba3b757ddee48ff7f5e89ebd35c26bb.jpg',
            '019977fbf9e00bd63ceafb936c81b22326113b1abf.jpg',
        ];
        $tags = ["Foto's", '1 week', '7 dagen', 'dobby', 'fotoshoot', 'rockie'];
        $previous = [
            'route' => 'lucy.posts.fotogallery-bevalling',
            'title' => 'Fotogallery: Bevalling',
            'image' => 'DSC05445-500x380.jpg',
        ];
        $next = null;
    @endphp

    <article class="story story--wide">
        <header class="story-header">
            <p class="eyebrow">3 juli 2018</p>
            <h1>Eerste week: Fotoschoot!</h1>
        </header>

        <div class="story-body">
            <p>Dobby &amp; Rockie zijn precies 1 week oud. Tijd voor een kleine fotoshoot van Lily.</p>

            @include('lucy.partials.gallery-slider', ['images' => $images, 'alt' => 'Fotoshoot van de eerste week'])
        </div>

        @include('lucy.partials.post-tags', ['tags' => $tags])
        @include('lucy.partials.post-footer', ['date' => '3 juli 2018'])
        @include('lucy.partials.single-navigation', ['previous' => $previous, 'next' => $next])
        @include('lucy.partials.related-posts')
    </article>
@endsection