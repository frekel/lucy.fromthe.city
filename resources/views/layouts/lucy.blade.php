<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Lucy-Rhea')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('images/favicon-lucy.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon-lucy.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&family=Montserrat:wght@400;500;600&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/lucy.css') }}">
</head>
<body>
    <div id="page-wrap" class="site-shell">
        <header id="page-header" class="entry-header">
            <div class="boxed-wrapper entry-header__inner"></div>
        </header>

        <div id="main-nav" class="clear-fix">
            <div class="boxed-wrapper">
                <nav class="main-menu-container" aria-label="Hoofdnavigatie">
                    <ul id="main-menu">
                        <li><a href="{{ route('lucy.home') }}" @class(['is-active' => request()->routeIs('lucy.home')])>Home</a></li>
                        <li><a href="{{ route('lucy.pages.gallery') }}" @class(['is-active' => request()->routeIs('lucy.pages.gallery')])>Gallery</a></li>
                        <li><a href="{{ route('lucy.pages.contact') }}" @class(['is-active' => request()->routeIs('lucy.pages.contact')])>Contact</a></li>
                        <li><a href="{{ route('lucy.pages.gewicht-diagram') }}" @class(['is-active' => request()->routeIs('lucy.pages.gewicht-diagram')])>Gewicht diagram</a></li>
                        <li><a href="{{ route('lucy.pages.fotoalbum') }}" @class(['is-active' => request()->routeIs('lucy.pages.fotoalbum')])>Fotoalbum</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <main class="page-content site-main">
            @yield('content')
        </main>

        <footer id="page-footer" class="clear-fix">
            <div class="footer-socials">
                <a href="https://www.instagram.com/lucy.fromthe.city/" target="_blank" rel="noreferrer">
                    <span class="footer-socials-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" role="img" focusable="false">
                            <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2Zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5a4.25 4.25 0 0 0 4.25 4.25h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5a4.25 4.25 0 0 0-4.25-4.25h-8.5Zm8.88 1.75a1.12 1.12 0 1 1 0 2.24 1.12 1.12 0 0 1 0-2.24ZM12 6.5A5.5 5.5 0 1 1 6.5 12 5.51 5.51 0 0 1 12 6.5Zm0 1.5A4 4 0 1 0 16 12a4 4 0 0 0-4-4Z" fill="currentColor"/>
                        </svg>
                    </span>
                    <span>@lucy.fromthe.city</span>
                </a>

                <a href="https://www.youtube.com/channel/UCnY44Di0W6m7txRXD3rCLeA" target="_blank" rel="noreferrer">
                    <span class="footer-socials-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" role="img" focusable="false">
                            <path d="M21.58 7.19a2.98 2.98 0 0 0-2.1-2.11C17.63 4.5 12 4.5 12 4.5s-5.63 0-7.48.58a2.98 2.98 0 0 0-2.1 2.11A31.2 31.2 0 0 0 1.85 12a31.2 31.2 0 0 0 .57 4.81 2.98 2.98 0 0 0 2.1 2.11c1.85.58 7.48.58 7.48.58s5.63 0 7.48-.58a2.98 2.98 0 0 0 2.1-2.11 31.2 31.2 0 0 0 .57-4.81 31.2 31.2 0 0 0-.57-4.81ZM10 15.5v-7l6 3.5-6 3.5Z" fill="currentColor"/>
                        </svg>
                    </span>
                    <span>Lucy from the City</span>
                </a>
            </div>

            <div class="footer-copyright">
                <div class="page-footer-inner boxed-wrapper">
                    <div class="footer-logo">
                        <a href="{{ route('lucy.home') }}" title="Lucy-Rhea">
                            <img src="{{ asset('images/fromthecity-landscape-transparant.png') }}" alt="Lucy-Rhea footer logo">
                        </a>
                    </div>

                    <div class="copyright-info">
                        <span class="credit">
                            Lucy Theme by
                            <a href="http://www.fromthe.city/" target="_blank" rel="noreferrer">FTC Themes</a>
                        </span>
                    </div>

                    <a class="scrolltop" href="#page-wrap">Back to top</a>
                </div>
            </div>
        </footer>
    </div>

    <script>
        document.querySelectorAll('[data-gallery-slider]').forEach((slider) => {
            const slides = Array.from(slider.querySelectorAll('[data-gallery-slide]'));
            const current = slider.querySelector('[data-gallery-current]');
            const prev = slider.querySelector('[data-gallery-prev]');
            const next = slider.querySelector('[data-gallery-next]');

            if (slides.length <= 1) {
                prev?.setAttribute('disabled', 'disabled');
                next?.setAttribute('disabled', 'disabled');
                return;
            }

            let index = 0;

            const render = () => {
                slides.forEach((slide, slideIndex) => {
                    slide.hidden = slideIndex !== index;
                });

                if (current) {
                    current.textContent = String(index + 1);
                }
            };

            prev?.addEventListener('click', () => {
                index = (index - 1 + slides.length) % slides.length;
                render();
            });

            next?.addEventListener('click', () => {
                index = (index + 1) % slides.length;
                render();
            });

            render();
        });
    </script>
</body>
</html>