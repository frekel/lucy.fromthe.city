@extends('layouts.lucy')

@section('title', 'Gewicht diagram | Lucy-Rhea')

@section('content')
    @php
        $weights = [
            ['label' => '25-06', 'rockie' => 270, 'dobby' => 320],
            ['label' => '26-06', 'rockie' => 320, 'dobby' => 340],
            ['label' => '27-06', 'rockie' => 355, 'dobby' => 375],
            ['label' => '28-06', 'rockie' => 410, 'dobby' => 450],
            ['label' => '29-06', 'rockie' => 485, 'dobby' => 525],
            ['label' => '30-06', 'rockie' => 590, 'dobby' => 595],
            ['label' => '01-07', 'rockie' => 630, 'dobby' => 645],
            ['label' => '02-07', 'rockie' => 705, 'dobby' => 680],
            ['label' => '03-07', 'rockie' => 780, 'dobby' => 760],
            ['label' => '04-07', 'rockie' => 850, 'dobby' => 805],
            ['label' => '05-07', 'rockie' => 920, 'dobby' => 850],
            ['label' => '06-07', 'rockie' => 1000, 'dobby' => 910],
            ['label' => '07-07', 'rockie' => 1050, 'dobby' => 965],
            ['label' => '08-07', 'rockie' => 1140, 'dobby' => 1020],
            ['label' => '09-07', 'rockie' => 1205, 'dobby' => 1080],
            ['label' => '10-07', 'rockie' => 1300, 'dobby' => 1160],
            ['label' => '11-07', 'rockie' => 1380, 'dobby' => 1255],
            ['label' => '12-07', 'rockie' => 1470, 'dobby' => 1290],
            ['label' => '13-07', 'rockie' => 1540, 'dobby' => 1380],
            ['label' => '14-07', 'rockie' => 1620, 'dobby' => 1400],
            ['label' => '15-07', 'rockie' => 1710, 'dobby' => 1490],
            ['label' => '16-07', 'rockie' => 1780, 'dobby' => 1570],
            ['label' => '17-07', 'rockie' => 1785, 'dobby' => 1590],
            ['label' => '18-07', 'rockie' => 1840, 'dobby' => 1640],
            ['label' => '19-07', 'rockie' => 1920, 'dobby' => 1690],
            ['label' => '20-07', 'rockie' => 1990, 'dobby' => 1725],
            ['label' => '21-07', 'rockie' => 2050, 'dobby' => 1735],
            ['label' => '22-07', 'rockie' => 2050, 'dobby' => 1820],
            ['label' => '23-07', 'rockie' => 2145, 'dobby' => 1790],
        ];
        $images = [
            'rockie_09.jpg', 'dobby_09.jpg', 'rockie_08.jpg', 'dobby_08.jpg', 'rockie_07.jpg', 'dobby_07.jpg',
            'rockie_06.jpg', 'dobby_06.jpg', 'rockie_05.jpg', 'dobby_05.jpg', 'rockie_04.jpg', 'dobby_04.jpg',
            'rockie_03.jpg', 'dobby_03.jpg', 'rockie_02.jpg', 'dobby_02.jpg', 'rockie_01.jpg', 'dobby_01.jpg',
        ];

        $chartWidth = 960;
        $chartHeight = 420;
        $paddingLeft = 56;
        $paddingRight = 20;
        $paddingTop = 24;
        $paddingBottom = 48;
        $plotWidth = $chartWidth - $paddingLeft - $paddingRight;
        $plotHeight = $chartHeight - $paddingTop - $paddingBottom;
        $maxWeight = max(array_map(fn ($row) => max($row['rockie'], $row['dobby']), $weights));
        $yMax = (int) (ceil($maxWeight / 250) * 250);
        $weightCount = count($weights);
        $weightDivisor = max($weightCount - 1, 1);

        $toPoints = function (string $series) use ($weights, $paddingLeft, $paddingTop, $plotWidth, $plotHeight, $yMax, $weightDivisor) {
            return collect($weights)->map(function ($row, $index) use ($series, $paddingLeft, $paddingTop, $plotWidth, $plotHeight, $yMax, $weightDivisor) {
                $x = $paddingLeft + (($plotWidth / $weightDivisor) * $index);
                $y = $paddingTop + $plotHeight - (($row[$series] / $yMax) * $plotHeight);

                return round($x, 2).','.round($y, 2);
            })->implode(' ');
        };

        $rockiePoints = $toPoints('rockie');
        $dobbyPoints = $toPoints('dobby');
        $gridValues = [0, 500, 1000, 1500, 2000];
    @endphp

    <section class="story">
        <header class="story-header">
            <p class="eyebrow">Pagina</p>
            <h1>Gewicht diagram</h1>
        </header>

        <div class="story-body">
            <section class="story-subsection">
                <h2>Grafiek</h2>

                <div class="weight-chart-card">
                    <div class="weight-chart-legend" aria-hidden="true">
                        <span class="weight-chart-legend__item">
                            <span class="weight-chart-legend__swatch weight-chart-legend__swatch--rockie"></span>
                            Rockie
                        </span>
                        <span class="weight-chart-legend__item">
                            <span class="weight-chart-legend__swatch weight-chart-legend__swatch--dobby"></span>
                            Dobby
                        </span>
                    </div>

                    <svg class="weight-chart" viewBox="0 0 {{ $chartWidth }} {{ $chartHeight }}" role="img" aria-label="Gewichtsgrafiek van Rockie en Dobby">
                        @foreach ($gridValues as $value)
                            @php
                                $y = $paddingTop + $plotHeight - (($value / $yMax) * $plotHeight);
                            @endphp
                            <line x1="{{ $paddingLeft }}" y1="{{ $y }}" x2="{{ $chartWidth - $paddingRight }}" y2="{{ $y }}" class="weight-chart__grid" />
                            <text x="{{ $paddingLeft - 12 }}" y="{{ $y + 4 }}" class="weight-chart__label weight-chart__label--y">{{ $value }}</text>
                        @endforeach

                        <polyline points="{{ $rockiePoints }}" class="weight-chart__line weight-chart__line--rockie" />
                        <polyline points="{{ $dobbyPoints }}" class="weight-chart__line weight-chart__line--dobby" />

                        @foreach ($weights as $index => $row)
                            @php
                                $x = $paddingLeft + (($plotWidth / $weightDivisor) * $index);
                                $rockieY = $paddingTop + $plotHeight - (($row['rockie'] / $yMax) * $plotHeight);
                                $dobbyY = $paddingTop + $plotHeight - (($row['dobby'] / $yMax) * $plotHeight);
                            @endphp
                            <circle cx="{{ $x }}" cy="{{ $rockieY }}" r="3.5" class="weight-chart__point weight-chart__point--rockie" />
                            <circle cx="{{ $x }}" cy="{{ $dobbyY }}" r="3.5" class="weight-chart__point weight-chart__point--dobby" />
                            @if ($index % 4 === 0 || $loop->last)
                                <text x="{{ $x }}" y="{{ $chartHeight - 14 }}" class="weight-chart__label weight-chart__label--x">{{ $row['label'] }}</text>
                            @endif
                        @endforeach
                    </svg>
                </div>
            </section>

            <section class="story-subsection">
                <h2>Gallery</h2>

                <div class="gallery-slider" data-gallery-slider>
                    <div class="gallery-stage">
                        @foreach ($images as $image)
                            <figure class="gallery-slide" data-gallery-slide @if (! $loop->first) hidden @endif>
                                <img src="{{ asset('images/lucy/' . $image) }}" alt="Gewicht diagram" loading="lazy">
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
            </section>
        </div>
    </section>
@endsection