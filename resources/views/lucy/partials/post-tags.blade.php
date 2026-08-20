@if (! empty($tags))
    <div class="post-tags">
        @foreach ($tags as $tag)
            <a href="#">{{ $tag }}</a>
        @endforeach
    </div>
@endif