@extends('layouts.lucy')

@section('title', 'Gallery | Lucy-Rhea')

@section('content')
    @php
        $sections = [
            [
                'title' => '1 week oud',
                'images' => [
                    '017a96d7ea32d540455097759b7b86dc2c72771682.jpg',
                    '014c8039266bc9bffd065c404c1be3661326372fee.jpg',
                    '0159394151eba3b757ddee48ff7f5e89ebd35c26bb.jpg',
                    '019977fbf9e00bd63ceafb936c81b22326113b1abf.jpg',
                    '01ad6f880dd5a6f35306e250181a653084086fdd92.jpg',
                    '01463fa26f457fa1bbd730410c4cdd8180e6c6dffe (1).jpg',
                    '0148f1cf7b3c27471d3c5fcb4f83e0d0eb52dae3a4.jpg',
                    '01a6d02f5589111e265f6422dd8bf63f3f54fbdf06.jpg',
                ],
            ],
                        [
                'title' => 'Bevalling',
                'images' => [
                    'DSC05445.jpg',
                    'DSC05395.jpg',
                    'DSC05401.jpg',
                    'DSC05405.jpg',
                    'DSC05407.jpg',
                    'DSC05432.jpg',
                    'DSC05471.jpg',
                    'DSC05458.jpg',
                    'DSC05455.jpg',
                    'DSC05453.jpg',
                    'DSC05474.jpg',
                    'DSC05478.jpg',
                    'DSC05489.jpg',
                    'DSC05480.jpg',
                    'DSC05490.jpg',
                    'DSC05495.jpg',
                    'DSC05497.jpg',
                ],
            ],
            [
                'title' => 'Werpkist maken',
                'images' => [
                    'CE327A98-75C5-4F8D-95CB-E5EC3CC61E38.jpeg',
                    '439232AA-4FAE-42B9-9EC6-9AC54B4A58A7.jpeg',
                    '3FB2453E-7A9F-42F9-8CCE-35A25EB329F7-e1528711346292.jpeg',
                    '5F74B4E4-D90E-4AE1-8EB4-2FAE8B6E3DB9-e1528710976351.jpeg',
                    'DFA90A01-D6C9-432F-AB4A-FA9BA202C17D.jpeg',
                    '2AA0AED6-CC27-4D61-99FB-2230B2022C91.jpeg',
                    'F9C1E958-D44B-4450-A590-905A9A91B8EB.jpeg',
                    '8E59592E-582B-4F1C-BBD3-8B9DBB9984DB.jpeg',
                    '91F3532C-1309-4F8F-A5C0-078B43E34E84.jpeg',
                ],
            ],
            [
                'title' => 'Lily & Lucy',
                'images' => [
                    'Lily_&_Lucy.jpg',
                    'Lily_&_Lucy_1.jpg',
                    'Lily_&_Lucy_2.jpg',
                    'Lily_&_Lucy_3.jpg',
                    'Lily_&_Lucy_4.jpg',
                    'Lily_&_Lucy_5.jpg',
                    'Lily_&_Lucy_6.jpg',
                    'Lily_&_Lucy_7.jpg',
                    'Lily_&_Lucy_8.jpg',
                    'Lily_&_Lucy_9.jpg',
                    'Lily_&_Lucy_10.jpg',
                    'Lily_&_Lucy_11.jpg',
                    'Lily_&_Lucy_12.jpg',
                    'Lily_&_Lucy_13.jpg',
                    'Lily_&_Lucy_14.jpg',
                    'Lily_&_Lucy_15.jpg',
                ],
            ],
        ];
    @endphp

    <section class="story">
        <header class="story-header">
            <p class="eyebrow">Pagina</p>
            <h1>Gallery</h1>
        </header>

        @foreach ($sections as $section)
            <section class="story-subsection">
                <h2>{{ $section['title'] }}</h2>

                <div class="gallery-slider" data-gallery-slider>
                    <div class="gallery-stage">
                        @foreach ($section['images'] as $image)
                            <figure class="gallery-slide" data-gallery-slide @if (! $loop->first) hidden @endif>
                                <img src="{{ asset('images/lucy/' . $image) }}" alt="{{ $section['title'] }}" loading="lazy">
                            </figure>
                        @endforeach
                    </div>

                    <div class="gallery-controls">
                        <button class="gallery-control" type="button" data-gallery-prev aria-label="Vorige foto">
                            <svg viewBox="0 0 24 24" role="img" focusable="false" aria-hidden="true">
                                <path d="M15.78 5.72a.75.75 0 0 1 0 1.06L10.56 12l5.22 5.22a.75.75 0 1 1-1.06 1.06l-5.75-5.75a.75.75 0 0 1 0-1.06l5.75-5.75a.75.75 0 0 1 1.06 0Z" fill="currentColor"/>
                            </svg>
                        </button>

                        <p class="gallery-counter">
                            <span data-gallery-current>1</span>
                            /
                            <span>{{ count($section['images']) }}</span>
                        </p>

                        <button class="gallery-control" type="button" data-gallery-next aria-label="Volgende foto">
                            <svg viewBox="0 0 24 24" role="img" focusable="false" aria-hidden="true">
                                <path d="M8.22 18.28a.75.75 0 0 1 0-1.06L13.44 12 8.22 6.78a.75.75 0 0 1 1.06-1.06l5.75 5.75a.75.75 0 0 1 0 1.06l-5.75 5.75a.75.75 0 0 1-1.06 0Z" fill="currentColor"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </section>
        @endforeach
    </section>
@endsection