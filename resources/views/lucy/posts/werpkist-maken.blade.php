@extends('layouts.lucy')

@section('title', 'Werpkist maken | Lucy-Rhea')

@section('content')
    @php
        $galleryImages = [
            'CE327A98-75C5-4F8D-95CB-E5EC3CC61E38.jpeg',
            '439232AA-4FAE-42B9-9EC6-9AC54B4A58A7.jpeg',
            '3FB2453E-7A9F-42F9-8CCE-35A25EB329F7-e1528711346292.jpeg',
            '5F74B4E4-D90E-4AE1-8EB4-2FAE8B6E3DB9-e1528710976351.jpeg',
            'DFA90A01-D6C9-432F-AB4A-FA9BA202C17D.jpeg',
            '2AA0AED6-CC27-4D61-99FB-2230B2022C91.jpeg',
            'F9C1E958-D44B-4450-A590-905A9A91B8EB.jpeg',
            '8E59592E-582B-4F1C-BBD3-8B9DBB9984DB.jpeg',
            '91F3532C-1309-4F8F-A5C0-078B43E34E84.jpeg',
        ];
        $tags = ['Klussen', 'bouwplaat', 'howto', 'schuren', 'steigerhout', 'verven', 'werpkist'];
        $previous = [
            'route' => 'lucy.posts.diploma',
            'title' => 'Diploma',
            'image' => '2A701464-65D1-442B-83B3-225668076AF1-500x380.png',
        ];
        $next = [
            'route' => 'lucy.posts.de-rontgen-foto',
            'title' => 'De röntgen foto',
            'image' => 'BA6CE074-B9FE-4736-8090-4EDA9752F4B0-e1529432655750-500x380.jpeg',
        ];
    @endphp

    <article class="story story--wide">
        <header class="story-header">
            <p class="eyebrow">9 juni 2018</p>
            <h1>Werpkist maken</h1>
        </header>

        <div class="story-body">
            <p>We hebben onze eigen werpkist ontworpen en gemaakt.</p>
            <p>Allereerst hebben we alle planken een beetje geschuurd en daarna een proefopstelling gemaakt. Op die manier weet je grofweg hoe hij in elkaar moet worden geschroefd.</p>

            <h2>De vloer</h2>
            <p>Leg de 5 grote planken (c) met de 3 balken (d) haaks op de grond en schroef deze met 2 schroeven per plank vast. Let op dat de grote planken netjes aan elkaar liggen en dat ze mooi op een rij liggen.</p>

            <h2>De wanden</h2>
            <p>Hierna draai je de vloer om en begin je aan de korte kant met het plaatsen van de wanden. Je begint met een smalle plank (b) en zet deze vast met 2 schroeven aan de vloer. Daarna bevestig je de rest van de wanden met de brede planken (a).</p>
            <p>Je moet proberen om de wanden mooi te laten aansluiten. Als je aan de voorkant, waar je de opening zou willen, komt, moet je naar eigen inzicht met de brede planken (a) en smalle planken (c) kijken welk motief je mooi vindt. Hou rekening met het deurtje. Hiervoor heb je een opening van 50 centimeter nodig.</p>

            <h2>De rand</h2>
            <p>Voor de rand moet je de balken (e en f) in verstek zagen. Wij hebben de rand aan beide kanten 18 mm laten overhangen. Zaag hierna de balken (e en f) op maat met een hoek van 45 graden. Bevestig eerst de hoeken van de randen en werk daarna naar het midden van de wand.</p>
            <p>Let op: plaats de gehele rand. Later zaag je het gedeelte voor het deurtje eruit.</p>

            <h2>De dooddrukstangen voorbereiding</h2>
            <p>De doordrukstangen moeten op maat worden gezaagd. Meet de binnenkant van de kist en zaag de planken (j en k) op maat. De dooddrukstang die voor de kant van het deurtje wordt gebruikt moet ook op maat worden gezaagd. Voor het deurtje moet je een hoekje uitzagen van ongeveer 50 bij 30 mm.</p>

            <h2>Het deurtje voorbereiding</h2>
            <p>Voor het maken van een deurtje hebben we gekozen voor een houten constructie. Vaak zie je een metalen profiel, maar wij vonden een geheel houten werpkist mooier. Plaats de houten balken (g) naast de opening. We hebben de balken 10 mm laten uitsteken. Bevestig de houten latjes (h) aan de voorkant. Schaaf de planken (i) aan de korte kant zodat ze gemakkelijk in de gleuf passen.</p>

            <h2>Schuren en verven</h2>
            <p>Omdat de doordrukstangen later weer worden verwijderd, is het nu tijd om de onderdelen in de grondverf te zetten. Breng dit ruim aan. Tijdens het drogen worden de planken weer wat ruw, waardoor je later nogmaals de balken moet schuren.</p>
            <p>Schuur na 24 uur de werpkist grondig. De binnenkant van de werpkist moet zeer glad zijn zodat de pups zich niet bezeren aan de planken. Breng daarna een tweede laag grondverf aan en laat dit weer 24 uur drogen.</p>
            <p>Nu kun je de werpkist nogmaals licht opschuren en afwerken met de beits. Wij hebben gekozen voor een white-wash, maar je mag natuurlijk zelf een andere kleur uitkiezen. Vergeet niet de deurtjes en de dooddrukstangen ook mee te nemen in deze stap.</p>

            <h2>De dooddrukstangen</h2>
            <p>Plaats de onderkant van de planken (j) op 11 cm van de bodem. Schroef deze weer met 2 schroeven via de wanden vast. De planken (k) voor de korte kant kunnen op de andere stang (j) worden geschroefd.</p>

            <h2>Versieren</h2>
            <p>Nu komt het leukste gedeelte. Versieren, versieren en versieren!</p>

            <h2>Fotogallery</h2>
            @include('lucy.partials.gallery-slider', ['images' => $galleryImages, 'alt' => 'Werpkist maken'])

            <h2>Boodschappen lijstje</h2>

            <h3>Wanden</h3>
            <ul>
                <li>22 steigerhouten planken van 500x200x32 mm (a)</li>
                <li>4 steigerhouten planken van 500x100x32 mm (b)</li>
            </ul>

            <h3>Vloer</h3>
            <ul>
                <li>5 steigerhouten planken van 1500x200x32 mm (c)</li>
                <li>3 steigerhouten balken van 1000x32x32 mm (d)</li>
            </ul>

            <h3>Rand</h3>
            <ul>
                <li>2 steigerhouten balken van 1600x60x32 mm (e)</li>
                <li>2 steigerhouten balken van 1100x60x32 mm (f)</li>
            </ul>

            <h3>Deur</h3>
            <ul>
                <li>2 steigerhouten balken van 500x60x32 mm (g)</li>
                <li>2 steigerhouten latjes van 500x32x32 mm (h)</li>
                <li>5 steigerhouten planken van 500x100x32 mm (i)</li>
            </ul>

            <h3>Dooddrukstangen</h3>
            <ul>
                <li>2 steigerhouten planken van 1500x100x32 mm (j)</li>
                <li>2 steigerhouten planken van 1000x100x32 mm (k)</li>
            </ul>

            <h3>Schroeven</h3>
            <ul>
                <li>200 50×45 spaanplaatschroeven</li>
            </ul>

            <p><em>Het steigerhout en de schroeven hebben we gehaald bij Jan Wooning in Rotterdam.</em></p>

            <h3>Schilderwerk</h3>
            <ul>
                <li>3x pot primer op water basis (Action)</li>
                <li>1x tuinhoutbeits white wash (Hornbach)</li>
                <li>2 dikke kwasten (Action)</li>
                <li>3 lakrollertjes klein (Action)</li>
                <li>3 lakrollertjes groot (Action)</li>
                <li>2 verfbakjes klein (Action)</li>
                <li>2 verfbakjes groot (Action)</li>
                <li>Schuurblokje (Action)</li>
                <li>Schuurpapier 120 gr (Action)</li>
                <li>Bandschuurmachine 120 gr</li>
                <li>Vlakschuurmachine 150 gr</li>
                <li>Verstekzaag of decoupeerzaag</li>
            </ul>

            <h3>Versiersels</h3>
            <ul>
                <li>Fotolijstjes (Action)</li>
                <li>Letterboard (Action)</li>
                <li>Hartjes klein (Action)</li>
            </ul>
        </div>

        @include('lucy.partials.post-tags', ['tags' => $tags])
        @include('lucy.partials.post-footer', ['date' => '9 juni 2018'])
        @include('lucy.partials.single-navigation', ['previous' => $previous, 'next' => $next])
        @include('lucy.partials.related-posts')
    </article>
@endsection