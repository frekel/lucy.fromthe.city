@extends('layouts.lucy')

@section('title', 'Loops! | Lucy-Rhea')

@section('content')
    @php
        $tags = ['Overig', 'loops'];
        $previous = null;
        $next = [
            'route' => 'lucy.posts.oogkeuring',
            'title' => 'Oogkeuring',
            'image' => 'IMG_0415-500x380.jpg',
        ];
    @endphp

    <article class="story">
        <header class="story-header">
            <p class="eyebrow">29 maart 2018</p>
            <h1>Loops!</h1>
        </header>

        <div class="story-body">
            <figure class="single-media">
                <img src="{{ asset('images/lucy/IMG_3816.jpg') }}" alt="Loops" loading="lazy">
            </figure>

            <p>Ze is loops! We gaan dus voor een nestje. Duimen jullie mee?</p>
        </div>

        @include('lucy.partials.post-tags', ['tags' => $tags])
        @include('lucy.partials.post-footer', ['date' => '29 maart 2018'])
        @include('lucy.partials.single-navigation', ['previous' => $previous, 'next' => $next])
        @include('lucy.partials.related-posts')
    </article>
@endsection