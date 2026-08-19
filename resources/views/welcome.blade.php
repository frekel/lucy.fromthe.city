<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FromTheCity</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <main class="home">
        <section class="profile" aria-labelledby="site-title">
            <div class="identity">
                <img
                    class="logo"
                    src="{{ asset('images/logo.png') }}"
                    width="110"
                    height="100"
                    alt=""
                >

                <div class="intro">
                    <h1 id="site-title">FromTheCity</h1>
                    <p>A family in The Netherlands</p>
                </div>
            </div>

            <nav class="links" aria-label="Family links">
                <a class="link-button" href="https://www.debijschijner.nl">De Bijschijner</a>
                <a class="link-button" href="http://lucy.fromthe.city">Lucy van der Stad</a>
            </nav>
        </section>
    </main>
</body>
</html>
