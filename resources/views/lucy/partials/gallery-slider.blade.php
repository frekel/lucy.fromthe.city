<div class="gallery-slider" data-gallery-slider>
    <div class="gallery-stage">
        @foreach ($images as $image)
            <figure class="gallery-slide" data-gallery-slide @if (! $loop->first) hidden @endif>
                <img src="{{ asset('images/lucy/' . $image) }}" alt="{{ $alt }}" loading="lazy">
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
            <span>{{ count($images) }}</span>
        </p>

        <button class="gallery-control" type="button" data-gallery-next aria-label="Volgende foto">
            <svg viewBox="0 0 24 24" role="img" focusable="false" aria-hidden="true">
                <path d="M8.22 18.28a.75.75 0 0 1 0-1.06L13.44 12 8.22 6.78a.75.75 0 0 1 1.06-1.06l5.75 5.75a.75.75 0 0 1 0 1.06l-5.75 5.75a.75.75 0 0 1-1.06 0Z" fill="currentColor"/>
            </svg>
        </button>
    </div>
</div>