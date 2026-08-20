@extends('layouts.lucy')

@section('title', 'Training | Lucy-Rhea')

@section('content')
    @php
        $tags = ['Training', 'wereld-hond', 'wereldhond'];
        $previous = [
            'route' => 'lucy.posts.dekking',
            'title' => 'Dekking',
            'image' => 'IMG_0413-500x380.jpg',
        ];
        $next = [
            'route' => 'lucy.posts.diploma',
            'title' => 'Diploma',
            'image' => '2A701464-65D1-442B-83B3-225668076AF1-500x380.png',
        ];
    @endphp

    <article class="story">
        <header class="story-header">
            <p class="eyebrow">12 mei 2018</p>
            <h1>Training</h1>
        </header>

        <div class="story-body">
            <p>
                Lucy doet al een aantal weken mee aan de Gehoorzaamheidscursus bij Wereld Hond. Zie http://www.wereldhond.nl
            </p>

            <figure class="single-media">
                <img src="{{ asset('images/lucy/IMG_0246-e1527856515797-1140x1520.jpg') }}" alt="Lucy tijdens training" loading="lazy">
            </figure>

            <div class="video-embed">
                <iframe
                    src="https://www.youtube.com/embed/UDgke7LUEI4?feature=oembed"
                    title="Training video"
                    frameborder="0"
                    allow="autoplay; encrypted-media; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>

            <p><a href="http://www.wereldhond.nl" target="_blank" rel="noreferrer">wereldhond.nl</a></p>
        </div>

        @include('lucy.partials.post-tags', ['tags' => $tags])
        @include('lucy.partials.post-footer', ['date' => '12 mei 2018'])
        @include('lucy.partials.single-navigation', ['previous' => $previous, 'next' => $next])
        @include('lucy.partials.related-posts')
    </article>
@endsection