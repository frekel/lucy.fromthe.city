@if (! empty($previous) || ! empty($next))
    <div class="single-navigation">
        @if (! empty($previous))
            <div class="previous-post">
                <a href="{{ route($previous['route']) }}" title="{{ $previous['title'] }}">
                    <img src="{{ asset('images/lucy/' . $previous['image']) }}" alt="{{ $previous['title'] }}" loading="lazy">
                </a>
                <div>
                    <span>Previous</span>
                    <a href="{{ route($previous['route']) }}" title="{{ $previous['title'] }}">
                        <h5>{{ $previous['title'] }}</h5>
                    </a>
                </div>
            </div>
        @endif

        @if (! empty($next))
            <div class="next-post">
                <a href="{{ route($next['route']) }}" title="{{ $next['title'] }}">
                    <img src="{{ asset('images/lucy/' . $next['image']) }}" alt="{{ $next['title'] }}" loading="lazy">
                </a>
                <div>
                    <span>Newer</span>
                    <a href="{{ route($next['route']) }}" title="{{ $next['title'] }}">
                        <h5>{{ $next['title'] }}</h5>
                    </a>
                </div>
            </div>
        @endif
    </div>
@endif