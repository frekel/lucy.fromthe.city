@extends('layouts.lucy')

@section('title', 'Dekking | Lucy-Rhea')

@section('content')
    @php
        $images = [
            'bf3e757d-e7de-4a02-8118-c98e51950ae4-300x225.jpg',
            'IMG_0413-300x225.jpg',
        ];
        $tags = ['Dekking'];
        $previous = [
            'route' => 'lucy.posts.prikken',
            'title' => 'Prikken',
            'image' => 'IMG_6202-500x380.jpg',
        ];
        $next = [
            'route' => 'lucy.posts.training',
            'title' => 'Training',
            'image' => 'IMG_0246-e1527856515797-500x380.jpg',
        ];
    @endphp

    <article class="story story--wide">
        <header class="story-header">
            <p class="eyebrow">23 april 2018</p>
            <h1>Dekking</h1>
        </header>

        <div class="story-body">
            @include('lucy.partials.gallery-slider', ['images' => $images, 'alt' => 'Dekking'])
        </div>

        @include('lucy.partials.post-tags', ['tags' => $tags])
        @include('lucy.partials.post-footer', ['date' => '23 april 2018'])
        @include('lucy.partials.single-navigation', ['previous' => $previous, 'next' => $next])
        @include('lucy.partials.related-posts')
    </article>
@endsection