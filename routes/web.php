<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::view('/', 'lucy.home')->name('lucy.home');

Route::get('/fotoalbum', function () {
    $photostreamUrl = 'https://www.flickr.com/photos/158198686@N03/';
    $page = max((int) request()->integer('page', 1), 1);

    $recentPhotos = Cache::remember('lucy.flickr.photos', now()->addHour(), function () {
        $response = Http::timeout(10)->get('https://www.flickr.com/services/feeds/photos_public.gne', [
            'id' => '158198686@N03',
            'lang' => 'nl-nl',
            'format' => 'json',
            'nojsoncallback' => 1,
        ]);

        if (! $response->successful()) {
            return [];
        }

        return collect($response->json('items', []))
            ->map(function (array $item) {
                return [
                    'title' => trim((string) ($item['title'] ?? '')) ?: 'Foto uit het Lucy-Rhea album',
                    'image' => $item['media']['m'] ?? null,
                    'link' => $item['link'] ?? null,
                ];
            })
            ->filter(fn (array $photo) => filled($photo['image']) && filled($photo['link']))
            ->values()
            ->all();
    });

    $archivePhotos = Cache::remember('lucy.flickr.archive.photos', now()->addHours(6), function () {
        $response = Http::timeout(15)->get('http://host.docker.internal:9999/fotoalbum/');

        if (! $response->successful()) {
            return [];
        }

        preg_match_all(
            '~<a href="(https://www\.flickr\.com/photos/158198686@N03/[^"]+)"[^>]*><img[^>]+src="(https://[^" ]+)"~',
            $response->body(),
            $matches,
            PREG_SET_ORDER,
        );

        return collect($matches)
            ->map(fn (array $match) => [
                'title' => 'Foto uit het Lucy-Rhea album',
                'link' => $match[1],
                'image' => $match[2],
            ])
            ->unique('link')
            ->values()
            ->all();
    });

    $olderPhotos = collect($archivePhotos)
        ->slice(count($recentPhotos))
        ->values();

    $olderPageSize = 20;
    $totalPages = max(1, 1 + (int) ceil($olderPhotos->count() / $olderPageSize));
    $page = min($page, $totalPages);

    $photos = $page === 1
        ? $recentPhotos
        : $olderPhotos->forPage($page - 1, $olderPageSize)->values()->all();

    return view('lucy.pages.fotoalbum', [
        'photos' => $photos,
        'photostreamUrl' => $photostreamUrl,
        'page' => $page,
        'totalPages' => $totalPages,
    ]);
})->name('lucy.pages.fotoalbum');
Route::view('/gewicht-diagram', 'lucy.pages.gewicht-diagram')->name('lucy.pages.gewicht-diagram');
Route::view('/gallery', 'lucy.pages.gallery')->name('lucy.pages.gallery');
Route::view('/contact', 'lucy.pages.contact')->name('lucy.pages.contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('lucy.contact.submit');

Route::view('/2018/07/eerste-week-fotoschoot', 'lucy.posts.eerste-week-fotoschoot')
    ->name('lucy.posts.eerste-week-fotoschoot');
Route::view('/2018/06/fotogallery-bevalling', 'lucy.posts.fotogallery-bevalling')
    ->name('lucy.posts.fotogallery-bevalling');
Route::view('/2018/06/het-is-bijna-zover', 'lucy.posts.het-is-bijna-zover')
    ->name('lucy.posts.het-is-bijna-zover');
Route::view('/2018/06/de-rontgen-foto', 'lucy.posts.de-rontgen-foto')
    ->name('lucy.posts.de-rontgen-foto');
Route::view('/2018/06/werpkist-maken', 'lucy.posts.werpkist-maken')
    ->name('lucy.posts.werpkist-maken');
Route::view('/2018/06/diploma', 'lucy.posts.diploma')->name('lucy.posts.diploma');
Route::view('/2018/05/training', 'lucy.posts.training')->name('lucy.posts.training');
Route::view('/2018/04/dekking', 'lucy.posts.dekking')->name('lucy.posts.dekking');
Route::view('/2018/04/prikken', 'lucy.posts.prikken')->name('lucy.posts.prikken');
Route::view('/2018/04/oogkeuring', 'lucy.posts.oogkeuring')->name('lucy.posts.oogkeuring');
Route::view('/2018/03/loops', 'lucy.posts.loops')->name('lucy.posts.loops');
