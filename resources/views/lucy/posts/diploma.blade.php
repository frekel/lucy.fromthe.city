@extends('layouts.lucy')

@section('title', 'Diploma | Lucy-Rhea')

@section('content')
    @php
        $images = [
            '79232061-8F7F-4DA1-99F5-6FE45FD86CEB-e1528704505267-225x300.jpeg',
            'A413D5B3-9E56-468C-B1AF-5E2DF896665C-225x300.jpeg',
            'E732F88F-BEF0-495D-AD98-11E8B376355A-225x300.jpeg',
        ];
        $tags = ['Training', 'diploma', 'wereld-hond', 'wereldhond.nl'];
        $previous = [
            'route' => 'lucy.posts.training',
            'title' => 'Training',
            'image' => 'IMG_0246-e1527856515797-500x380.jpg',
        ];
        $next = [
            'route' => 'lucy.posts.werpkist-maken',
            'title' => 'Werpkist maken',
            'image' => '8E59592E-582B-4F1C-BBD3-8B9DBB9984DB-500x380.jpeg',
        ];
    @endphp

    <article class="story story--wide">
        <header class="story-header">
            <p class="eyebrow">2 juni 2018</p>
            <h1>Diploma</h1>
        </header>

        <div class="story-body">
            <p>
                Lucy is geslaagd voor haar gehoorzaamheidscursus. We zijn supertrots op haar,
                en Wereld Hond verdient ook een bedankje voor de leuke tijd.
            </p>

            @include('lucy.partials.gallery-slider', ['images' => $images, 'alt' => 'Diploma en training'])
        </div>

        @include('lucy.partials.post-tags', ['tags' => $tags])
        @include('lucy.partials.post-footer', ['date' => '2 juni 2018'])
        @include('lucy.partials.single-navigation', ['previous' => $previous, 'next' => $next])
        @include('lucy.partials.related-posts')
    </article>
@endsection