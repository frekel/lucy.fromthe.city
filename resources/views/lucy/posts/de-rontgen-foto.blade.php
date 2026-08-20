@extends('layouts.lucy')

@section('title', 'De röntgen foto | Lucy-Rhea')

@section('content')
    @php
        $images = [
            'A68DBE74-5B7C-476A-B5B9-4BD24997AD35-300x225.jpeg',
            '45B31485-E120-4507-91BA-5CE414EC3DCC-300x225.jpeg',
            '42D7516A-5A7B-4274-94D2-05F4CCF23279-e1529432686497-225x300.jpeg',
            'BA6CE074-B9FE-4736-8090-4EDA9752F4B0-e1529432655750-225x300.jpeg',
        ];
        $tags = ['Dierenarts', "Echo's", 'Foto', 'Röntgen'];
        $previous = [
            'route' => 'lucy.posts.werpkist-maken',
            'title' => 'Werpkist maken',
            'image' => '8E59592E-582B-4F1C-BBD3-8B9DBB9984DB-500x380.jpeg',
        ];
        $next = [
            'route' => 'lucy.posts.het-is-bijna-zover',
            'title' => 'Het is bijna zover...',
            'image' => '2E243B1F-2D0F-4220-8552-20C5BAB24BCE-e1529926380135-500x380.jpeg',
        ];
    @endphp

    <article class="story story--wide">
        <header class="story-header">
            <p class="eyebrow">19 juni 2018</p>
            <h1>De röntgen foto</h1>
        </header>

        <div class="story-body">
            <p>
                Zo, net de röntgenfoto gehad en ja: zoals je misschien al kunt zien zijn het er twee.
                Een prachtig aantal voor de eerste keer, zeker na alle moeite rond de dekking.
            </p>

            @include('lucy.partials.gallery-slider', ['images' => $images, 'alt' => 'Röntgen en zwangerschap'])
        </div>

        @include('lucy.partials.post-tags', ['tags' => $tags])
        @include('lucy.partials.post-footer', ['date' => '19 juni 2018'])
        @include('lucy.partials.single-navigation', ['previous' => $previous, 'next' => $next])
        @include('lucy.partials.related-posts')
    </article>
@endsection