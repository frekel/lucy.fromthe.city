@extends('layouts.lucy')

@section('title', 'Oogkeuring | Lucy-Rhea')

@section('content')
    @php
        $images = [
            'IMG_0415-225x300.jpg',
            'IMG_0414-225x300.jpg',
        ];
        $tags = ['Dierenarts', 'Keuring', 'ogen', 'oog'];
        $previous = [
            'route' => 'lucy.posts.loops',
            'title' => 'Loops!',
            'image' => 'IMG_3816-500x380.jpg',
        ];
        $next = [
            'route' => 'lucy.posts.prikken',
            'title' => 'Prikken',
            'image' => 'IMG_6202-500x380.jpg',
        ];
    @endphp

    <article class="story story--wide">
        <header class="story-header">
            <p class="eyebrow">18 april 2018</p>
            <h1>Oogkeuring</h1>
        </header>

        <div class="story-body">
            <p>
                Voor een nestje moest Lucy natuurlijk tip-top in orde zijn. Bij de nestkeuring was ze al goedgekeurd op knieën en uiterlijk,
                maar de ogen moesten nog apart getest worden.
            </p>
            <p>Gelukkig werd ook die laatste controle goedgekeurd.</p>

            @include('lucy.partials.gallery-slider', ['images' => $images, 'alt' => 'Oogkeuring van Lucy'])
        </div>

        @include('lucy.partials.post-tags', ['tags' => $tags])
        @include('lucy.partials.post-footer', ['date' => '18 april 2018'])
        @include('lucy.partials.single-navigation', ['previous' => $previous, 'next' => $next])
        @include('lucy.partials.related-posts')
    </article>
@endsection