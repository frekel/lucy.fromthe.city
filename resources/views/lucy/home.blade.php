@extends('layouts.lucy')

@section('title', 'Lucy-Rhea')

@section('content')
    @php
        $posts = [
            [
                'title' => 'Eerste week: Fotoschoot!',
                'date' => '3 juli 2018',
                'route' => 'lucy.posts.eerste-week-fotoschoot',
                'image' => asset('images/lucy/017a96d7ea32d540455097759b7b86dc2c72771682.jpg'),
                'excerpt' => 'Dobby & Rockie zijn precies 1 week oud. Tijd voor een kleine fotoshoot van Lily.',
            ],
            [
                'title' => 'Fotogallery: Bevalling',
                'date' => '26 juni 2018',
                'route' => 'lucy.posts.fotogallery-bevalling',
                'image' => asset('images/lucy/DSC05445-500x380.jpg'),
                'excerpt' => 'Gisteravond zijn Dobby & Rockie geboren. Moeder en pups maken het prima!',
            ],
            [
                'title' => 'Het is bijna zover…',
                'date' => '25 juni 2018',
                'route' => 'lucy.posts.het-is-bijna-zover',
                'image' => asset('images/lucy/2E243B1F-2D0F-4220-8552-20C5BAB24BCE-e1529926380135-500x380.jpeg'),
                'excerpt' => 'Heei! Dit komt waarschijnlijk heeel onverwachts.. maar we hebben getemperatuurd en t was 36,9°C'
            ],
            [
                'title' => 'De röntgen foto',
                'date' => '19 juni 2018',
                'route' => 'lucy.posts.de-rontgen-foto',
                'image' => asset('images/lucy/BA6CE074-B9FE-4736-8090-4EDA9752F4B0-e1529432655750-500x380.jpeg'),
                'excerpt' => 'Zo, net de röntgenfoto gehad en ja (zoals je misschien kan zien) zijn het er 2! Prima aantal voor de eerste keer toch?',
            ],
            [
                'title' => 'Werpkist maken',
                'date' => '9 juni 2018',
                'route' => 'lucy.posts.werpkist-maken',
                'image' => asset('images/lucy/8E59592E-582B-4F1C-BBD3-8B9DBB9984DB-500x380.jpeg'),
                'excerpt' => 'We hebben onze eigen werpkist ontworpen en gemaakt. Allereerst hebben we alle planken een beetje geschuurd',
            ],
            [
                'title' => 'Diploma',
                'date' => '2 juni 2018',
                'route' => 'lucy.posts.diploma',
                'image' => asset('images/lucy/2A701464-65D1-442B-83B3-225668076AF1-500x380.png'),
                'excerpt' => 'Lucy is geslaagd voor haar Gehoorzaamheidscursus! We zijn supertrots op haar!!! @wereldhond.nl: Bedankt voor de leuke tijd! ',
            ],
            [
                'title' => 'Training',
                'date' => '12 mei 2018',
                'route' => 'lucy.posts.training',
                'image' => asset('images/lucy/IMG_0246-e1527856515797-500x380.jpg'),
                'excerpt' => 'Lucy doet al een aantal weken mee aan de Gehoorzaamheidscursus bij Wereld Hond. Zie http://www.wereldhond.nl',
            ],
            [
                'title' => 'Dekking',
                'date' => '23 april 2018',
                'route' => 'lucy.posts.dekking',
                'image' => asset('images/lucy/IMG_0413-500x380.jpg'),
                'excerpt' => '',
            ],
            [
                'title' => 'Prikken',
                'date' => '21 april 2018',
                'route' => 'lucy.posts.prikken',
                'image' => asset('images/lucy/IMG_6202-500x380.jpg'),
                'excerpt' => '',
            ],
            [
                'title' => 'Oogkeuring',
                'date' => '18 april 2018',
                'route' => 'lucy.posts.oogkeuring',
                'image' => asset('images/lucy/IMG_0415-500x380.jpg'),
                'excerpt' => 'De oogtest Voor een nestje moet Lucy natuurlijk tip-top in orde zijn. Bij de nestkeuring is ze al goedgekeurd',
            ],
            [
                'title' => 'Loops!',
                'date' => '29 maart 2018',
                'route' => 'lucy.posts.loops',
                'image' => asset('images/lucy/IMG_3816-500x380.jpg'),
                'excerpt' => 'De start van het verhaal: Lucy is loops en het nestje komt in zicht. We gaan dus voor een nestje! Duimen jullie mee?',
            ],
        ];

        $featuredPost = $posts[0];
        $gridPosts = array_slice($posts, 1);
    @endphp

    <div class="main-content clear-fix boxed-wrapper" data-layout="col2-rsidebar">
        <div class="main-container">
            <ul class="blog-grid">
                <li class="blog-classic-style">
                    <article class="blog-post blog-post--classic">
                        <header class="post-header">
                            <div class="post-categories">Foto's</div>
                            <h1 class="post-title">
                                <a href="{{ route($featuredPost['route']) }}">{{ $featuredPost['title'] }}</a>
                            </h1>
                            <span class="border-divider"></span>
                            <div class="post-meta clear-fix">
                                <span class="post-date">{{ $featuredPost['date'] }}</span>
                            </div>
                        </header>

                        @if ($featuredPost['image'])
                            <div class="post-media post-media--classic">
                                <a href="{{ route($featuredPost['route']) }}">
                                    <img src="{{ $featuredPost['image'] }}" alt="{{ $featuredPost['title'] }}" loading="lazy">
                                </a>
                            </div>
                        @endif

                        <div class="post-content">
                            <p>{{ $featuredPost['excerpt'] }}</p>
                        </div>

                        <div class="read-more">
                            <a href="{{ route($featuredPost['route']) }}">Continue Reading</a>
                        </div>
                    </article>
                </li>

                @foreach ($gridPosts as $post)
                    <li class="blog-grid-style">
                        <article class="blog-post">
                            @if ($post['image'])
                                <div class="post-media">
                                    <a href="{{ route($post['route']) }}">
                                        <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" loading="lazy">
                                    </a>
                                </div>
                            @endif

                            <header class="post-header">
                                <h1 class="post-title">
                                    <a href="{{ route($post['route']) }}">{{ $post['title'] }}</a>
                                </h1>
                                <span class="border-divider"></span>
                            </header>

                            <div class="post-content">
                                <p>{{ $post['excerpt'] }}</p>
                            </div>

                            <footer class="post-footer">
                                <span class="post-author">By Frank van der Stad</span>
                                <span class="post-date">{{ $post['date'] }}</span>
                            </footer>
                        </article>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection