@extends('layouts.lucy')

@section('title', 'Het is bijna zover… | Lucy-Rhea')

@section('content')
    @php
        $images = [
            '2E243B1F-2D0F-4220-8552-20C5BAB24BCE-e1529926380135-225x300.jpeg',
            '21D4F4B9-6C22-49F1-8EEF-18B554156283-300x225.jpeg',
            'A0787065-05A8-4A64-90B9-9845C45D2077-e1529926735902-225x300.jpeg',
            '750C6E1C-A22B-444D-B025-BDD213BA820C-e1529926786563-225x300.jpeg',
        ];
        $tags = ['Bevalling', 'Bijna bevallen', 'Graven', 'Stout'];
        $previous = [
            'route' => 'lucy.posts.de-rontgen-foto',
            'title' => 'De röntgen foto',
            'image' => 'BA6CE074-B9FE-4736-8090-4EDA9752F4B0-e1529432655750-500x380.jpeg',
        ];
        $next = [
            'route' => 'lucy.posts.fotogallery-bevalling',
            'title' => 'Fotogallery: Bevalling',
            'image' => 'DSC05445-500x380.jpg',
        ];
    @endphp

    <article class="story story--wide">
        <header class="story-header">
            <p class="eyebrow">25 juni 2018</p>
            <h1>Het is bijna zover…</h1>
        </header>

        <div class="story-body">
            <p>
                Heei! Dit komt waarschijnlijk heel onverwacht, maar we hebben getemperatuurd en het was 36,9°C.
                Dat betekende maar één ding: Lucy stond op het punt om te bevallen.
            </p>
            <p>
                Ze groef kuilen in de tuin, zocht haar eigen plekje en zorgde voor precies de gezonde spanning die je vlak voor een bevalling verwacht.
                Echt super spannend.
            </p>

            @include('lucy.partials.gallery-slider', ['images' => $images, 'alt' => 'Lucy vlak voor de bevalling'])
        </div>

        @include('lucy.partials.post-tags', ['tags' => $tags])
        @include('lucy.partials.post-footer', ['date' => '25 juni 2018'])
        @include('lucy.partials.single-navigation', ['previous' => $previous, 'next' => $next])
        @include('lucy.partials.related-posts')
    </article>
@endsection