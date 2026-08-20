@extends('layouts.lucy')

@section('title', 'Prikken | Lucy-Rhea')

@section('content')
    @php
        $tags = ['Dierenarts', 'Prikken'];
        $previous = [
            'route' => 'lucy.posts.oogkeuring',
            'title' => 'Oogkeuring',
            'image' => 'IMG_0415-500x380.jpg',
        ];
        $next = [
            'route' => 'lucy.posts.dekking',
            'title' => 'Dekking',
            'image' => 'IMG_0413-500x380.jpg',
        ];
    @endphp

    <article class="story">
        <header class="story-header">
            <p class="eyebrow">21 april 2018</p>
            <h1>Prikken</h1>
        </header>

        <div class="story-body">
            <figure class="single-media">
                <img src="{{ asset('images/lucy/IMG_6202.jpg') }}" alt="Prikken" loading="lazy">
            </figure>
        </div>

        @include('lucy.partials.post-tags', ['tags' => $tags])
        @include('lucy.partials.post-footer', ['date' => '21 april 2018'])
        @include('lucy.partials.single-navigation', ['previous' => $previous, 'next' => $next])
        @include('lucy.partials.related-posts')
    </article>
@endsection