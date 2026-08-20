@php
    $posts = [
        [
            'title' => 'Eerste week: Fotoschoot!',
            'route' => 'lucy.posts.eerste-week-fotoschoot',
            'image' => '017a96d7ea32d540455097759b7b86dc2c72771682-500x380.jpg',
            'date' => '03/07/2018',
        ],
        [
            'title' => 'Fotogallery: Bevalling',
            'route' => 'lucy.posts.fotogallery-bevalling',
            'image' => 'DSC05445-500x380.jpg',
            'date' => '26/06/2018',
        ],
        [
            'title' => 'Het is bijna zover...',
            'route' => 'lucy.posts.het-is-bijna-zover',
            'image' => '2E243B1F-2D0F-4220-8552-20C5BAB24BCE-e1529926380135-500x380.jpeg',
            'date' => '25/06/2018',
        ],
        [
            'title' => 'De röntgen foto',
            'route' => 'lucy.posts.de-rontgen-foto',
            'image' => 'BA6CE074-B9FE-4736-8090-4EDA9752F4B0-e1529432655750-500x380.jpeg',
            'date' => '19/06/2018',
        ],
        [
            'title' => 'Werpkist maken',
            'route' => 'lucy.posts.werpkist-maken',
            'image' => '8E59592E-582B-4F1C-BBD3-8B9DBB9984DB-500x380.jpeg',
            'date' => '09/06/2018',
        ],
        [
            'title' => 'Diploma',
            'route' => 'lucy.posts.diploma',
            'image' => '2A701464-65D1-442B-83B3-225668076AF1-500x380.png',
            'date' => '02/06/2018',
        ],
        [
            'title' => 'Training',
            'route' => 'lucy.posts.training',
            'image' => 'IMG_0246-e1527856515797-500x380.jpg',
            'date' => '12/05/2018',
        ],
        [
            'title' => 'Dekking',
            'route' => 'lucy.posts.dekking',
            'image' => 'IMG_0413-500x380.jpg',
            'date' => '23/04/2018',
        ],
        [
            'title' => 'Prikken',
            'route' => 'lucy.posts.prikken',
            'image' => 'IMG_6202-500x380.jpg',
            'date' => '21/04/2018',
        ],
        [
            'title' => 'Oogkeuring',
            'route' => 'lucy.posts.oogkeuring',
            'image' => 'IMG_0415-500x380.jpg',
            'date' => '18/04/2018',
        ],
        [
            'title' => 'Loops!',
            'route' => 'lucy.posts.loops',
            'image' => 'IMG_3816-500x380.jpg',
            'date' => '29/03/2018',
        ],
    ];

    $currentRoute = request()->route()?->getName();
    $currentIndex = collect($posts)->search(fn (array $post) => $post['route'] === $currentRoute);

    $relatedPosts = collect();

    if ($currentIndex !== false) {
        $offsets = [-1, 1, -2, 2, -3, 3];

        foreach ($offsets as $offset) {
            $candidate = $posts[$currentIndex + $offset] ?? null;

            if ($candidate !== null) {
                $relatedPosts->push($candidate);
            }

            if ($relatedPosts->count() >= 3) {
                break;
            }
        }
    }

    $relatedPosts = $relatedPosts
        ->unique('route')
        ->take(3);
@endphp

@if ($relatedPosts->isNotEmpty())
    <div class="related-posts">
        <h3>You May Also Like</h3>

        @foreach ($relatedPosts as $post)
            <section>
                <a href="{{ route($post['route']) }}">
                    <img src="{{ asset('images/lucy/' . $post['image']) }}" alt="{{ $post['title'] }}" loading="lazy">
                </a>
                <h5><a href="{{ route($post['route']) }}">{{ $post['title'] }}</a></h5>
                <span class="related-post-date">{{ $post['date'] }}</span>
            </section>

        @endforeach

        <div class="clear-fix"></div>
    </div>
@endif